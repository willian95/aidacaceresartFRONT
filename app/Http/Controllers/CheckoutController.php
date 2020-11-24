<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use App\DolarPrice;
use App\Cart;
use Illuminate\Support\Facades\Crypt;
use JWTAuth;
use Config;

class CheckoutController extends Controller
{
    
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    function encryptUser(Request $request){

        try{
            $user = JWTAuth::parseToken()->toUser();
            return response()->json(["userId" => Crypt::encryptString($user->id)]);
        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage()]);
        }

    }

    function encryptPriceCurrency(Request $request){

        try{
            return response()->json(["price" => Crypt::encryptString($request->price), "currency" => Crypt::encryptString($request->currency)]);
        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage()]);
        }

    }

    public function payWithPayPal(Request $request)
    {

        $price = Crypt::decryptString($request->price);
        $userId = Crypt::decryptString($request->userId);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($price);
        $amount->setCurrency("USD");

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            
            $msg = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            $status = "failed";
            return view('statusPayment', ["msg" => $msg, "status" => "approved"]);

        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);
        //dd($result->getId());
        if ($result->getState() === 'approved') {
            
            $msg = 'Gracias! El pago a través de PayPal se ha realizado correctamente.';
            $status = "approved";
            return view('statusPayment', ["msg" => $msg, "status" => "approved"]);
            //return redirect('/results')->with(compact('status'));
            
        }

        $msg = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        $status = "failed";
        return view('statusPayment', ["msg" => $msg, "status" => "approved"]);
        //return redirect('/results')->with(compact('status'));
    }


    function process(){

        try{

            $user = JWTAuth::parseToken()->toUser();

            $products = Cart::where("user_id", $user->id)->with("productFormatSize", "productFormatSize.product", "productFormatSize.size", "productFormatSize.format")->has("productFormatSize")->get();

            $to_name = $user->name;
            $to_email = $user->email;
            $data = ["user" => $user, "products" => $products];

            \Mail::send("emails.purchaseEmail", $data, function($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)->subject("¡Has realizado una compra en Aidacaceresart.com!");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

            dd($products);

            //Cart::where("user_id", $user->id)->delete();

        }catch(\Exception $e){

            return response()->json(["err" => $e->getMessage()]);

        }

    }

}

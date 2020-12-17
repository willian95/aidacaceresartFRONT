<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use App\Payment as PaymentInfo;
use App\ProductPurchase;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use App\DolarPrice;
use App\Cart;
use Illuminate\Support\Facades\Crypt;
use App\GuestUser;
use JWTAuth;
use Config;
use App\AdminMail;

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

    function encryptGuestUser(Request $request){

        try{
            $user = $request->user_id;
            return response()->json(["user" => Crypt::encryptString($user)]);
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

        $guest = $request->guest;
        $price = Crypt::decryptString($request->price);
        $userId = Crypt::decryptString($request->userId);

        session(['user_id' => $userId, "guest" => $guest]);

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
            return view('statusPayment', ["msg" => $msg, "status" => $status]);

        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);
        //dd($result->getId());
        if ($result->getState() === 'approved') {

            $payment = new PaymentInfo;
            $payment->status = "aprobado";
            $payment->total_products = $result->transactions[0]->amount->total;
            $payment->shipping_cost = 0;
            $payment->total = $result->transactions[0]->amount->total;
            $payment->order_id = $result->getId();
            if(session("guest") == 0){
                $payment->user_id = session("user_id");
            }else{
                $payment->guest_user_id = session("user_id");
            }
            
            $payment->tracking = "0";
            $payment->address = "0";
            $payment->status_shipping = "0";
            $payment->save();

            $msg = 'Gracias! El pago a través de PayPal se ha realizado correctamente.';
            $status = "approved";
            return view('statusPayment', ["msg" => $msg, "status" => "approved", "paymentId" => $payment->id, "guest" => session("guest")]);
            //return redirect('/results')->with(compact('status'));
            
        }

        $msg = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        $status = "failed";
        return view('statusPayment', ["msg" => $msg, "status" => $status]);
        //return redirect('/results')->with(compact('status'));
    }


    function process(Request $request){

        try{

            if(ProductPurchase::where("payment_id", $request->paymentId)->count() == 0){
               
                $user = JWTAuth::parseToken()->toUser();

                $products = Cart::where("user_id", $user->id)->with("productFormatSize", "productFormatSize.product", "productFormatSize.size", "productFormatSize.format")->has("productFormatSize")->get();

                foreach($products as $product){

                    $productPurchase = new ProductPurchase;
                    $productPurchase->product_format_size_id = $product->product_format_size_id;
                    $productPurchase->amount = 1;
                    $productPurchase->price = $product->productFormatSize->price;
                    $productPurchase->payment_id = $request->paymentId;
                    $productPurchase->save();

                }
                
                $to_name = $user->name;
                $to_email = $user->email;
                $language = $request->language;
                $payment = PaymentInfo::where("id", $request->paymentId)->first();
                $data = ["user" => $user, "products" => $products, "language" => $language, "payment" => $payment];
                

                \Mail::send("emails.purchaseEmail", $data, function($message) use ($to_name, $to_email, $language) {

                    if($language == "spanish"){
                        $message->to($to_email, $to_name)->subject("¡Haz realizado una compra en Aidacaceresart.com!");
                    }else{
                        $message->to($to_email, $to_name)->subject("Purchase confirmation at Aida E-Gallery!");
                    }
                    $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

                });

                foreach(AdminMail::all() as $adminMail){
                    $to_email = $adminMail->email;
                    \Mail::send("emails.purchaseEmail", $data, function($message) use ($to_name, $to_email) {

                        $message->to($to_email, $to_name)->subject("¡Un cliente realizó una compra en Aidacaceresart.com!");
                        $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
    
                    });
                }

                Cart::where("user_id", $user->id)->delete();
            }

        }catch(\Exception $e){

            return response()->json(["err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function guestProcess(Request $request){

        try{

            if(ProductPurchase::where("payment_id", $request->paymentId)->count() == 0){
                $products = $request->cart;
                //return response()->json($products);
                foreach($products as $product){
                    //return response()->json($product);
                    $productPurchase = new ProductPurchase;
                    $productPurchase->product_format_size_id = $product["id"];
                    $productPurchase->amount = 1;
                    $productPurchase->price = $product["price"];
                    $productPurchase->payment_id = $request->paymentId;
                    $productPurchase->save();

                }


                $payment = PaymentInfo::where("id", $request->paymentId)->first();
                $user = GuestUser::where("id", $payment->guest_user_id)->first();

                $to_name = $user->name;
                $to_email = $user->email;
                $language = $request->language;
                $data = ["user" => $user, "products" => $products, "language" => $language, "payment" => $payment];

                //dump([$products]);

                \Mail::send("emails.guestPurchaseEmail", $data, function($message) use ($to_name, $to_email, $language) {

                    if($language == "spanish"){
                        $message->to($to_email, $to_name)->subject("¡Haz realizado una compra en Aidacaceresart.com!");
                    }else{
                        $message->to($to_email, $to_name)->subject("Purchase confirmation at Aida E-Gallery!");
                    }
                    
                    $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

                });

                foreach(AdminMail::all() as $adminMail){
                    $to_email = $adminMail->email;
                    \Mail::send("emails.guestPurchaseEmail", $data, function($message) use ($to_name, $to_email) {

                        $message->to($to_email, $to_name)->subject("¡Un cliente realizó una compra en Aidacaceresart.com!");
                        $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
    
                    });
                }

            }

        }catch(\Exception $e){

            return response()->json(["err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

}

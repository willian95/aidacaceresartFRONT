<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\DolarPrice;
use Illuminate\Support\Facades\Log;

class DolarUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dolar:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dolar Update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://www.freeforexapi.com/api/live?pairs=USDCOP');

        $data =json_decode($response->body());

        if($data){
            if($data->rates){
                $dolar = DolarPrice::find(1);
                $dolar->rate  = $data->rates->USDCOP->rate;
                $dolar->update();
            }
            
        }

        Log::info("Funciono");
    }
}

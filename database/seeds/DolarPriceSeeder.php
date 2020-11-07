<?php

use Illuminate\Database\Seeder;
use App\DolarPrice;

class DolarPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        if(DolarPrice::count() == 0){
            $dolar = new DolarPrice;
            $dolar->id = 1;
            $dolar->rate = 0;
            $dolar->save();
        }

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    protected $table = "product_purchases";

    public function productFormatSize(){
        return $this->belongsTo(ProductFormatSize::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductFormatSize extends Model
{

    use SoftDeletes;

    protected $table = "product_format_sizes";

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function format(){
        return $this->belongsTo(Format::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "sizes";

    public function productFormatSizes(){
        return $this->hasMany(ProductFormatSize::class);
    }

}

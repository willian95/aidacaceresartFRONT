<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $table = "formats";

    public function productFormatSizes(){
        return $this->hasMany(ProductFormatSize::class);
    }

}

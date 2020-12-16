<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    
    public function fetchCountries(){

        return response()->json(["countries" => Country::all()]);

    }

}

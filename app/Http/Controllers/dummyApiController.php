<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyApiController extends Controller
{
    public function getData(){
        return ["Name"=>"Wangu",
        "Age"=>26,
        "Occuppation"=>"Developer"
    ];
    }
}

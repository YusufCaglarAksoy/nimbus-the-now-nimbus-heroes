<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPage extends Controller
{
    public function getData(Request $request)
    {
        if($request->has('form1')){
            app('App\Http\Controllers\Subscribers')->getSubscribe();
        }
        else if($request->has('form2')){
                app('App\Http\Controllers\feedback')->getMessage();
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class Subscribers extends Controller
{
    public function subscribe(Request $request){
            /*$validated=$request->validate([
                'email' =>'required|email|unique:subscribers,email'
            ]);*/
        $validator = Validator::make($request->all(),[
            'email' =>'required|email|unique:subscribers,email'
        ]);
        if($validator->fails()){
          return Redirect::to(URL::previous().'#contact')->withErrors($validator,'subscribe');
        }

                DB::table('subscribers')->insert([
                    'email'=>$request->input('email'),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
             return back()->withSuccess('1');

    }

    public function showSubscriber(){
        $subscribers=Subscriber::all();
        return view('admin.showsubscribers',compact('subscribers'));
    }
}

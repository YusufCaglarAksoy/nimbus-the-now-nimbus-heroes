<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

class feedback extends Controller
{


    public function message(Request $request)
    {
        /*$validated=$request->validate([
            'name' =>'required|min:3|max:30',
            'surname'=>'required|min:3|max:24',
            'email'=>'required|email',
            'phoneNumber'=>'required|numeric',
            'option'=>'required',
            'message'=>'min:3|max:240',



        ]);*/
        $validator = Validator::make($request->all(),[
            'name' =>'required|min:3|max:30',
            'surname'=>'required|min:3|max:24',
            'email'=>'required|email',
            'phoneNumber'=>'required|numeric',
            'option'=>'required',
            'message'=>'min:3|max:240',
        ]);
        if($validator->fails()){
            return Redirect::to(URL::previous().'#contact')->withErrors($validator,'message');
        }

          DB::table('contacts')->insert([
              'name'=>$request->input('name'),
              'surname'=>$request->input('surname'),
              'email'=>$request->input('email'),
              'phoneNumber'=>$request->input('phoneNumber'),
              'option'=>$request->input('option'),
              'message'=>$request->input('message'),
              'created_at'=>now(),
              'updated_at'=>now(),
          ]);
       return back()->withSuccess('2');
      }


}

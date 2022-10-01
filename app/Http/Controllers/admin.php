<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContentModel;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class admin extends Controller
{
    public function loginPass(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.panel');
        }
        return redirect()->route('admin.login')->withSuccess(1);
    }
    public function adminOut(Request $request){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function showFeedback(){
        $contacts =Contact::all();
        return view('admin.showcontact',compact('contacts'));

    }
    public function destroy(Request $request){
       Contact::where('id',$request->delete)->delete();
        return redirect()->route('admin.messages');
    }
    public function delete(Request $request){
        Subscriber::where('id',$request->delete)->delete();
        return redirect()->route('admin.subscribers');
    }
    public function logScreen(){
        return view('admin.loginscreen');
    }

    public function updateContent(Request $request){
        $contents=ContentModel::find($request->id);
        $contents->name=$request->name;
        $contents->title=$request->title;
        $contents->icerik=$request->icerik;
        $contents->updated_at=now();
        $contents->save();
        return redirect()->route('admin.editContent');





    }
    public function newContent($id){
        $contents=ContentModel::find($id);
        return view('admin.newContent',compact('contents'));


    }

    public function editContent(){
        $contents=ContentModel::all();
        return view('admin.editcontents',compact('contents'));
    }
    public function deleteContent(Request $request){
    ContentModel::where('id',$request->delete)->delete();
    return redirect()->route('admin.editcontent');
    }
    public function panel(){
        $contacts =Contact::all();
        $subscribers=Subscriber::all();

        return view('admin.panel',compact('contacts','subscribers'));
    }

}

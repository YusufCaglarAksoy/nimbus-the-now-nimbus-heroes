<?php

namespace App\Http\Controllers;

use App\Models\ContentModel;
use Illuminate\Http\Request;

class pages extends Controller
{
    public function hairpages(){
        $contents1=ContentModel::where('title', 'Saç Ekimi')->get();
        $contents2=ContentModel::where('title', 'Saç Ekimi Kimlere Uygulanmalı?')->get();
        $contents3=ContentModel::where('name', '3.parça')->get();
        return view('inner-page',compact('contents1','contents2','contents3'));
    }
    public function esteticpages(){
        $contents=ContentModel::where('title','Burun Estetiği')->get();
        return view('gözBurunEstetik',compact('contents'));
    }
    public function eyebrowpages(){
        $contents=ContentModel::where('title','Kaş Ekimi')->get();
        return view('kasEkimi',compact('contents'));
    }
    public function beardmustache(){
        $contents=ContentModel::where('title','Sakal-Bıyık Ekimi')->get();
        return view('sakalBiyikEkimi',compact('contents'));
    }
    public function mezoterapi(){
        $contents=ContentModel::where('title','Mezoterapi')->get();
        return view('mezoterapi',compact('contents'));
    }
    public function prptedavi(){
    $contents=ContentModel::where('title','PRP Tedavisi')->get();
        return view('prpTedavi',compact('contents'));
    }
    public function hairlaser(){
        $contents=ContentModel::where('title','Saç Lazeri')->get();
        return view('sacLazeri',compact('contents'));
    }
}

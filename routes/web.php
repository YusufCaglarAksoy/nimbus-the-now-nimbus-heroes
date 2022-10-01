<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin giriş işlemleri ve çıkış yapılıp yapılmadığının kontrol işlemi
Route::prefix('/es1609')->name('admin.')->group(function () {
    Route::get('/giris',[Controllers\admin::class,'logScreen'])->middleware('isOut')->name('login');
    Route::post('/giris',[Controllers\admin::class,'loginPass'])->name('login.post');
});
//Giriş doğru olduğu durumda panel içindeki route işlemleri
Route::get('/es1609',[Controllers\admin::class,'logScreen'])->middleware('isOut')->name('log');
Route::prefix('/es1609')->middleware('isLogin')->name('admin.')->group(function () {
    Route::get('/panel',[Controllers\admin::class,'panel'])->name('panel');
    Route::get('/adminout',[Controllers\admin::class,'adminOut'])->name('adminOut');
    Route::get('/panel/messages',[Controllers\admin::class,'showFeedback'])->name('messages');
    Route::post('/panel/messages',[Controllers\admin::class,'destroy'])->name('messages.post');
    Route::get('/panel/subscribers',[Controllers\subscribers::class,'showSubscriber'])->name('subscribers');
    Route::post('/panel/subscribers',[Controllers\admin::class,'delete'])->name('subscribers.post');
    Route::get('/panel/editcontent',[Controllers\admin::class,'editContent'])->name('editContent');
    Route::post('/panel/editcontent/deletecontent',[Controllers\admin::class,'deleteContent'])->name('deleteContent');
    Route::get('/panel/editcontent/newcontent/{id}',[Controllers\admin::class,'newContent'])->name('newcontent');
    Route::post('/panel/editcontent/newcontent/new/{id}',[Controllers\admin::class,'updateContent'])->name('updateContent');

});
//Sayfalar
//Anasayfa abonepost
Route::prefix('/')->name('mainpage.')->middleware('wordfilter')->group(function(){
    Route::get('/', function () {
        $contents=\App\Models\ContentModel::where('title','Hakkımızda')->get();
        return view('welcome',compact('contents'));})->name('anasayfa');
    Route::post('/subscribe-ol' , [Controllers\Subscribers::class,'subscribe'])->name('anasayfa.post');
    Route::post('/mail-gonder',[Controllers\feedback::class,'message'])->name('erkansanli.post');
});
//Sayfalama işlemleri
Route::prefix('/pages')->name('page.')->group(function(){
    Route::get('/sacekimi',[Controllers\pages::class,'hairpages'])->name('hairpage');
    Route::get('/estetik',[Controllers\pages::class,'esteticpages'])->name('esteticpage');
    Route::get('/sacekimi/kas_ekimi',[Controllers\pages::class,'eyebrowpages'])->name('eyebrowpage');
    Route::get('/sacekimi/sakal_biyik_ekimi',[Controllers\pages::class,'beardmustache'])->name('beardmustache');
    Route::get('/sacekimi/tedaviler/mezoterapi',[Controllers\pages::class,'mezoterapi'])->name('mezoterapi');
    Route::get('/sacekimi/tedaviler/prp_tedavi',[Controllers\pages::class,'prptedavi'])->name('prptedavi');
    Route::get('/sacekimi/tedaviler/sac_lazeri',[Controllers\pages::class,'hairlaser'])->name('hairlaser');

});


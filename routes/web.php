<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('product.index');
});
Route::get('/home', function () {
    return redirect()->route('product.index');
});
Route::get('/test',function(){return view('test');});


//Route::view('/test','test',["name"=>"assem saad"]);
///Route::get('/test/{id}',function($id){
//return view('/test',['id'=>$id ,"name"=>"assem saad"]);
//});
//Route::get('/user',[UserController::class ,'index']);
Route::resource('product',ProductController::class);//->middleware('auth');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

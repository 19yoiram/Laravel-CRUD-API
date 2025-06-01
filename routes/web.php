<?php

use App\Models\User;
use App\Http\Middleware\BlockIp;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
  
 Route::get('login', function(){
     return view('/login');
 });

Route::group(['prefix' => 'account'],function(){
  Route::controller(LoginController::class)->group(function () {
  Route::get('login','index')->name(name:'account.login');
  Route::get('register','register')->name(name:'account.register');
  Route::post('process-register','processRegister')->name(name:'account.processRegister'); 
    }); 

 });


Route::post('products-import',[ProductController::class, 'import'])->name(name:'products.import');
Route::get('products-export',[ProductController::class, 'export'])->name(name:'products.export');
Route::resource(name: 'products', controller: \App\Http\Controllers\ProductController::class);



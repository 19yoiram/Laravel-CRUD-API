<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductApiController;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\UserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['prefix' => 'auth'], function ($router) {

    Route::controller(AuthController::class)->group(function()
    {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout','logout');
    Route::resource('products',ProductApiController::class);

    Route::middleware('auth:api')->group(function()
    {
    Route::post('refresh','refresh');
    });

    });

});





// Route::get('/user/{id}', [UserController::class, 'show']);




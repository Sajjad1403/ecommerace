<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'apikey'], function(){
    Route::post('register',[LoginController::class,'register']);
    Route::post('login/users',[LoginController::class,'login']);

    Route::group(['middleware' => 'auth:sanctum'],function(){
        Route::post('refresh-token',[LoginController::class,'refreshtoken']); 
        Route::post('/test', [LoginController::class, 'test']);
    });
});

Route::post('api-key',[LoginController::class,'apikey']);
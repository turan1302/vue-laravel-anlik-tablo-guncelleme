<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix'=>'musteri','namespace'=>'musteri','as'=>'musteri'],function (){
    Route::get('',[\App\Http\Controllers\api\musteri\indexController::class,'index']);
    Route::group(['prefix'=>'{item}'],function (){
        Route::patch('update',[\App\Http\Controllers\api\musteri\indexController::class,'update']);
    });
});

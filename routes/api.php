<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SportController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class, 'login']);

Route::group(['prefix'=>'sports','middleware'=>['auth','role:admin']],function($router){
    Route::get('',[SportController::class, 'index']);
    Route::get('/{id}',[SportController::class, 'show']);
    Route::post('',[SportController::class,'create']);
    Route::delete('/{id}',[SportController::class, 'destroy']);
    Route::put('/{id}',[SportController::class, 'update']);
});

Route::group(['prefix'=>'players','middleware'=>['auth','role:coach']],function($router){
    Route::get('',[PlayerController::class,'index'])->withoutMiddleware(['role:coach'])->can('read players');
    Route::get('/{id}',[PlayerController::class,'show'])->withoutMiddleware(['role:coach'])->can('read players');
    Route::post('',[PlayerController::class,'create']);
    Route::delete('/{id}',[PlayerController::class, 'destroy']);
    Route::put('/{id}',[PlayerController::class, 'update']);
});

Route::group(['prefix'=>'teams','middleware'=>['auth','role:admin']],function($router){
    Route::get('',[TeamController::class,'index']);
    Route::get('/{id}',[TeamController::class,'show']);
    Route::post('',[TeamController::class,'create']);
    Route::delete('/{id}',[TeamController::class, 'destroy']);
    Route::put('/{id}',[TeamController::class, 'update']);
});

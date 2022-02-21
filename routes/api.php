<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data_partner', [\App\Http\Controllers\Api\PartnerController::class, 'index']);
Route::post('/signup_partner', [\App\Http\Controllers\Api\PartnerController::class, 'store']);

Route::post('/register',[AuthController::class,'register']);
Route::get('/members',[MemberController::class,'index']);
Route::get('/members/{id}',[MemberController::class,'show']);
Route::get('/members/search/{username}',[MemberController::class,'search']);
//Route::resource('members',MemberController::class);


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/members',[MemberController::class,'store']);
    Route::put('/members/{id}',[MemberController::class,'store']);
    Route::delete('/members{id}',[MemberController::class,'store']);
    Route::post('/logout',[AuthController::class,'logout']);
});

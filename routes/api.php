<?php

use App\Http\Controllers\LocalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\TestController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Đăng ký đối tác
Route::get('/data_partner', [PartnerController::class, 'index']);
Route::post('/signup_partner', [PartnerController::class, 'store']);

//Đăng ký admin
Route::post('/signup',[AuthController::class,'register']);
//Lấy list admin
Route::get('/getuser',[AuthController::class,'getuser']);
//Đăng nhập admin
Route::post('/user-login', [AuthController::class, 'login']);
//Lấy list user
Route::get('/members',[MemberController::class,'index']);
//Sau khi đăng nhập admin
Route::group(['middleware' => ['auth:api']], function(){
    Route::get('/user-info',[AuthController::class,'getUserInfo']);
    Route::post('/save-members',[MemberController::class,'store']);
    Route::put('/members/{id}',[MemberController::class,'update']);
    Route::delete('/members/{id}',[MemberController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::get('/members/search/{name}',[MemberController::class,'search']);
Route::get('/thanh-vien/tim-kiem',[MemberController::class,'member_check']);

Route::get('/local',[LocalController::class,'getLocal']);
Route::get('/members/check',[MemberController::class,'checkMemberExist']);
Route::get('/partner/check',[PartnerController::class,'partner_check']);

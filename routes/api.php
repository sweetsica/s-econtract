<?php

use App\Http\Controllers\LocalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\DepartmentController;
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

//Module đối tác
    //Đăng ký đối tác
    Route::get('/data_partner', [PartnerController::class, 'index']);
    Route::post('/signup_partner', [PartnerController::class, 'store']);
//End module đối tác

//Module Admin
    //Đăng ký admin
    Route::post('/signup',[AuthController::class,'register']);
    //Đăng nhập admin
    Route::post('/user-login', [AuthController::class, 'login']);
    //Lấy list admin
    Route::get('/getuser',[AuthController::class,'getuser']);
    //After signed in
    Route::group(['middleware' => ['auth:api']], function(){
        Route::get('/user-info',[AuthController::class,'getUserInfo']);
        Route::post('/save-members',[MemberController::class,'store']);
        Route::put('/members/{id}',[MemberController::class,'update']);
        Route::delete('/members/{id}',[MemberController::class,'destroy']);
        Route::post('/logout',[AuthController::class,'logout']);
    });
//End module Admnin

//Module member
    //Lấy list user
    Route::get('/members',[MemberController::class,'index']);
    Route::get('/members/search/{name}',[MemberController::class,'search']);
    Route::get('/thanh-vien/tim-kiem',[MemberController::class,'member_check']);
    Route::get('/members/check',[MemberController::class,'checkMemberExist']);
//End module member

//Other Module
    //Module Role
    Route::get('/get-roles',[RoleController::class,'index']);
    //Module Department
    Route::get('/get-department',[DepartmentController::class,'index']);
    Route::post('/department',[DepartmentController::class,'create']);
    Route::get('/department-system',[DepartmentController::class,'department_system']);
    //Module Local
    Route::get('/local',[LocalController::class,'getLocal']);
    //Module Partner
    Route::get('/partner/check',[PartnerController::class,'partner_check']);
//End other Module

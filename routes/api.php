<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;


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

Route::get('',[APIController::class,'indexl']);
Route::get('users',[APIController::class,'users']);
Route::post('', [APIController::class, 'index']);

Route::get('user/',[UserController::class,'index']);
Route::post('user/create',[UserController::class, 'create']);
Route::get('user/{id}',[UserController::class,'show']);
Route::post('user/{id}/destroy',[UserController::class,'destroy']);

Route::get('post/',[PostController::class,'index']);
Route::post('post/create',[PostController::class,'create']);
Route::get('post/{id}',[PostController::class,'show']);
Route::post('post/{id}/destroy',[PostController::class,'destroy']);


Route::get('product/',[ProductController::class,'index']);
Route::get('product/{id}',[ProductController::class,'show']);
Route::post('product/create',[ProductController::class,'create']);
Route::post('product/{id}/destroy',[ProductController::class,'destroy']);


Route::get('auth',[AuthController::class,'index']);
Route::get('auth/user/{id}',[AuthController::class,'showauth']);
Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

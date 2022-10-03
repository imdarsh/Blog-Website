<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ApiAuthController;


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

Route::get('/posts', [PostsController::class, 'index']);
Route::post('/posts', [PostsController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->middleware('auth:sanctum');
Route::get('/posts/{post}', [PostsController::class,'show']);
Route::put('/posts/{post}', [PostsController::class,'update'])->middleware('auth:sanctum');

Route::post('/login', [ApiAuthController::class,'login']);
Route::post('/register',[ApiAuthController::class,'register']);

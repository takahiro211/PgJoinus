<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Project\ProjectDetailController;
use App\Http\Controllers\Api\Project\FavoriteController;
use Illuminate\Support\Facades\DB;

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

// GuestRoutes
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/guest-posts', function () {
    return DB::table('posts')->where('created_at', '!=', null)->orderBy('created_at', 'desc')->get();
});
Route::get('/faq', function () {
    return DB::table('faq_list')->get();
});
Route::get('/ads', function () {
    return DB::table('ads')->get();
});

// PrivateRoutes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/users', function () {
    return User::where('created_at', '!=', null)->orderBy('created_at', 'desc')->get();
});
Route::middleware('auth:sanctum')->get('/projects', [ProjectDetailController::class, 'getDetail']);
Route::middleware('auth:sanctum')->get('/comments', function (Request $request) {
    return DB::table('comments')
        ->where('post_id', '=', $request->postId)
        ->get();
});

Route::middleware('auth:sanctum')->get('/favorite', [FavoriteController::class, 'favorite']);
Route::middleware('auth:sanctum')->get('/favorite_remove', [FavoriteController::class, 'remove']);

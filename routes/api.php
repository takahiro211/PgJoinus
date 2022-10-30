<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
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

// PrivateRoutes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/users', function () {
    return User::where('created_at', '!=', null)->orderBy('created_at', 'desc')->get();
});
Route::get('/projects', function (Request $request) {
    return DB::table('posts')
        ->select(
            'posts.id',
            'posts.title',
            'posts.description',
            'posts.detail',
            'posts.url',
            'posts.author',
            'posts.skill',
            'posts.free_tag',
            'posts.created_at',
            'posts.updated_at',
            'users.name',
        )
        ->join('users', 'users.id', '=', 'posts.author')
        ->where('posts.id', '=', $request->postId)
        ->get();
});

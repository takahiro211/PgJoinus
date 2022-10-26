<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;

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
Route::middleware('auth:sanctum')->get('users', function () {
    return User::where('created_at', '!=', null)->orderBy('created_at', 'desc')->get();
});
Route::middleware('auth:sanctum')->get('auth', function () {
    return true;
});

Route::post('login', [LoginController::class, 'login']);

Route::get('logout', [LoginController::class, 'logout']);
Route::post('register', [RegisterController::class, 'register']);

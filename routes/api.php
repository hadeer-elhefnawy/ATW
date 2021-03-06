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


Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'apiLogin']);
Route::post('/create-post', [\App\Http\Controllers\ApiController::class, 'createPost']);
Route::get('/user', function (Request $request) {
    return $request->user('api');
});

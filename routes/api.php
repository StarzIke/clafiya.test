<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => '/v1/clafiya'], function () {
    Route::post('/register',[UserController::class,'registration'])->name('api.user.register');
    Route::post('/login', [UserController::class,'login'])->name('api.user.login');
    Route::post('/logout',[UserController::class,'logout'])->name('api.user.logout');

    Route::any('{url?}/{sub_url?}', function () {
        return response()->json([
            'status'    => false,
            'message'   => 'Invalid URL.',
        ], 404);
    })->name('api.404.fallback');
});

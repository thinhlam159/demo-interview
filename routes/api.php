<?php

use App\Http\Controllers\Api\User\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'user'], function () {
    Route::get('/detail-user/{id}', [UserController::class, 'getUser']);
    Route::get('/list-user', [UserController::class, 'getUsers']);
    Route::post('/create-user', [UserController::class, 'createUser']);
    Route::put('/update-user/{id}', [UserController::class, 'updateUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);
});

<?php

use App\Http\Controllers\Api\TrackApiRequests;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:api')->get('/user', [UserController::class, 'index']);
Route::middleware('auth:api')->post('/user/create', [UserController::class, 'create']);
Route::middleware('auth:api')->post('/user/update/{user}', [UserController::class, 'update']);
Route::middleware('auth:api')->get('/user/delete/{user}', [UserController::class, 'delete']);


Route::middleware('auth:api')->get('/track', [TrackApiRequests::class, 'track']);

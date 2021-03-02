<?php

use App\Http\Controllers\Api\TrackApiRequests;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('home');


require __DIR__.'/auth.php';

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/api-logs', [TrackApiRequests::class, 'index'])->name('api.logs');

    Route::post('/users', [UserController::class, '']);
    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons');
    Route::get('table-list', function () {return view('pages.tables');})->name('table');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/github/redirect', [OAuthController::class, 'githubRedirect'])->name('github.redirect');
Route::get('/github/callback', [OAuthController::class, 'githubCallback'])->name('github.callback');

Route::get('/google/redirect', [OAuthController::class, 'googleRedirect'])->name('google.redirect');
Route::get('/google/callback', [OAuthController::class, 'googleCallback'])->name('google.callback');

Route::get('/login-code', [OAuthController::class, 'create'])->name('oauth.code');
Route::post('/login-code', [OAuthController::class, 'storage'])->name('oauth.store');

require __DIR__ . '/api.php';

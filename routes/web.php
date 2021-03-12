<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/', HomeController::class)->name('home');

Auth::routes([
	'register' => false, // Registration Routes...
  	'reset' => false, // Password Reset Routes...
  	'verify' => false, // Email Verification Routes...
]);

Route::post('/queries', [QueryController::class, 'store'])->name('queries.store');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');
	Route::resource('projects', ProjectController::class)->except('show');
	Route::resource('queries', QueryController::class)->only(['index']);
	Route::resource('profile', UserProfileController::class)->only(['edit','update']);
});
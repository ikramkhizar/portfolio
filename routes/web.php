<?php

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
    return view('home');
})->name('home');

Auth::routes([
	'register' => false, // Registration Routes...
  	'reset' => false, // Password Reset Routes...
  	'verify' => false, // Email Verification Routes...
]);

Route::group(['prefix' => 'admin'], function () {
	Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
	Route::get('/projects', function() {
		return view('admin.projects.index');
	})->name('projects');
	Route::get('/queries', function() {
		return view('admin.queries.index');
	})->name('queries');
});
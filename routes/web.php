<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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



Route::view('dashboard', 'dashboard')
	->name('dashboard')
	->middleware(['auth', 'verified']);

Route::view('dashboard', 'dashboard')
	->name('dashboard')
	->middleware(['auth', 'verified']);




Route::group(['prefix' => 'artisan', 'as' => 'artisan.'], function () {

	Route::get('clear', function () {
		Artisan::call('config:clear');
		Artisan::call('view:clear');
		Artisan::call('route:clear');
		Artisan::call('cache:clear');
		return 'Successfully Cleared!';
	});

	Route::get('migrate', function () {
		Artisan::call('migrate:fresh --seed');
		Artisan::call('storage:link');
		return 'Successfully Migrated fresh, seeded and storage is linked!';
	});

	Route::get('storage_link', function () {
		Artisan::call('storage:link');
		return 'Successfully linked!';
	});
});


Route::group(['middleware' => ['auth', 'verified']], function () {
	Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	});


	Route::get('/', function () {
		return view('layout.backend.app');
	});
	
	Route::get('profile', function () {
		return view('profile');
	});
});






// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
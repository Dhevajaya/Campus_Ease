<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\DaftarUniversitas;
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

Route::group(["namespace" => "App\Http\Controllers\LandingPage" , "as" => "landing-page."], function () {

	Route::get('/', 'HomeController@index')->name('home.index');

	Route::group(["as" => "file-public.","prefix" => "file-public"], function () {
		Route::get('/', 'FilePublicController@index')->name("index");
	}); 
	
	Route::group(["as" => "pages.","prefix" => "pages"], function () {
		Route::get('/{slug}', 'PageController@index')->name("index");
	});
	
	Route::group(["as" => "contact.","prefix" => "contact"], function () {
		Route::get('/', 'ContactController@index')->name("index");
		Route::post('/', 'ContactController@store')->name("store");
	});

	Route::group(["as" => "daftaruniversitas.","prefix" => "daftaruniversitas"], function () {
		Route::get('/', 'DaftarUniversitasController@index')->name("index");
		Route::get('/{id}', 'DaftarUniversitasController@show')->name("show");
	});


	Route::group(["as" => "faq.","prefix" => "faq"], function () {
		Route::get('/', 'FaqController@index')->name("index");
	});

	Route::group(["as" => "achievements.","prefix" => "achievements"], function () {
		Route::get('/', 'AchievementController@index')->name("index");
	});

	Route::group(["as" => "employees.","prefix" => "employees"], function () {
		Route::get('/', 'EmployeeController@index')->name("index");
	});

	Route::group(["as" => "announcements.","prefix" => "announcements"], function () {
		Route::get('/', 'AnnouncementController@index')->name("index");
		Route::get('/{slug}', 'AnnouncementController@show')->name("show");
	});
});

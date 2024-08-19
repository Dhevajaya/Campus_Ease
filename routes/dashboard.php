<?php

use Illuminate\Support\Facades\Route;
use App\Enums\RoleEnum;

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

Route::group(["as" => "auth.","prefix" => "auth" , "namespace" => "Auth"], function () {

	Route::group(["as" => "login.","prefix" => "login"], function () {
		Route::get('/', 'LoginController@index')->name('index');
		Route::post('/', 'LoginController@post')->name('post');
	});

	Route::get('/logout', 'LogoutController@logout')->name("logout");

	Route::group(["as" => "forgot-password.","prefix" => "forgot-password"], function () {
		Route::get('/', 'ForgotPasswordController@index')->name('index');
		Route::post('/', 'ForgotPasswordController@post')->name('post');
	});

	Route::group(["as" => "reset-password.","prefix" => "reset-password"], function () {
        Route::get('/', 'ResetPasswordController@index')->name('index');
        Route::post('/', 'ResetPasswordController@post')->name('post');
    });

	Route::group(["as" => "verification.","prefix" => "verification"], function () {
		Route::get('verify', 'VerificationController@verificationNotice')->middleware('auth');
		Route::get('verify/{id}/{hash}', 'VerificationController@verifyUser')->middleware(['signed']);
		Route::post('verification-notification', 'VerificationController@verificationResend')->middleware(['auth', 'throttle:6,1']);
	});

});

Route::group(['middleware' => ['auth', 'dashboard.access','verified:dashboard.auth.verification.notice']], function () {

	Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN])]);

	Route::get('/', 'DashboardController@index')->name('dashboard.index');

	Route::group(["as" => "profile.","prefix" => "profile"], function () {
		Route::get('/', 'ProfileController@index')->name("index");
		Route::put('/', 'ProfileController@update')->name("update");
	});

	Route::group(["as" => "file-public.","prefix" => "file-public"], function () {
		Route::get('/', 'FilePublicController@index')->name("index");
		Route::get('/create', 'FilePublicController@create')->name("create");
		Route::get('/{id}', 'FilePublicController@show')->name("show");
		Route::get('/{id}/edit', 'FilePublicController@edit')->name("edit");
		Route::post('/', 'FilePublicController@store')->name("store");
		Route::put('/{id}', 'FilePublicController@update')->name("update");
		Route::delete('/{id}', 'FilePublicController@destroy')->name("destroy");
	});

	Route::group(["as" => "users.","prefix" => "users"], function () {
		Route::get('/', 'UserController@index')->name("index")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/create', 'UserController@create')->name("create")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}', 'UserController@show')->name("show")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}/edit', 'UserController@edit')->name("edit")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::post('/', 'UserController@store')->name("store")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::put('/{id}', 'UserController@update')->name("update")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::delete('/{id}', 'UserController@destroy')->name("destroy")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::patch('/{id}', 'UserController@restore')->name("restore")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}/impersonate', 'UserController@impersonate')->name("impersonate")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN])]);
	});

	Route::group(["as" => "daftaruniversitas.","prefix" => "daftaruniversitas"], function () {
		Route::get('/', 'DaftarUniversitasController@index')->name("index");
		Route::get('/create', 'DaftarUniversitasController@create')->name("create");
		Route::get('/{id}', 'DaftarUniversitasController@show')->name("show");
		Route::get('/{id}/edit', 'DaftarUniversitasController@edit')->name("edit");
		Route::post('/', 'DaftarUniversitasController@store')->name("store");
		Route::put('/{id}', 'DaftarUniversitasController@update')->name("update");
		Route::delete('/{id}', 'DaftarUniversitasController@destroy')->name("destroy");
	});

	Route::group(["as" => "faq.","prefix" => "faq"], function () {
		Route::get('/', 'FaqController@index')->name("index");
		Route::get('/create', 'FaqController@create')->name("create");
		Route::get('/{id}', 'FaqController@show')->name("show");
		Route::get('/{id}/edit', 'FaqController@edit')->name("edit");
		Route::post('/', 'FaqController@store')->name("store");
		Route::put('/{id}', 'FaqController@update')->name("update");
		Route::delete('/{id}', 'FaqController@destroy')->name("destroy");
	});

	Route::group(["as" => "pages.","prefix" => "pages"], function () {
		Route::get('/', 'PageController@index')->name("index")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/create', 'PageController@create')->name("create")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}', 'PageController@show')->name("show")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}/edit', 'PageController@edit')->name("edit")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::post('/', 'PageController@store')->name("store")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::put('/{id}', 'PageController@update')->name("update")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::delete('/{id}', 'PageController@destroy')->name("destroy")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
	});

	Route::group(["as" => "announcements.","prefix" => "announcements"], function () {
		Route::get('/', 'AnnouncementController@index')->name("index")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/create', 'AnnouncementController@create')->name("create")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}', 'AnnouncementController@show')->name("show")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}/edit', 'AnnouncementController@edit')->name("edit")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::post('/', 'AnnouncementController@store')->name("store")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::put('/{id}', 'AnnouncementController@update')->name("update")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::delete('/{id}', 'AnnouncementController@destroy')->name("destroy")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
	});

	Route::group(["as" => "employees.","prefix" => "employees"], function () {
		Route::get('/', 'EmployeeController@index')->name("index")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/create', 'EmployeeController@create')->name("create")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}', 'EmployeeController@show')->name("show")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}/edit', 'EmployeeController@edit')->name("edit")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::post('/', 'EmployeeController@store')->name("store")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::put('/{id}', 'EmployeeController@update')->name("update")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::delete('/{id}', 'EmployeeController@destroy')->name("destroy")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
	});

	Route::group(["as" => "achievements.","prefix" => "achievements"], function () {
		Route::get('/', 'AchievementController@index')->name("index")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/create', 'AchievementController@create')->name("create")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}', 'AchievementController@show')->name("show")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::get('/{id}/edit', 'AchievementController@edit')->name("edit")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::post('/', 'AchievementController@store')->name("store")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::put('/{id}', 'AchievementController@update')->name("update")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		Route::delete('/{id}', 'AchievementController@destroy')->name("destroy")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
	});

	Route::group(["as" => "settings.","prefix" => "settings" , "namespace" => "Setting"], function () {

		Route::group(["as" => "web.","prefix" => "web"], function () {
			Route::get('/', 'WebController@index')->name("index")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
			Route::put('/', 'WebController@update')->name("update")->middleware(['role:' . implode('|', [RoleEnum::SUPERADMIN,RoleEnum::ADMINISTRATOR])]);
		});

	});

});

	   

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        Route::get('/register', 'Auth\RegisterController@show')->name('register.show');
        Route::post('/register', 'Auth\RegisterController@register')->name('register.perform');
        Route::get('/login', 'Auth\LoginController@show')->name('login.show');
        Route::post('/login', 'Auth\LoginController@login')->name('login.perform');
    });

    Route::get('/logout', 'Auth\LogoutController@perform')->name('logout.perform');
    Route::group(['middleware' => ['auth','permission'], 'prefix' => 'system'], function() {
        Route::get('/', 'AdminDashboardController@index')->name('system.index');
        Route::resource('roles', Permission\RolesController::class);
        Route::resource('permissions', Permission\PermissionsController::class);
        Route::resource('users', Permission\UsersController::class);
        Route::resource('status', StatusController::class);
        Route::resource('tasks', TaskController::class);
        // assign role to user
        Route::post('assign/role-to-user', 'Permission\UsersController@assignRoleToUser')->name('assignRoleToUser');
    });
});

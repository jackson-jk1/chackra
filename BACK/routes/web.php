<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', 'App\Http\Controllers\API\HomeController@index');
Route::post('/', 'App\Http\Controllers\API\HomeController@email')->name('mail');

Auth::routes();


Route::group(['middleware' => 'can:admin'],function (){
        Route::get('/admin/Home', 'App\Http\Controllers\API\HomeController@indexAdmin')->name('Home');
        Route::get('/clients','App\Http\Controllers\API\EventController@loadEvents')->name('routeLoadEvents');
        Route::resource('/event','App\Http\Controllers\API\EventController');
        Route::resource('/admin', 'App\Http\Controllers\API\AdminController');
        Route::resource('/imagen', 'App\Http\Controllers\API\ImagesController');
        Route::get('/eventos', 'App\Http\Controllers\API\EventController@index')->name('eventos');
        Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');
        Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});

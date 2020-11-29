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

Auth::routes();

Route::get('/', 'App\Http\Controllers\API\HomeController@index');

Route::group(['middleware' => 'can:admin'],function (){

        Route::get('/admin/Home', 'App\Http\Controllers\API\HomeController@indexAdmin')->name('Home');
        Route::get('/clients','App\Http\Controllers\API\EventController@loadEvents')->name('routeLoadEvents');
        Route::resource('/imagens', 'App\Http\Controllers\API\ImagesController');
        Route::get('/eventos', 'App\Http\Controllers\API\EventController@index')->name('eventos');

});

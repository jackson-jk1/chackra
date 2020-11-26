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
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/Home', 'App\Http\Controllers\API\HomeController@index')->name('Home');

Route::group([
    'prefix' => 'admin',
], function () {
    Route::resource('/Home', 'App\Http\Controllers\API\HomeController');

});

Route::group([
    'prefix' => 'calendar',
], function () {
    Route::get('/clients','App\Http\Controllers\API\EventController@loadEvents')->name('routeLoadEvents');

});

Route::group([
    'prefix' => 'photos',
], function () {
    Route::resource('/imagens', 'App\Http\Controllers\API\ImagesController');
});

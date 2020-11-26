<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* route images */

Route::apiResource('portfolio','App\Http\Controllers\API\PortfolioController');

/* route user */
// Route::post('login', 'API\AuthController@login');
//Route::post('signup', 'API\AuthController@signup');
//Route::middleware(['auth:api'])->group(function () {

    //Route::get('logout', 'API\AuthController@logout');
   // Route::get('user', 'API\AuthController@user');

//});

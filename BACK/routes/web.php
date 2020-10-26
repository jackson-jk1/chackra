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
   Mail::send('mail.treinamento',['curso'=>'eloquent'],function($m){
     $m->from('jackson.longo.santos@gmail.com','jackson');
     $m->subject('garaio');
     $m->to('biladanoar@gmail.com');
   });
});

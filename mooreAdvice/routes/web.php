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


Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    //config clear
     $exitCode = Artisan::call('config:cache');
    return 'clear';
    // return what you want
});
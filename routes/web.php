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
Route::get('sitemap.xml', 'PageController@sitemap');
Route::get('/', 'PageController@landing');
Route::get('/admin', 'PageController@admin')->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

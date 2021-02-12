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

Route::post('/session', 'Api\PhotoController@storeSession');
Route::get('/photo-sessions', 'Api\PhotoController@getSessions');
Route::post('/upload-photo', 'Api\PhotoController@upload');
Route::get('/all-photos', 'Api\PhotoController@getPhotos');
Route::get('/wedding-photos', 'Api\PhotoController@getWeddingPhotos');
Route::get('/other-photos', 'Api\PhotoController@getOtherPhotos');
Route::get('/full-session/{categoryId}', 'Api\PhotoController@loadSession');
Route::post('/delete', 'Api\PhotoController@delete');

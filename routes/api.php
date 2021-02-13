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

Route::post('/session', 'Api\PhotoSessionController@storeSession');
Route::get('/photo-sessions', 'Api\PhotoSessionController@getSessions');

Route::get('/wedding-sessions-list', 'Api\PhotoController@getWeddingSessionsList');
Route::get('/photo-sessions/{id}', 'Api\PhotoController@getPhotoSession');
Route::patch('/photo-sessions/{sessionId}/photo/{photoId}/set-main', 'Api\PhotoController@setMainPhoto');

Route::post('/upload-photo', 'Api\PhotoController@upload');
Route::get('/all-photos', 'Api\PhotoController@getPhotos');
Route::get('/wedding-photos', 'Api\PhotoController@getWeddingPhotos');
Route::get('/other-photos', 'Api\PhotoController@getOtherPhotos');
Route::get('/full-session/{photoSessionId}', 'Api\PhotoController@loadSession');
Route::post('/delete', 'Api\PhotoController@delete');

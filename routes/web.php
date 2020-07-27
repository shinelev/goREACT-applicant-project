<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/user/{id}/files', 'FilesController@getFiles');

Route::post('/files/upload', 'FilesController@upload');

Route::get('/files/download/{file_id}', 'FilesController@downloadFile')->middleware('auth');

Route::delete('/files/delete/{file_id}', 'FilesController@delete');

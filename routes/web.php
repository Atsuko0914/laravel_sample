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
    return view('welcome');
});

Route::get('/', 'ContactsController@index')->name('contact');
Route::post('/confirm', 'ContactsController@confirm')->name('confirm');
Route::post('/process', 'ContactsController@process')->name('process');
Route::get('/complete', 'ContactsController@complete')->name('complete');

Route::get('samples/', 'SamplesController@index')->name('samples');
Route::post('samples/confirm', 'SamplesController@confirm')->name('confirm');
Route::post('samples/process', 'SamplesController@process')->name('process');
Route::get('samples/complete', 'SamplesController@complete')->name('complete');


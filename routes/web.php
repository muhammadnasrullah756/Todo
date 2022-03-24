<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'TodoController@create')->middleware('auth');
Route::post('/store', 'TodoController@store')->middleware('auth');
Route::get('/edit/{id}', 'TodoController@edit')->middleware('auth');
Route::put('/update/{id}', 'TodoController@update')->middleware('auth');
Route::delete('/delete/{id}', 'TodoController@delete')->middleware('auth');

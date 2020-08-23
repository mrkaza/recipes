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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/recepies', 'RecepieController@index')->name('recepies.index');

Route::get('/recepies/create', 'RecepieController@create')->name('recepies.create')->middleware('auth');

Route::get('/recepies/{id}', 'RecepieController@show')->name('recepies.show');

Route::get('/recepies/{id}/update','RecepieController@update')->name('recepies.update')->middleware('auth');

Route::put('/recepies/{id}','RecepieController@edit')->name('recepies.edit')->middleware('auth');

Route::post('/recepies', 'RecepieController@store')->name('recepies.store')->middleware('auth');

Route::delete('/recepies/{id}', 'RecepieController@destroy')->name('recepies.destroy')->middleware('auth');



Route::get('/user/{id}', 'UserController@index')->name('users.index');

// Route::post('/recepies/{id}', 'CommentController@create');

Route::post('/comments/{id}', 'RecepieController@comment')->middleware('auth');

Route::post('/recepies/{id}', 'RecepieController@favourites')->middleware('auth');


Route::get('/user/{id}/favourites', 'UserController@favourites')->name('users.favourites')->middleware('auth');
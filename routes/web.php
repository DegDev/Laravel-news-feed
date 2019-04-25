<?php

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

Route::get('/', 'NewsController@index');

Route::post('/news', 'NewsController@store');
Route::get('/news/create','NewsController@create')->name('news.create_form');
Route::get('/news/edit/{news}', 'NewsController@edit')->name('news.edit_form');
Route::delete('/news/delete/{news}','NewsController@destroy')->name('news.delete');
Route::get('/news/{category}','NewsController@index');
Route::get('/news/{category}/{news}','NewsController@show');
Route::patch('/news/update/{news}', 'NewsController@update')->name('news.update');


Route::get('/manager','ManagerController@index');

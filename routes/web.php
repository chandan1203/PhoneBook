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
Route::get('/', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'DashboardController@create')->name('create');
Route::post('/create', 'DashboardController@store')->name('store');
Route::get('/edit/{id}', 'DashboardController@edit')->name('edit');
Route::post('/update/{id}', 'DashboardController@update')->name('update');
Route::post('/delete/{id}', 'DashboardController@delete')->name('delete');
Route::get('/search', 'DashboardController@search')->name('search');
Route::get('/pdf/{id}', 'DashboardController@MakePdf')->name('MakePdf');



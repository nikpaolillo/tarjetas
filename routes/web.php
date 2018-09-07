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




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/select-user-view', 'HomeController@indexSelectUser')->name('index.select.user');
Route::post('/select-user', 'HomeController@selectUser')->name('select.user');

require __DIR__ . '/superadmin/web.php';

Route::get('admin', 'AdminController@index')->name('admin');

Route::get('usuario', 'UsuarioController@index')->name('usuario');






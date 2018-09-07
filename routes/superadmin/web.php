<?php

Route::get('superadmin', 'superadmin\SuperAdminController@index')->name('superadmin');
Route::resource('superadmin/users', 'UsersController');
Route::resource('superadmin/operadoras', 'OperadorasController');
Route::resource('superadmin/categorias', 'CategoriasController');
Route::resource('superadmin/ubicaciones', 'UbicacionesController');
Route::resource('superadmin/clasificaciones', 'ClasificacionesController');
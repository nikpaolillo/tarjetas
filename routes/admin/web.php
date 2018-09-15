<?php

Route::get('admin', 'admin\AdminController@index')->name('admin');

Route::resource('admin/equipos', 'EquiposController');

Route::post('admin/equipos/ubicacion', 'EquiposController@nuevaUbicacion')->name('equipos.ubicacion');

Route::resource('admin/modelos', 'ModelosController');
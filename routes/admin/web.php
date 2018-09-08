<?php

Route::get('admin', 'admin\AdminController@index')->name('admin');

Route::resource('admin/equipos', 'EquiposController');
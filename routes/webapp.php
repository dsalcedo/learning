<?php

Route::group(['namespace'=>'Webapp'], function (){
    Route::get('/', 'WelcomeController@index')->name('webapp.index');

    Route::group(['prefix'=>'curso'], function(){
        Route::get('{cursoCve}/cuid/{cursoId}', 'CursoController@index')->name('webapp.aprende.curso');
    });
});

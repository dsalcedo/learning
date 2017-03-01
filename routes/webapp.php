<?php

Route::group(['namespace'=>'Webapp'], function (){
    Route::get('/', 'WelcomeController@index')->name('webapp.index');

    Route::group(['prefix'=>'curso'], function(){
        Route::get('{cursoStr}/c/{cursoId}', 'CursoController@index')->name('webapp.aprende.curso');
        Route::get('{cursoStr}/leccion/{indice}/l/{leccionId}', 'LeccionController@index')->name('webapp.curso.leccion');
    });
});

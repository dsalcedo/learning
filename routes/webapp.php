<?php

Route::group(['namespace'=>'Webapp'], function (){
    Route::get('/', 'WelcomeController@index')->name('webapp.index');

    Route::group(['prefix'=>'curso'], function(){
        Route::get('{cursoStr}/c/{cursoId}', 'CursoController@index')->name('webapp.aprende.curso');
        Route::get('{cursoStr}/leccion/{indice}/l/{leccionId}', 'LeccionController@index')->name('webapp.curso.leccion');
    });

    Route::get('perfil', 'PerfilController@index')->name('webapp.perfil');
    Route::post('perfil', 'PerfilController@updatePerfil')->name('perfil.update');

    Route::get('suscripcion', 'SuscripcionesController@index')->name('webapp.suscripcion');
    Route::get('suscripcion/{suscripcionId}/{strClave}', 'SuscripcionesController@index')->name('comprar.suscripcion');

    Route::get('compras', 'PerfilController@index')->name('webapp.compras');
});

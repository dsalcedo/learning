<?php

Route::group(['namespace'=>'Webapp'], function (){
    Route::get('/', 'WelcomeController@index')->name('webapp.index');

    Route::group(['prefix'=>'curso', 'middleware'=>'checksuscription'], function(){
        Route::get('{cursoStr}/c/{cursoId}', 'CursoController@index')->name('webapp.aprende.curso');
        Route::get('{cursoStr}/leccion/{indice}/l/{leccionId}', 'LeccionController@index')->name('webapp.curso.leccion');
        Route::get('agregar/avance/l/{leccionId}', 'CursoController@agregarAvance')->name('curso.agregar.avance');
    });

    Route::get('perfil', 'PerfilController@index')->name('webapp.perfil');
    Route::post('perfil', 'PerfilController@updatePerfil')->name('perfil.update');

    Route::get('suscripciones', 'SuscripcionesController@index')->name('webapp.suscripcion');
    Route::post('comprar/suscripcion/{suscripcionId}/{strClave}', 'SuscripcionesController@comprarSuscripcion')->name('comprar.suscripcion');
    Route::get('comprar/suscripcion/{suscripcionId}/{strClave}/{metodo?}', 'SuscripcionesController@comprarSuscripcionGet')->name('get.comprar.suscripcion');
    Route::post('procesar-compra/{suscripcionId}/{metodo}', 'SuscripcionesController@procesarCompra')->name('procesar.compra');

    Route::get('compras', 'PerfilController@index')->name('webapp.compras'); // funciona ??

    Route::get('compra/recibo/oxxo-pay/{oxxoId}', 'ReciboOxxoPayController@index')->name('webapp.recibo.oxxo');
});

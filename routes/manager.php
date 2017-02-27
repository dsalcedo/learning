<?php

Route::group(['namespace'=>'Manager'], function (){
    Route::get('/', 'ManagerController@index')->name('manage.index');

    Route::group(['prefix'=>'carreras'], function (){
        Route::get('/', 'ManagerCarrerasController@index')->name('manage.carreras');
        Route::get('crear', 'ManagerCarrerasController@crear')->name('carreras.crear');
        Route::post('crear', 'ManagerCarrerasController@crearPost')->name('carreras.crear.post');
        Route::get('editar/{carreraId}', 'ManagerCarrerasController@editar')->name('carrera.editar');
        Route::post('editar/{carreraId}', 'ManagerCarrerasController@editarPost')->name('carrera.editar.post');
    });

    Route::group(['prefix'=>'cursos'], function (){
        Route::get('/', 'ManagerCursosController@index')->name('manage.cursos');
        Route::get('crear', 'ManagerCursosController@crear')->name('manage.cursos.crear');
        Route::post('crear', 'ManagerCursosController@crearPost')->name('cursos.crear.post');
        Route::get('editar/{cursoId}', 'ManagerCursosController@editar')->name('manage.cursos.editar');
        Route::post('editar/{cursoId}', 'ManagerCursosController@editarPost')->name('cursos.editar.post');

    });
    Route::group(['prefix'=>'curso'], function (){
        Route::get('{cursoId}/lecciones', 'ManagerLeccionesController@index')->name('manage.curso.lecciones');
        Route::get('{cursoId}/lecciones/crear', 'ManagerLeccionesController@crear')->name('curso.lecciones.crear');
    });

    Route::get('usuarios', 'ManagerController@index')->name('manage.usuarios');
});

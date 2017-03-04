<?php

Route::group(['namespace'=>'Manager'], function (){
    Route::get('/', 'ManagerController@index')->name('manage.index');

    Route::group(['prefix'=>'suscripciones'], function (){
        Route::get('/', 'ManagerSuscripcionesController@index')->name('manage.suscripciones');
        Route::get('crear', 'ManagerSuscripcionesController@crear')->name('suscripciones.crear');
        Route::post('crear', 'ManagerSuscripcionesController@crearPost')->name('suscripciones.crear.post');
        Route::get('editar/{suscripcionId}', 'ManagerSuscripcionesController@editar')->name('suscripciones.editar');
        Route::post('editar/{suscripcionId}', 'ManagerSuscripcionesController@editarPost')->name('suscripcion.editar.post');
    });

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

    // Lecciones
    Route::group(['prefix'=>'curso'], function (){
        Route::get('{cursoId}/lecciones', 'ManagerLeccionesController@index')->name('manage.curso.lecciones');
        Route::get('{cursoId}/lecciones/crear', 'ManagerLeccionesController@crear')->name('curso.lecciones.crear');
        Route::post('{cursoId}/lecciones/crear', 'ManagerLeccionesController@crearPost')->name('lecciones.crear.post');
        Route::post('ajax/leccion', 'ManagerLeccionesController@ajaxLeccion')->name('ajax.leccion.manage');

        Route::get('editar/leccion/{leccionId}', 'ManagerLeccionesController@editar')->name('curso.leccion.editar');
        Route::post('editar/leccion/{leccionId}', 'ManagerLeccionesController@editarPost')->name('curso.leccion.editarPost');

        Route::get('administrar/contenido/leccion/{leccionId}', 'ManagerLeccionesController@contenido')->name('leccion.administrar.contenido');
        Route::post('administrar/contenido/leccion/{leccionId}', 'ManagerLeccionesController@contenidoPost')->name('administrar.contenido.post');
    });

    Route::group(['prefix'=>'usuarios'], function (){
        Route::get('/', 'ManagerUsuariosController@index')->name('manage.usuarios');
        Route::get('crear', 'ManagerUsuariosController@crear')->name('usuarios.crear');
        Route::post('crear', 'ManagerUsuariosController@crearPost')->name('usuarios.crear.post');
        Route::get('editar/{usuarioId}', 'ManagerUsuariosController@editar')->name('usuarios.editar');
        Route::post('editar/{usuarioId}', 'ManagerUsuariosController@editarPost')->name('usuario.editar.post');
    });

    Route::group(['prefix'=>'activaciones'], function (){
        Route::get('/', 'ManagerActivacionesController@index')->name('manage.activaciones');
    });
});

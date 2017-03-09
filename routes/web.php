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

Route::get('/', 'Website\WebsiteController@index')->name('website.index');
Route::get('registro', 'Website\RegistroController@index')->name('website.registro');
Route::post('registro', 'Auth\RegisterController@register')->name('registro.post');
Route::get('acceso', 'Website\WebsiteController@index')->name('website.acceso');
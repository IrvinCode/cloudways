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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'HomeController@perfil')->name('perfil');

Route::get('/cursos', 'CursosController@introduccion')->name('cursos');

Route::post('/cursos/tomar', 'HomeController@tomarCurso')->name('cursos/tomar');

Route::get('/cursos/nuevo', 'HomeController@nuevoCurso')->name('cursos/nuevo');

Route::post('/cursos/nuevo', 'HomeController@crearCurso')->name('cursos/nuevo');
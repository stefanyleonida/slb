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
    return view('inicio.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rotas de Biblioteca
Route::get('/bibliotecas/lista', 'BibliotecaController@listar')->name('bibliotecas.listar');
Route::get('/bibliotecas/cadastro','BibliotecaController@cadastro')->name('bibliotecas.cadastro');
Route::post('/bibliotecas/cadastrar', 'BibliotecaController@cadastrar')->name('bibliotecas.cadastrar');
Route::get('/bibliotecas/edicao/{biblioteca}','BibliotecaController@edicao')->name('bibliotecas.edicao');
Route::post('/bibliotecas/editar/{biblioteca}','BibliotecaController@editar')->name('bibliotecas.editar');
Route::get('/bibliotecas/visualizar/{biblioteca}','BibliotecaController@visualizar')->name('bibliotecas.visualizar');
Route::get('/bibliotecas/altera_status/{biblioteca}','BibliotecaController@alteraStatus')->name('bibliotecas.altera_status');

// Rotas de livros
Route::get('/livros/lista', 'LivroController@listar')->name('livros.listar');
Route::get('/livros/cadastro', 'LivroController@cadastro')->name('livros.cadastro');
Route::get('/livros/editar', 'LivroController@edicao')->name('livros.edicao');

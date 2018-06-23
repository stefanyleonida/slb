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
Route::post('/logar', 'LogarController@logar')->name('logar');

//Rotas de Usuários
Route::post('/usuarios/trocar_senha/{user?}', 'UserController@trocarSenha')->name('usuarios.trocar_senha');
Route::get('/usuarios/listar', 'UserController@listar')->name('usuarios.listar');
Route::get('/usuarios/alterar_status/{user}', 'UserController@alterarStatus')->name('usuarios.alterar_status');
Route::post('/usuarios/recuperar_senha', 'UserController@recuperarSenha')->name('usuarios.recuperar_senha');
Route::get('/usuarios/cadastro', 'UserController@cadastro')->name('usuarios.cadastro');
Route::post('/usuarios/cadastrar', 'UserController@cadastrar')->name('usuarios.cadastrar');
Route::get('/usuarios/edicao/{usuario}', 'UserController@edicao')->name('usuarios.edicao');
Route::post('/usuarios/editar/{usuario}', 'UserController@editar')->name('usuarios.editar');
Route::get('/usuarios/visualizar/{usuario}', 'UserController@visualizar')->name('usuarios.visualizar');



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
Route::post('/livros/cadastrar', 'LivroController@cadastrar')->name('livros.cadastrar');
Route::get('/livros/edicao/{livro}', 'LivroController@edicao')->name('livros.edicao');
Route::post('/livros/editar/{livro}', 'LivroController@editar')->name('livros.editar');
Route::get('/livros/excluir/{id}', 'LivroController@excluir')->name('livros.excluir');
Route::get('/livros/visualizar/{livro}', 'LivroController@visualizar')->name('livros.visualizar');

//Rotas de Pesquisa
Route::get('/pesquisa', 'PesquisaController@pesquisar')->name('pesquisar');

//rota do relatório
Route::get('/relatorio', 'RelatorioController@relatorio')->name('relatorio');
Route::get('/relatorio_pdf', 'RelatorioController@pdf')->name('relatorio_pdf');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivroController extends Controller
{
  public function listar()
  {

    return view('livros.lista');
  }

   public function cadastro()
  {
    return view('livros.cadastro');
  }
  public function edicao()
  {
    return view('livros.editar');
  }
  /*public function visualizar()
  {
    return view('livros.visualizar');
  } */ 
}

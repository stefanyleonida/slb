@extends('layouts.php')

@section('title','VISUALIZAR LIVRO')

@section('content')

<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header bg-primary text-light font-weight-bold">Visualizar Livro</div>
    <div class="card-body">
      <table class="table table-condensed">
        <tr>
          <td colspan="2"> <b>Título:</b> {{ $livro->nome_livro }} </td>
        </tr>
        <tr>
          <td> <b>Edição:</b> {{ $livro->edicao }} </td>
          <td> <b>Ano:</b> {{ $livro->ano }}</td>
        </tr>
        <tr>
          <td> <b>Editora:</b> {{ $livro->editora}}</td>
        </tr>
        <tr>
          <td> <b>ISBN:</b> {{ $livro->isbn}}</td>
        </tr>
        <tr>
          <td colspan="2"> <b>Idioma:</b> {{ $livro->idioma() }}</td>
        </tr>
        <tr>
          <td colspan="2"> <b>Categoria:</b> {{ $livro->categoria }}</td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
      </table>

      <div class="text-center">
        <a href="{{ route('livros.edicao', $livro) }}" class="btn btn-primary btn-sm">Editar</a>
        <button type="button" class="btn btn-info btn-sm voltar">Voltar</button>
      </div>
  </div>
</div>

endsection

@extends('layouts.app')

@section('title', 'LISTA LIVROS')

@section('content')
<div class="row">
  <a href="{{route('livros.cadastro')}}" class="btn btn-primary">Cadastrar Livro</a>
</div>
<div class="col-md-12 text-center">
  <h4 class="" style="margin-top: 50px">Lista de Livros</h4>
</div>
  <div class="row" style="margin-top: 10px;">
    <table class="table table-hover table-bordered table-condensed table-striped dataTable">
    <thead class="bg-info">
      <tr class="text-light">
        <th>Livros</th>
        <th>Edição</th>
        <th>Ano</th>
        <th width="300px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($livros as $livro)
      <tr>
        <td>{{ $livro->nome_livro }}</td>
        <td>{{ $livro->edicao }}</td>
        <td>{{ $livro->ano }}</td>
        <td class="text-center">
          <a href="{{route('livros.edicao',$livro)}}" class=" btn btn-primary" title="editar" >Editar</a>
          <a href="{{route('livros.visualizar', $livro)}}" class=" btn btn-info" title="visualizar" >Visualizar</a>
          <button data-href="{{ route('livros.excluir', $livro->id) }}" class=" btn btn-danger excluir" title="excluir">Excluir</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection

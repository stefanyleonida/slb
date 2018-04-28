@extends('layouts.app')

@section('title', 'LISTA LIVROS')

@section('content')
<div class="row">
  <a href="{{route('livros.cadastro')}}" class="btn btn-primary">Cadastrar Livro</a>
</div>
<div class="col-md-12">
  <h4 class="" style="margin-top: 50px">Lista de Livros</h4>
  <div class="row" style="margin-top: 10px;">
    <table class="table table-hover table-bordered table-condensed table-striped dataTable">
    <thead class="bg-info">
      <tr class="text-light">
        <th scope="col">Livros</th>
        <th scope="col">Edição</th>
        <th scope="col">Ano</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td>8</td>
        <td>2000</td>
        <td class="text-center">
          <a href="{{route('livros.edicao')}}" class=" btn btn-primary" title="editar" >Editar</a>
          <a href="" class=" btn btn-info" title="visualizar" >Visualizar</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>


@endsection

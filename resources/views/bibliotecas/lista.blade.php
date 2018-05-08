@extends('layouts.app')

@section('title', 'LISTA BIBLIOTECAS')

@section('content')
<div class="row">
  <a href="{{route('bibliotecas.cadastro')}}" class="btn btn-primary">Cadastrar Biblioteca</a>
</div>
<div class="col-md-12">
  <center><h4 class="" style="margin-top: 50px">Lista de Bibliotecas</h4></center>
  <div class="row" style="margin-top: 10px;">
    <table class="table table-hover table-bordered table-condensed table-striped dataTable">
    <thead class="bg-info">
      <tr class="text-light">
        <th scope="col">Bibliotecas</th>
        <th scope="col">Cidades</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($lista_bibliotecas as $biblioteca)
      <tr>
        <td>{{$biblioteca->nome_biblioteca}}</td>
        <td>{{$biblioteca->cidade->cidade}}</td>
        <td>{{$biblioteca->status()}}</td>
        <td class="text-center">
          <a href="{{route('bibliotecas.edicao', $biblioteca)}}" class=" btn btn-primary btn-sm" title="editar" >Editar</a>
          <a href="{{route('bibliotecas.visualizar', $biblioteca)}}" class=" btn btn-info btn-sm" title="visualizar" >Visualizar</a>
          @if($biblioteca->status == 1)
            <a href="{{ route('bibliotecas.altera_status', $biblioteca) }}" class="btn btn-danger btn-sm">Inativar</a>
          @else
            <a href="{{ route('bibliotecas.altera_status', $biblioteca) }}" class="btn btn-success btn-sm" style="width: 63.18px;">Ativar</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection

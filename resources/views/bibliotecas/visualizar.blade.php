@extends('layouts.app')

@section('title', 'VISUALIZAR BIBLIOTECA')

@section('content')

<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-primary text-light font-weight-bold">Visualizar Biblioteca</div>
    <div class="card-body">
      <table class="table table-condensed">
        <tr>
          <td colspan="2"> <b>Biblioteca:</b> {{ $biblioteca->nome_biblioteca }} </td>
        </tr>
        <tr>
          <td> <b>CEP:</b> {{ $biblioteca->cep }} </td>
          <td> <b>Cidade:</b> {{ $biblioteca->cidade->cidade }}</td>
        </tr>
        <tr>
          <td> <b>Telefone:</b> {{ $biblioteca->telefone}}</td>
          <td> <b>Status:</b> {{ $biblioteca->status()}}</td>
        </tr>
        <tr>
          <td colspan="2"> <b>Endereço:</b> {{ $biblioteca->endereco }}</td>
        </tr>
        <tr>
          <td colspan="2"> <b>Instituição:</b> {{ $biblioteca->instituicao != "" ? $biblioteca->instituicao : 'Não informada' }}</td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
      </table>
      <div class="text-center">
        @if(Auth::user()->id_tipo_usuario != 2)
          <a href="{{ route('bibliotecas.edicao', $biblioteca) }}" class="btn btn-primary btn-sm">Editar</a>
        @endif        
        <button type="button" class="btn btn-info btn-sm voltar">Voltar</button>
      </div>
  </div>
</div>
@endsection

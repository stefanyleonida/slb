@extends('layouts.app')
@section('title','VISUALIZAR CADASTRO')
@section('content')

<div class="col-md-7 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-primary text-light font-weight-bold">Visualizar Usuário</div>
    <div class="card-body">
      <table class="table table-condensed">
        <tr>
          <td colspan="2"> <b>Nome:</b> {{ $usuario->name }} </td>
        </tr>
        <tr>
          <td colspan="2"> <b>E-mail:</b> {{ $usuario->email }} </td>
        </tr>
        <tr>
          <td> <b>CPF:</b> {{ $usuario->cpf }}</td>
          <td> <b>Status:</b> {{ $usuario->status() }}</td>
        </tr>
        <tr>
          <td> <b>Biblioteca:</b> {{ $usuario->biblioteca->nome_biblioteca }}</td>
          <td> <b>Tipo de Usuário:</b> {{ $usuario->getTipo->tipo_usuario }}</td>
        </tr>
      </table>
      <div class="text-center">
        <a href="{{ route('usuarios.edicao', $usuario) }}" class="btn btn-primary btn-sm">Editar</a>
        <button type="button" class="btn btn-info btn-sm voltar">Voltar</button>
      </div>
  </div>
</div>

@endsection

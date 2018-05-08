@extends('layouts.app')

@section('title', 'LISTA DE USUÁRIOS')

@section('content')

<div class="col-xs-12">
  <a class="btn btn-primary" href="#">Cadastrar Usuário</a>
</div>

<div class="col-xs-12 text-center" style="margin-top: 50px">
  <h4>Lista de Usuários</h4>
</div>

<div class="col-xs-12" style="margin-top: 10px;">
  <table class="table table-hover table-bordered table-condensed table-striped dataTable">
    <thead>
      <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Tipo Usuário</th>
        <th>Biblioteca</th>
        <th>Status</th>
        <th class="text-center">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $usuario)
      <tr>
        <td>{{ $usuario->name }}</td>
        <td>{{ $usuario->cpf }}</td>
        <td>{{ $usuario->getTipo->tipo_usuario }}</td>
        <td>{{ $usuario->biblioteca->nome_biblioteca }}</td>
        <td>{{ $usuario->status() }}</td>
        <td class="text-center">
          <a class="btn btn-primary btn-sm" href="#">Editar</a>
          <a class="btn btn-info btn-sm" href="#">Visualizar</a>
          <a class="btn {{ $usuario->status == 1 ? 'btn-danger' : 'btn-success' }} btn-sm" href="{{ route('usuarios.alterar_status', $usuario) }}">{{ $usuario->status == 1 ? 'Inativar' : 'Ativar' }}</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

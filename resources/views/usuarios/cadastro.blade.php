@extends('layouts.app')

@section('title', 'CADASTRO DE USUÁRIOS')

@section('content')

<div class="col-md-7 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-primary text-light">Cadastrar de Usuário</div>
    <div class="card-body">
      <form class="" action="" method="post" id="form_cadastro">
        @include('usuarios.form')
      </form>
    </div>
  </div>
</div>

@endsection

@extends('layouts.app')

@section('title', 'EDITAR USUÁRIO')

@section('content')
<div class="col-md-7 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-primary text-light">Editar Usuário</div>
    <div class="card-body">
      <form class="" action="{{ route('usuarios.editar', $usuario) }}" method="post" id="form_cadastro">
        @include('usuarios.form')
      </form>
    </div>
  </div>
</div>
@endsection

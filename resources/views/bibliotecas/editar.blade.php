@extends('layouts.app')

@section('title', 'EDIÇÃO DE CADASTRO BIBLIOTECA')

@section('content')
<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header bg-info">Editar Biblioteca</div>
    <div class="card-body">
      <form class="" action="" method="post">
        @include('bibliotecas.form')
      </form>
    </div>
  </div>
</div>
@endsection

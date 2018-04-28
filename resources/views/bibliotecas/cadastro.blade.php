@extends('layouts.app')

@section('title', 'CADASTRO DE BIBLIOTECA')

@section('content')
<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header  bg-primary text-light">Cadastrar Biblioteca</div>
    <div class="card-body">
      <form class="" action="{{ route('bibliotecas.cadastrar') }}" method="post" >
        @include('bibliotecas.form')
      </form>
    </div>
  </div>
</div>
@endsection

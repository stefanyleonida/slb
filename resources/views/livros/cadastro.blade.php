@extends('layouts.app')

@section('title', 'CADASTRO DE LIVRO')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header  bg-primary text-light">Cadastrar Livro</div>
    <div class="card-body">
      <form class="" action="{{ route('livros.cadastrar') }}" method="post" >
        @include('livros.form')
      </form>
    </div>
  </div>
</div>
@endsection

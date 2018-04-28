@extends('layouts.app')

@section('title', 'CADASTRO DE LIVRO')

@section('content')
<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header  bg-primary text-light">Cadastrar Livro</div>
    <div class="card-body">
      <form class="" action="" method="post" >
        @include('livros.form')
      </form>
    </div>
  </div>
</div>
@endsection

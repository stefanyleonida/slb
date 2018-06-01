@extends('layouts.app')

@section('title', 'EDIÇÃO DE CADASTRO LIVRO')

@section('content')
<div class="col-md-7 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-primary text-light">Editar Livro</div>
    <div class="card-body">
      <form class="" action="{{ route('livros.editar', $livro) }}" method="post">
        @include('livros.form')
      </form>
    </div>
  </div>
</div>
@endsection

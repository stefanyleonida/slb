@extends('layouts.app')

@section('title', 'RESULTADO DA BUSCA')

@section('content')

<div class="row div_topo">
  <div class="col-md-8 mx-auto">
    <form class="form-inline" type="post" action="{{ route('pesquisar') }}" id="form_buscar">
        @csrf
        <img src="{{ asset('img/logo_slb2.jpg') }}" alt="" width="20%">
        <input class="form-control" type="text" name="busca" id="busca" max-lenght="100" style="width: 70%;" value="{{ isset($busca) ? $busca : '' }}">
        <button type="submit" class="btn btn-info" style="margin-left: 15px;">
          <img src="{{ asset('img/search-icon-hi.png') }}" alt="" width="25px" height="25px">
        </button>
    </form>
  </div>
</div>
<div class="row div_resultado" style="margin-top:20px;">
  <div class="col-md-8 mx-auto">
    <table class="table table-hover table-condensed table-bordered table-striped dataTable">
      <thead class="bg-info text-light">
        <tr>
          <th>Livro</th>
          <th>Biblioteca</th>
          <th>Categoria</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($livros))
          @foreach($livros as $livro)
          <tr>
            <td>
              <b>Nome do Livro:</b> {{ $livro->nome_livro }} <br>
              <b>Edição:</b> {{ $livro->edicao }} <br>
              <b>Ano:</b> {{ $livro->ano }} <br>
              <b>Autor:</b> {{ $livro->autor }} <br>
              <b>Editora:</b> {{ $livro->editora }} <br>
              <b>ISBN:</b> {{ $livro->isbn }} <br>
              <b>Idioma:</b> {{ $livro->getIdioma->idioma }}
            </td>
            <td>
              <b>Nome Biblioteca:</b> {{ $livro->getBiblioteca->nome_biblioteca }} <br>
              <b>Endereço:</b> {{ $livro->getBiblioteca->endereco }} <br>
              <b>CEP:</b> {{ $livro->getBiblioteca->cep }} <br>
              <b>Telefone:</b> {{ $livro->getBiblioteca->telefone }}
            </td>
            <td> <b>Tipo da Categoria:</b> {{ $livro->getCategoria != null ? $livro->getCategoria->categoria : 'Não Informado.' }}</td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    <button type="button" class="btn btn-info btn-sm voltar" style="margin-left:17px;">Voltar</button>
  </div>
</div>

@endsection

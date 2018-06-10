@extends('layouts.app')

@section('title', 'RELATÓRIO')

@section('content')
<style media="screen">
  .divisor {
    border-bottom: 3px solid #17a2b8;
  }

  .custom_table {
    border-left: 3px solid #17a2b8;
    border-right: 3px solid #17a2b8;
    border-top: 3px solid #17a2b8;
  }

  .filtro {
    border: 3px solid #17a2b8;
    border-radius: 4px;
    margin-bottom: 10px;
    padding: 5px;
  }

  .form-control, .btn {
    margin: 5px;
  }
</style>

  <div class="filtro">
    <form class="form-inline" action="{{ route('relatorio') }}" method="get">
      <label for="">Filtrar por biblioteca:</label>
      <select class="form-control" name="filtro_biblioteca">
        <option value="">Todas</option>
        @foreach($select_bibliotecas as $biblioteca)
          <option value="{{ $biblioteca->id_biblioteca }}"> {{ $biblioteca->nome_biblioteca }} </option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-info">Filtrar</button>
      <a href="{{ route('relatorio') }}" class="btn btn-danger">Limpar</a>
    </form>
  </div>

  <div class="" id="resumo">
    <table class="table table-bordered table-condensed table-hover custom_table">
      <tr>
        <th colspan="3" class="bg-info text-center text-light">Relatório SBL</th>
      </tr>
      <tr>
        <td> <b>Quantidade de Bibliotecas:</b> {{ $qtd_bibliotecas }} </td>
        <td> <b>Quantidade de Livros:</b> {{ $qtd_livros }} </td>
        <td> <b>Quantidade de Usuários:</b> {{ $qtd_adm + $qtd_gestor + $qtd_biblio }} </td>
      </tr>
      <tr class="divisor">
        <td> <b>Quantidade de Administradores:</b> {{ $qtd_adm }} </td>
        <td> <b>Quantidade de Gestores:</b> {{ $qtd_gestor }} </td>
        <td> <b>Quantidade de Bibliotecários:</b> {{ $qtd_biblio }} </td>
      </tr>
    </table>
  </div>

  <div class="" id="tabela">

    @foreach($bibliotecas as $biblioteca)
      <table class="table table-bordered table-condensed table-hover custom_table">
        <tr>
          <td colspan="3" class="bg-info text-light">Biblioteca</td>
        </tr>
        <tr>
          <td colspan="2"> <b>Nome:</b> {{ $biblioteca->nome_biblioteca }} </td>
          <td> <b>Status:</b> {{ $biblioteca->status() }} </td>
        </tr>
        <tr>
          <td> <b>Data Cadastro:</b> {{ $biblioteca->created_at != "" ? date('d/m/Y', strtotime($biblioteca->created_at)) : '' }} </td>
          <td> <b>CEP:</b> {{ $biblioteca->cep }} </td>
          <td> <b>Telefone:</b> {{ $biblioteca->telefone }} </td>
        </tr>
        <tr>
          <td colspan="2"> <b>Endereço:</b> {{ $biblioteca->endereco }} </td>
          <td> <b>Cidade:</b> {{ $biblioteca->cidade->cidade }} </td>
        </tr>
        <tr>
          <td colspan="3" class="bg-info text-light">Usuários</td>
        </tr>
        @foreach($biblioteca->getUsuarios as $usuario)
          <tr>
            <td colspan="2"> <b>Nome:</b> {{ $usuario->name }} </td>
            <td> <b>Statu:</b> {{ $usuario->status() }} </td>
          </tr>
          <tr>
            <td> <b>CPF:</b> {{ $usuario->cpf }} </td>
            <td> <b>Perfil:</b> {{ $usuario->getTipo->tipo_usuario }} </td>
            <td> <b>Data do Cadastro:</b> {{ $usuario->created_at != "" ? date('d/m/Y', strtotime($usuario->created_at)) : '' }}  </td>
          </tr>
          <tr class="divisor">
            <td colspan="3"> <b>E-mail:</b> {{ $usuario->email }} </td>
          </tr>
        @endforeach
        @if($biblioteca->getUsuarios()->count() == 0)
        <tr class="divisor">
          <td colspan="3" class="text-center font-weight-bold">Nenhum usuário cadastrado.</td>
        </tr>
        @endif
        <tr>
          <td colspan="3" class="bg-info text-light">Livros</td>
        </tr>
        @foreach($biblioteca->getLivros as $livro)
        <tr>
          <td colspan="2"> <b>Título:</b> {{ $livro->nome_livro }} </td>
          <td> <b>Edição:</b> {{ $livro->edicao }} </td>
        </tr>
        <tr>
          <td> <b>Ano:</b> {{ $livro->ano }} </td>
          <td> <b>Idioma:</b> {{ $livro->getIdioma->idioma }} </td>
          <td> <b>Categoria:</b> {{ $livro->getCategoria->categoria }} </td>
        </tr>
        <tr>
          <td colspan="2"> <b>Autor:</b> {{ $livro->autor }} </td>
          <td> <b>ISBN:</b> {{ $livro->isbn }} </td>
        </tr>
        <tr>
          <td colspan="3"> <b>Editora:</b> {{ $livro->editora }} </td>
        </tr>
        <tr class="divisor">
          <td> <b>Data do cadastro:</b> {{ $livro->created_at != "" ? date('d/m/Y', strtotime($livro->created_at)) : "" }} </td>
          <td colspan="2"> <b>Cadastrado por:</b> {{ $livro->getUsuarioCadastro->name }} </td>
        </tr>
        @endforeach
        @if($biblioteca->getLivros()->count() == 0)
        <tr class="divisor">
          <td colspan="3" class="text-center font-weight-bold">Nenhum livro cadastrado.</td>
        </tr>
        @endif
      </table>
    @endforeach
  </div>
@endsection

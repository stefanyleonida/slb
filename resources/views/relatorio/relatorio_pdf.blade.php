<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>SLB - RELATÓRIO</title>
    <meta charset="utf-8">

</head>
  <body>
    <h3> <center> Relatório - Sistema de Localização de Biblioteca {{ date('d/m/Y') }} </center> </h3>
    <div>
      <table border="1px solid gray" style="width: 100%;">
        <tr>
          <th colspan="3" align="center" style="background: #d9d9d9;"> <b>RESUMO</b> </th>
        </tr>
        <tr>
          <td> <b>Quantidade de Bibliotecas:</b> {{ $qtd_bibliotecas }} </td>
          <td> <b>Quantidade de Livros:</b> {{ $qtd_livros }} </td>
          <td> <b>Quantidade de Usuários:</b> {{ $qtd_adm + $qtd_gestor + $qtd_biblio }} </td>
        </tr>
        <tr>
          <td> <b>Quantidade de Administradores:</b> {{ $qtd_adm }} </td>
          <td> <b>Quantidade de Gestores:</b> {{ $qtd_gestor }} </td>
          <td> <b>Quantidade de Bibliotecários:</b> {{ $qtd_biblio }} </td>
        </tr>
      </table>
    </div>
    @foreach($bibliotecas as $biblioteca)
    <div style="margin-top: 15px;">
      <table border="1px solid gray" style="width: 100%;">
        <tr>
          <td colspan="3" align="center" style="background: #d9d9d9;"> <b>BIBLIOTECA</b> </td>
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
          <td colspan="3" align="center" style="background: #d9d9d9;"> <b>USUÁRIOS</b> </td>
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
          <tr>
            <td colspan="3"> <b>E-mail:</b> {{ $usuario->email }} </td>
          </tr>
        @endforeach
        @if($biblioteca->getUsuarios()->count() == 0)
        <tr>
          <td colspan="3">Nenhum usuário cadastrado.</td>
        </tr>
        @endif
        <tr>
          <td colspan="3" align="center" style="background: #d9d9d9;"> <b>LIVROS</b> </td>
        </tr>
        @foreach($biblioteca->getLivros as $livro)
        <tr>
          <td colspan="2"> <b>Título:</b> {{ $livro->nome_livro }} </td>
          <td> <b>Edição:</b> {{ $livro->edicao }} </td>
        </tr>
        <tr>
          <td> <b>Ano:</b> {{ $livro->ano }} </td>
          <td> <b>Idioma:</b> {{ isset($livro->getIdioma->idioma) ? $livro->getIdioma->idioma : 'Não informado'}} </td>
          <td> <b>Categoria:</b> {{ isset($livro->getCategoria->categoria) ?  $livro->getCategoria->categoria : 'Não informado' }} </td>
        </tr>
        <tr>
          <td colspan="2"> <b>Autor:</b> {{ $livro->autor }} </td>
          <td> <b>ISBN:</b> {{ $livro->isbn }} </td>
        </tr>
        <tr>
          <td colspan="3"> <b>Editora:</b> {{ $livro->editora }} </td>
        </tr>
        <tr>
          <td> <b>Data do cadastro:</b> {{ $livro->created_at != "" ? date('d/m/Y', strtotime($livro->created_at)) : "" }} </td>
          <td colspan="2"> <b>Cadastrado por:</b> {{ $livro->getUsuarioCadastro->name }} </td>
        </tr>
        @endforeach
        @if($biblioteca->getLivros()->count() == 0)
        <tr>
          <td colspan="3">Nenhum livro cadastrado.</td>
        </tr>
        @endif
      </table>
    </div>
    @endforeach
  </body>
</html>

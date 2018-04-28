@extends('layouts.app')

@section('title', 'VISUALIZAR BIBLIOTECA')

@section('content')

<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header bg-info text-light font-weight-bold">Visualizar Biblioteca</div>
    <div class="card-body">
      <table class="table">
        <tr>
          <td> <b>Biblioteca:</b> Nome da Biblioteca </td>
          <td> <b>CEP:</b> 72000-000 </td>
        </tr>
      </table>
      <form class="" action="" method="post">

            <div class="form-row">
                <div class="form-group col-md-12" >
                  <label class="font-weight-bold" for="biblioteca">Biblioteca:</label>
                </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="font-weight-bold" for="cep">CEP:</label>
                </div>
                <div class="form-group col-md-4">
                  <label class="font-weight-bold" for="instituicao">Cidade:</label>
                </div>
                <div class="form-group col-md-12">
                   <label class="font-weight-bold" for="endereco">Endereço:</label>
                 </div>
                     <div class="form-group col-md-6">
                       <label class="font-weight-bold" for="fone">Telefone:</label>
                     </div>
                     <div class="form-group col-md-4">
                       <label class="font-weight-bold" for="instituicao">Instituição:</label>
                     </div>
                 <div class="text-center" >
              <a href="{{ route('bibliotecas.edicao') }}" class="btn btn-info  bg-primary " id="salvar">Editar</a>
              <button type="button" class="btn btn-info  back">Voltar</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>




@endsection

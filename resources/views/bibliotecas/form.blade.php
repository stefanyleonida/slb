@csrf

<div class="form-row">
    <div class="form-group col-md-12">
      <label for="biblioteca">Biblioteca:</label>
      <input type="text" name="nome_biblioteca" class="form-control" value="" id="biblioteca" placeholder="Nome da Biblioteca" maxlength="200" required autofocus>
    </div>
<div class="form-row">
    <div class="form-group col-md-3">
      <label for="cep">CEP:</label>
      <input type="text" name="cep" class="form-control" id="" maxlength="9" placeholder="00000-000" >
    </div>
    <div class="form-group col-md-6">
      <label for="cidade">Cidade:</label>
      <select class=" form-control" name="id_cidade" required>
        <option value="">Selecione a Cidade</option>
        @foreach($lista_cidades as $cidade)
          <option value="{{ $cidade->id_cidade }}">{{ $cidade->cidade }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-12">
       <label for="endereco">Endereço:</label>
       <input name="endereco" type="text" class="form-control" value="" id="" placeholder="Endereço da Biblioteca" maxlength="200">
     </div>
    <div class="form-row">
         <div class="form-group col-md-4">
           <label for="fone">Telefone:</label>
           <input name="telefone" type="tel" class="form-control" id="" value="" maxlength="11" placeholder="(00) 0000-0000">
         </div>
         <div class="form-group col-md-8">
           <label for="instituicao">Instituição:</label>
           <input name="instituicao" type="text" class="form-control" id="" value="" maxlength="200" placeholder="Nome da Instituição">
         </div>
       </div>
     <div >
  <button type="submit" class="btn btn-info  bg-primary " id="salvar">Salvar</button>
  <button type="button" class="btn btn-info  back">Cancelar</button>
</div>

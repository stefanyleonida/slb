@csrf

<div class="form-row">
    <div class="form-group col-md-12">
      <label for="titulp">Título:</label>
      <input type="text" class="form-control" value="" id="idTitulo" placeholder="Título do Livro" maxlength="200" required autofocus>
    </div>
<div class="form-row">
    <div class="form-group col-md-5">
      <label for="cep">Edição:</label>
      <input type="text" class="form-control" id="" maxlength="9" placeholder="Edição do Livro" >
    </div>
        <div class="form-group col-md-3">
          <label for="cep">Ano:</label>
          <input type="text" class="form-control" id="" maxlength="9" placeholder="0000" >
        </div>
      </div>
    <div class="form-group col-md-12">
       <label for="endereco">Autor(a):</label>
       <input type="text" class="form-control" value="" id="" placeholder="Nome do Autor(a)" maxlength="200">
     </div>
     <div class="form-group col-md-12">
        <label for="endereco">Editor(a):</label>
        <input type="text" class="form-control" value="" id="" placeholder="Nome do Editor(a)" maxlength="200">
      </div>
    <div class="form-row">
         <div class="form-group col-md-5">
           <label for="fone">ISBN:</label>
           <input type="tel" class="form-control" id="" value="" maxlength="11" placeholder="Apenas números">
         </div>
         <div class="form-group col-md-7">
           <label for="instituicao">Categoria:</label>
           <input type="text" class="form-control" id="" value="" maxlength="200" placeholder="Categoria do livro">
         </div>
       </div>
     <div >
  <button type="submit" class="btn btn-info  bg-primary " id="salvar">Salvar</button>
  <button type="button" class="btn btn-info  back">Cancelar</button>
</div>

@csrf

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="nome_livro">Título:</label>
  <div class="col-md-9">
    <input type="text" class="form-control" value="" name="nome_livro" id="nome_livro" placeholder="Título do Livro" maxlength="200" required autofocus>
    @if($errors->has('nome_livro'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('nome_livro') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="edicao">Edição:</label>
  <div class="col-md-6">
    <input type="text" class="form-control" value="" name="edicao" id="edicao" placeholder="Edição do Livro" maxlength="100" required>
    @if($errors->has('edicao'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('edicao') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="ano">Ano:</label>
  <div class="col-md-6">
    <input type="text" class="form-control ano" value="" name="ano" id="ano" placeholder="" maxlength="4" required>
    @if($errors->has('ano'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('ano') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="autor">Autor(a):</label>
  <div class="col-md-9">
    <input type="text" class="form-control" value="" name="autor" id="autor" placeholder="Nome autor(a)" maxlength="200" required>
    @if($errors->has('autor'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('autor') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="editora">Editora:</label>
  <div class="col-md-9">
    <input type="text" class="form-control" value="" name="editora" id="editora" placeholder="Nome editora" maxlength="200" required>
    @if($errors->has('editora'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('editora') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="isbn">ISBN:</label>
  <div class="col-md-6">
    <input type="text" class="form-control" value="" name="isbn" id="isbn" placeholder="" maxlength="50">
    @if($errors->has('isbn'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('isbn') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="id_idioma">Idioma:</label>
  <div class="col-md-6">
    <select class="form-control" name="id_idioma" id="id_idioma">
      <option value="">Selecione</option>
      @foreach($idiomas as $idioma)
        <option value="{{ $idioma->id_idioma }}"> {{ $idioma->idioma }} </option>
      @endforeach
    </select>
    @if($errors->has('idioma'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('idioma') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="categoria">Categoria:</label>
  <div class="col-md-6">
    <select class="form-control" name="categoria" id="categoria">
      <option value="">Selecione</option>
      @foreach($categorias as $categoria)
        <option value="{{ $categoria->id_categoria }}"> {{ $categoria->categoria }} </option>
      @endforeach
    </select>
    @if($errors->has('categoria'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('categoria') }} </span>
    @endif
  </div>
</div>

<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
<input type="hidden" name="id_biblioteca" value="{{ Auth::user()->id_biblioteca }}">

<div class="text-center">
  <button class="btn btn-primary btn-sm" type="submit" id="btn_salvar">Salvar</button>
  <button class="btn btn-info btn-sm voltar" type="button">Voltar</button>
</div>

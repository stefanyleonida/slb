@csrf

@if(Auth::user()->id_tipo_usuario == 1)
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="id_biblioteca">Biblioteca:</label>
  <div class="col-md-9">
    <select class="form-control" name="id_biblioteca" id="id_biblioteca" required>
      <option value="">Selecione</option>
      @if(isset($bibliotecas))
        @foreach($bibliotecas as $biblioteca)
          <option value="{{ $biblioteca->id_biblioteca }}"
            {{ (old('id_biblioteca') == $biblioteca->id_biblioteca) || (isset($livro) && $livro->id_biblioteca == $biblioteca->id_biblioteca) ? 'selected' : '' }}>
            {{ $biblioteca->nome_biblioteca }}
          </option>
        @endforeach
      @endif
    </select>
    @if($errors->has('id_biblioteca'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('id_biblioteca') }} </span>
    @endif
  </div>
</div>
@else
<input type="hidden" name="id_biblioteca" value="{{ Auth::user()->id_biblioteca }}">
@endif

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="nome_livro">Título:</label>
  <div class="col-md-9">
    <input type="text" class="form-control" name="nome_livro" id="nome_livro" placeholder="Título do Livro" maxlength="200"
    value="{{ old('nome_livro', isset($livro) ? $livro->nome_livro : '') }}" required>
    @if($errors->has('nome_livro'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('nome_livro') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="edicao">Edição:</label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="edicao" id="edicao" placeholder="Edição do Livro" maxlength="100"
    value="{{ old('edicao', isset($livro) ? $livro->edicao : '') }}" required>
    @if($errors->has('edicao'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('edicao') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="ano">Ano:</label>
  <div class="col-md-6">
    <input type="text" class="form-control ano" name="ano" id="ano" placeholder="" maxlength="4"
    value="{{ old('ano', isset($livro) ? $livro->ano : '') }}" required>
    @if($errors->has('ano'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('ano') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="autor">Autor(a):</label>
  <div class="col-md-9">
    <input type="text" class="form-control"  name="autor" id="autor" placeholder="Nome autor(a)" maxlength="200"
    value="{{ old('autor', isset($livro) ? $livro->autor : '') }}" required>
    @if($errors->has('autor'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('autor') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="editora">Editora:</label>
  <div class="col-md-9">
    <input type="text" class="form-control" name="editora" id="editora" placeholder="Nome editora" maxlength="200"
    value="{{ old('editora', isset($livro) ? $livro->editora : '') }}" required>
    @if($errors->has('editora'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('editora') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="isbn">ISBN:</label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="" maxlength="50"
    value="{{ old('isbn', isset($livro) ? $livro->isbn : '') }}" >
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
        <option value="{{ $idioma->id_idioma }}"
          {{ (old('id_idioma') == $idioma->id_idioma) || (isset($livro) && $livro->id_idioma == $idioma->id_idioma) ? 'selected' : '' }}>
          {{ $idioma->idioma }}
        </option>
      @endforeach
    </select>
    @if($errors->has('id_idioma'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('id_idioma') }} </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="categoria">Categoria:</label>
  <div class="col-md-6">
    <select class="form-control" name="id_categoria" id="categoria">
      <option value="">Selecione</option>
      @foreach($categorias as $categoria)
        <option value="{{ $categoria->id_categoria }}"
          {{ (old('id_categoria') ==  $categoria->id_categoria) || (isset($livro) && $livro->id_categoria == $categoria->id_categoria) ? 'selected' : ''}}>
          {{ $categoria->categoria }}
        </option>
      @endforeach
    </select>
    @if($errors->has('id_categoria'))
      <span class="text-danger font-weight-bold"> {{ $errors->first('id_categoria') }} </span>
    @endif
  </div>
</div>

<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

<div class="text-center">
  <button class="btn btn-primary btn-sm" type="submit" id="btn_salvar">Salvar</button>
  <button class="btn btn-info btn-sm voltar" type="button">Voltar</button>
</div>

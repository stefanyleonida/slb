@csrf
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="nome_biblioteca">Biblioteca:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="nome_biblioteca" value="{{ old('nome_biblioteca', isset($biblioteca) ? $biblioteca->nome_biblioteca : '') }}"
    id="nome_biblioteca" maxlength="200" placeholder="Nome da Biblioteca" required autofocus>
    @if($errors->has('nome_biblioteca'))
      <span class="text-danger"> <b>{{$errors->first('nome_biblioteca')}}</b> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="cep">CEP:</label>
  <div class="col-md-9">
    <input class="form-control cep" type="text" name="cep" id="cep" value="{{ old('cep', isset($biblioteca) ? $biblioteca->cep : '') }}" placeholder="00000-000" required style="width: 150px;">
    @if($errors->has('cep'))
      <span class="text-danger"> <b>{{$errors->first('cep')}}</b> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="id_cidade">Cidade:</label>
  <div class="col-md-9">
    <select class="form-control" name="id_cidade" id="id_cidade" required style="width: 200px;">
      <option value="">Selecione</option>
      @foreach($lista_cidades as $cidade)
        <option value="{{ $cidade->id_cidade }}" {{ old('id_cidade') == $cidade->id_cidade || (isset($biblioteca) && $biblioteca->id_cidade == $cidade->id_cidade) ? 'selected' : '' }}>{{ $cidade->cidade }}</option>
      @endforeach
    </select>
    @if($errors->has('id_cidade'))
      <span class="text-danger"> <b>{{ $errors->first('id_cidade') }}</b> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="endereco">Endereço:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="endereco" id="endereco" value="{{ old('endereco', isset($biblioteca) ? $biblioteca->endereco : '') }}" placeholder="Endereço da Biblioteca" maxlength="200" required>
    @if($errors->has('endereco'))
      <span class="text-danger"> <b>{{ $errors->first('endereco') }}</b> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="telefone">Telefone:</label>
  <div class="col-md-9">
    <input class="form-control telefone" type="text" name="telefone" id="telefone" value="{{ old('telefone', isset($biblioteca) ? $biblioteca->telefone : '') }}" placeholder="(00) 0000-0000" required style="width: 150px;">
    @if($errors->has('telefone'))
      <span class="text-danger"> <b>{{ $errors->first('telefone') }}</b> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="instituicao">Instituição:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="instituicao" id="instituicao" value="{{ old('instituicao', isset($biblioteca) ? $biblioteca->instituicao : '') }}" maxlength="200" placeholder="Nome da Instituição">
  </div>
</div>
<div class="text-center">
  <button class="btn btn-primary btn-sm" type="submit" id="btn_salvar">Salvar</button>
  <button class="btn btn-info btn-sm voltar" type="button">Voltar</button>
</div>

@csrf

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="biblioteca">Biblioteca:</label>
  <div class="col-md-8">
    <select class="form-control" name="" id="biblioteca" required autofocus>
      <option value="">Selecione a Biblioteca</option>
      @if(isset($bibliotecas))
        @foreach($bibliotecas as $biblioteca)
          <option value="{{ $biblioteca->id_biblioteca }}">{{ $biblioteca->nome_biblioteca }}</option>
        @endforeach
      @endif
    </select>
  </div>
</div>

<div class="col-md-12">
  <label class="col-md-3">Tipo de Usuário:</label>
  <label class="radio-inline"> <input type="radio" name="id_tipo_usuario" value="1"> Administrador</label> &nbsp;
  <label class="radio-inline"> <input type="radio" name="id_tipo_usuario" value="2" checked> Bibliotecário</label>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="name">Nome:</label>
  <div class="col-md-8">
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required maxlength="150">
    @if($errors->has('name'))
      <span class="text-danger font-weight-bold">{{ $errors->first('name') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="email">E-mail:</label>
  <div class="col-md-8">
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" maxlength="200" required>
    @if($errors->has('email'))
      <span class="text-danger font-weight-bold">{{ $errors->first('email') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="cpf">CPF:</label>
  <div class="col-md-4">
    <input class="form-control cpf" type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required>
  </div>
  <div class="col-md-8">
    @if($errors->has('cpf'))
      <span class="text-danger font-weight-bold">{{ $errors->first('cpf') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="password">Senha:</label>
  <div class="col-md-4">
    <input class="form-control" type="password" name="password" id="password" value="" maxlength="16" required>
  </div>
  <div class="col-md-8">
    @if($errors->has('password'))
      <span class="text-danger font-weight-bold">{{ $errors->first('password') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="password_confirmation">Confirmação:</label>
  <div class="col-md-4">
    <input class="form-control"  type="password" name="password_confirmation" id="password_confirmation" value="">
  </div>
</div>

<div class="text-center">
  <button class="btn btn-primary btn-sm" type="submit" id="btn_salvar">Salvar</button>
  <button class="btn btn-info btn-sm voltar" type="button">Voltar</button>
</div>

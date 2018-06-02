@csrf

@if(Auth::user()->id_tipo_usuario == 1)
  <div class="form-group row">
    <label class="col-md-3 text-md-right" for="biblioteca">Biblioteca:</label>
    <div class="col-md-8">
      <select class="form-control" name="id_biblioteca" id="biblioteca" required {{ Auth::user()->id_tipo_usuario == 2 ? 'disabled' : 'autofocus' }}>
        <option value="">Selecione a Biblioteca</option>
        @if(isset($bibliotecas))
          @foreach($bibliotecas as $biblioteca)
            <option value="{{ $biblioteca->id_biblioteca }}" {{ (old('id_biblioteca') == $biblioteca->id_biblioteca) || (isset($usuario) && $usuario->id_biblioteca == $biblioteca->id_biblioteca) ? 'selected' : '' }}>
              {{ $biblioteca->nome_biblioteca }}</option>
          @endforeach
        @endif
      </select>
    </div>
  </div>
@else
<input type="hidden" name="id_biblioteca" value="{{ Auth::user()->id_biblioteca }}">
@endif

<div class="col-md-12">
  <label class="col-md-3">Tipo de Usuário:</label>
  <label class="radio-inline"> <input type="radio" name="id_tipo_usuario" value="2" checked {{ Auth::user()->id_tipo_usuario == 2 ? 'disabled' : '' }}>
    Bibliotecário
  </label> &nbsp;
  @if(Auth::user()->id_tipo_usuario == 1)
  <label class="radio-inline"> <input type="radio" name="id_tipo_usuario" value="1"
    {{ (old('id_tipo_usuario') == 1) || (isset($usuario) && $usuario->id_tipo_usuario == 1) ? 'checked' : '' }}
    {{ Auth::user()->id_tipo_usuario == 2 ? 'disabled' : '' }}>
    Administrador
  </label>&nbsp;
  @endif
  <label class="radio-inline"> <input type="radio" name="id_tipo_usuario" value="3"
    {{ (old('id_tipo_usuario') == 3) || (isset($usuario) && $usuario->id_tipo_usuario == 3) ? 'checked' : '' }}
    {{ Auth::user()->id_tipo_usuario == 2 ? 'disabled' : '' }}>
    Gestor
  </label>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="name">Nome:</label>
  <div class="col-md-8">
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', isset($usuario) ? $usuario->name : '') }}" required maxlength="150">
    @if($errors->has('name'))
      <span class="text-danger font-weight-bold">{{ $errors->first('name') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="email">E-mail:</label>
  <div class="col-md-8">
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email', isset($usuario) ? $usuario->email : '') }}" maxlength="200" required>
    @if($errors->has('email'))
      <span class="text-danger font-weight-bold">{{ $errors->first('email') }}</span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="cpf">CPF:</label>
  <div class="col-md-4">
    <input class="form-control cpf" type="text" name="cpf" id="cpf" value="{{ old('cpf', isset($usuario) ? $usuario->cpf: '') }}" required>
    @if($errors->has('cpf'))
      <span class="text-danger font-weight-bold">{{ $errors->first('cpf') }}</span>
    @endif
  </div>
</div>

<div class="text-center">
  <button class="btn btn-primary btn-sm" type="submit" id="btn_salvar">Salvar</button>
  <button class="btn btn-info btn-sm voltar" type="button">Voltar</button>
</div>

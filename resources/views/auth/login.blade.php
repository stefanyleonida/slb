@extends('layouts.app')

@section('title', 'ENTRAR')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" >
            <!-- div do painel login -->
            <div class="card shadow" style="margin-top:20%;">
                <div class="card-header bg-primary" style="color:white;"> {{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Entrar') }}
                                </button>

                                <button type="button" class="btn btn-link" href="" id="btn_esq_senha" data-toggle="modal" data-target="#modal_esq_senha">
                                    {{ __('Esqueceu a senha?') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="modal_esq_senha">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Esqueceu a senha?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('usuarios.recuperar_senha') }}" method="post" id="form_esq_senha">
          @csrf
          <div class="form-group row">
            <label class="col-md-2 text-md-right" for="email2">E-mail:</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="email2" id="email2" value="{{ old('email2') }}" placeholder="Informe seu e-mail" required>
              @if($errors->has('email2'))
                <span class="text-danger"> <b>{{ $errors->first('email2') }}</b> </span>
              @endif
            </div>
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="form_esq_senha" >Enviar</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    @if($errors->has('email2'))
      $('#btn_esq_senha').click();
    @endif
</script>
@endpush

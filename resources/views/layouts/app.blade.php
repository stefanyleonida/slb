<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>SLB - @yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--  css  --}}
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}" >
        {{--  script  --}}
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script src="{{ asset('js/global.js') }}"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SLB-Sistema de Localização de Biblioteca
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Acesso privado</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('usuarios.edicao', Auth::user()) }}" class="dropdown-item" >Meu Cadastro</a>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#modal_senha" id="btn_alterar_senha">Alterar Senha</button>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
          <div class="" id="loading">
            <img src="{{ asset('images/loading.gif') }}" alt="" width="">
          </div>

          <div class="" id="over_loading">
          </div>
          <div class="row">
            <!-- menu lateral -->
            <div class="{{ !Auth::user() ? 'col-xs-0' : 'col-md-2' }}">
              <!-- se não logado -->
              @guest

              <!-- se logado -->
              @else
                <div class="card shadow" style="margin-top: 10px;">
                  <div class="card-header text-center bg-primary text-light">
                    <strong>{{ Auth::user()->getTipo->tipo_usuario }}</strong>
                  </div>
                  <div class="card-body">
                    <!-- se admin --><!--Menu lateral-->
                    @if(Auth::user()->id_tipo_usuario == 1)
                    <a href="{{ route('bibliotecas.listar') }}" class="btn btn-info btn-block">Bibliotecas</a>
                    <a href="{{ route('livros.listar') }}" class="btn btn-info btn-block">Livros</a>
                    <a href="{{ route('usuarios.listar') }}" class="btn btn-info btn-block">Usuários</a>
                    <a href="{{ route('relatorio') }}" class="btn btn-info btn-block">Relatório</a>

                    <!-- se bibliotecário -->
                    @elseif(Auth::user()->id_tipo_usuario == 2)
                    <a href="{{ route('bibliotecas.visualizar', Auth::user()->id_biblioteca) }}" class="btn btn-info btn-block">Biblioteca</a>
                    <a href="{{ route('livros.listar') }}" class="btn btn-info btn-block">Livros</a>
                    <!-- se gestor -->
                    @elseif(Auth::user()->id_tipo_usuario == 3)
                    <a href="{{ route('bibliotecas.visualizar', Auth::user()->id_biblioteca) }}" class="btn btn-info btn-block">Biblioteca</a>
                    <a href="{{ route('livros.listar') }}" class="btn btn-info btn-block">Livros</a>
                    <a href="{{ route('usuarios.listar') }}" class="btn btn-info btn-block">Usuários</a>
                    @endif
                  </div>
                </div>

              @endguest

            </div>

            <!-- conteúdo -->
            <div class="{{ !Auth::user() ? 'col-md-12' : 'col-md-10' }}" style="margin-top:10px;">
              @yield('content')
            </div>
          </div>
        </div>

        <!-- The Modal de Alterar Senha -->
        <div class="modal fade" id="modal_senha">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Alterar Senha</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form class="" action="{{ route('usuarios.trocar_senha', Auth::user()) }}" method="post" id="form_trocar_senha">
                  @csrf
                  <div class="form-group">
                    <label for="senha">Nova Senha:</label>
                    <input type="password" class="form-control col-md-9" name="senha" id="senha" placeholder="Digite a Nova Senha" required maxlength="16">
                    @if($errors->has('senha'))
                      <span class="text-danger"> <b>{{ $errors->first('senha') }}</b> </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="confirmacao">Confirmar Senha:</label>
                    <input type="password" class="form-control col-md-9" name="confirmacao" id="confirmacao" placeholder="Digite Novamente Senha" required maxlength="16">
                  </div>
                </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" form="form_trocar_senha" name="button" class="btn btn-primary">Alterar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              </div>

            </div>
          </div>
        </div>

        <script type="text/javascript">
          @if(session('alerta'))
            swal({
              type : "{{ session('alerta')['tipo'] }}",
              text: "{{ session('alerta')['texto'] }}",
            });
          @endif

          @if($errors->has('senha'))
            $('#btn_alterar_senha').click();
          @endif
        </script>
        @stack('script')
    </body>
</html>

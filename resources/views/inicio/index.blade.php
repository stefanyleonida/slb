@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <div class="row">
        <div class='col-md-6 ml-auto mr-auto' style="margin-top: 150px;">
            <div class="text-center">
              <img src="{{ asset('img/logo_slb2.jpg') }}" alt="" width="300px">
            </div>
            <form class="" type="post" action="" id="form_buscar">
                @csrf
                <input class="form-control" type="text" name="termo_busca" id="busca" max-lenght="100">
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 15px;">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>

@endsection

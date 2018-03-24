@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <div class="row">
        <div class='col-md-6 ml-auto mr-auto' style="margin-top: 250px;">
            <div class="text-center"> <h2 class="titulo"> Texto </h2> </div>
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
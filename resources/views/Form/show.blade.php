@extends('Form.plantilla')

@section('content')
<h1 class="text-center m-4 border-bottom pb-3 border-2">FORMULARIO DE CONTACTO DÉTALLE </h1>

<div class="p-5 m-4 shadow-lg">
    <div class="row">
        <h2 class="text-center display-4 border-bottom border-dark pb-3 mb-4">Contacto {{$form->id}}</h2>
        <div class="col text-start">
            <h3>Nombre:</h3>
        </div>
        <div class="col text-end">
            <h3 class="lead fs-2">{{$form->Nombre}}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col text-start">
            <h3>Teléfono:</h3>
        </div>
        <div class="col text-end">
            <h3 class="lead fs-2">{{$form->telefono}}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col text-start">
            <h3>Descripción:</h3>
        </div>
    </div>
    <div class="row">
        <div class="col text-start">
            <h3 class="lead fs-2">{{$form->descripcion}}</h3>
        </div>
        <div class="col text-end">
            <img  width="250px" src="{{ $form->url }}">
        </div>
    </div>
    <div class="row d-flex justify-content-start align-items-center">
        <div>
            <a href="{{route('Form.index')}}" class="btn btn-danger px-5">Salir</a>
        </div>
    </div>
</div>

@endsection
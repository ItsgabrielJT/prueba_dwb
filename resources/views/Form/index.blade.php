@extends('Form.plantilla')

@section('content')
<h1 class="text-center m-4 border-bottom pb-3 border-2">FORMULARIOS DE CONTACTOS ENVIADOS</h1>
<div class="col text-center d-flex justify-content-between mx-5">
    <a href="{{ route('Form.create') }}" class="ml-1 underline">
        <button type="submit" class="btn btn-success px-5">Crear</button>
    </a> 
    <a href="{{ route('login-spotify') }}" class="ml-1 underline">
        <button type="submit" class="btn btn-danger px-5">Login</button>
    </a> 
</div>
<div class="m-5 p-5 shadow-lg">
    @foreach ($forms as $form)
    <div class="row alert alert-success" role="alert">
        <div class="col">
            <div class="row">
                <h3 class="col text-secondary lead fs-2">Nombre:</h3>
                <h3 class="col text-dark">{{$form->Nombre}}</h3>
            </div>
            <div class="row">
                <h3 class="col text-secondary lead fs-2">Descripción:</h3>
                <h3 class="col text-dark">{{$form->descripcion}}</h3>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col">
                    <img width="100px;" src="{{ $form->url }}">
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <a href="{{route('Form.show', $form->id)}}" class="btn btn-success px-4" >Ver más</a>
                </div>
            </div>
            
        </div>
    </div>
@endforeach
</div>
@endsection
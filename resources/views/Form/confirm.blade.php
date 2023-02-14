@extends('Form.plantilla')

@section('content')

@if($status)
    <div style="height:100vh" class="d-flex justify-content-center align-items-center flex-column">
        <div class="alert alert-success" role="alert">
            Se ha enviado con exito!
        </div>
        <a href="{{route('Form.create')}}" class="btn btn-success px-5">Confirmar</a>
    </div>
@else
    <div style="height:100vh" class="d-flex justify-content-center align-items-center flex-column">
    @foreach ($messeges as $messege)
        <div class="alert alert-danger" role="alert">
            {{$messege}}
        </div>
        
    @endforeach
        <a href="{{route('Form.create')}}" class="btn btn-success px-5">Intentar De nuevo</a>
    </div>

@endif

@endsection
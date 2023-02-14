@extends('Form.plantilla')

@section('content')
<h1 class="text-center m-4 border-bottom pb-3 border-2">FORMULARIO DE CONTACTO</h1>
<form method="POST" action="{{ route('Form.store') }}" enctype="multipart/form-data">
@csrf
    <div class="p-5 m-4 shadow-lg">
        <div class="row my-3">
            <div class="col">
                <div class="form-floating m-1">
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                    <label for="Nombre">Nombre</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating m-1">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <div class="form-floating m-1">
                    <input minlength="7" maxlength="10" type="tel" class="form-control" id="telefono" name="telefono" placeholder="telefono" pattern="^[0-9]+" title="Solo numeros 7-10 digitos">
                    <label for="telefono">Télefono</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating m-1">
                    <input type="file" class="form-control" id="Imagen" name="Imagen" placeholder="Imagen">
                    <label for="Imagen">Imagen</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="descripcion" style="height: 100px" name="descripcion"></textarea>
                    <label for="descripcion">Descripción</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="{{route('Form.index')}}" class="btn btn-secondary px-5">Cancelar</a>
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-success px-5">Enviar</button>
            </div>
        </div>
    </div>
</form>



@endsection


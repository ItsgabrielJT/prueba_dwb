<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Post Create</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>

        <div class="p-5 m-4 shadow-lg">
            <div class="row">
                <h2 class="text-center display-4 border-bottom border-dark pb-3 mb-4">Post {{$post->id}}</h2>
                <div class="col text-start">
                    <h3>Titulo:</h3>
                </div>
                <div class="col text-end">
                    <h3 class="lead fs-2">{{$post->title}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col text-start">
                    <h3>Descripción:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col text-start">
                    <h3 class="lead fs-2">{{$post->description}}</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <a href="{{route('post.create')}}" class="btn btn-danger px-5">Salir</a>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </body>
</html>



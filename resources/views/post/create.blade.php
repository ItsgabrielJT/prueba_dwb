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
      <!-- Una ves ya creaste el formulario que mandara la infomacion de la notificacion -->
      <!-- Nos regresamos a PostController porque tenemos que cofigurar el metodo store para guardar la informacion que recolectamos-->
        <div class="container text-center">
            <h1> Create Post </h1>
        </div>        

        <form action="{{ route('post.store') }}" method="POST">
          @csrf
          <div class="container border border-secondary">            
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" rows="3">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Description</label>
              <input type="text" class="form-control" name="description" rows="3">
            </div>
            <button class="btn btn-dark" type="submit">Submit</button>
          </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </body>
</html>



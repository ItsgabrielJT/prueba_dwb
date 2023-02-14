<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <!-- Una ves ya creaste el formulario que mandara la infomacion de la notificacion -->
  <!-- Nos regresamos a PostController porque tenemos que cofigurar el metodo store para guardar la informacion que recolectamos-->
  <form action="{{ route('post.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Enter your title here">
    </div>
    <div class="form-group">
      <label>Description</label>
      <input type="text" class="form-control" name="description" placeholder="Enter description here">
    </div>
    <button class="btn btn-dark" type="submit">Submit</button>
    </form>
</body>
</html>

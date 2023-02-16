<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Post Create</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>

    <body>
      <!-- Una ves ya creaste el formulario que mandara la infomacion de la notificacion -->
      <!-- Nos regresamos a PostController porque tenemos que cofigurar el metodo store para guardar la informacion que recolectamos-->
            
      <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-dark">
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fas fa-bell"></i>
                    @if (count(auth()->user()->unreadNotifications))
                    <span class="badge badge-warning">{{ count(auth()->user()->unreadNotifications) }}</span>
                        
                    @endif
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header" >Unread Notifications</span>
                  @forelse (auth()->user()->unreadNotifications() as $notification)
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{ $notification->data['title'] }}
                    <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                  </a>
                  @empty
                    <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer </span>  
                  @endforelse
                  
                  <div class="dropdown-divider"></div>
                  <span class="dropdown-header">Read Notifications</span>
                  @forelse (auth()->user()->readNotifications() as $notification)
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> {{ $notification->data['description'] }}
                    <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                  </a>
                  @empty
                    <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones leidas                      </span>
                  @endforelse

                  
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('markAsRead') }}" class="dropdown-item dropdown-footer">Mark all as read</a>
                </div>
              </li>
      </ul>
    </nav>
    <!-- /.navbar -->
      

      <div class="container text-center">
            <h1> Create Post </h1>
      </div>                

        <div class="flex justify-center mt-4 sm:items-right sm:justify-between bg-gray-100 dark:bg-gray-900">
          <div class="text-center text-sm text-gray-500 sm:text-left">
              <div class="flex items-right">                                                                                                                 
                  <a href="{{ route('/') }}" class="ml-1 underline">
                    <button type="submit" class="btn btn-success px-5">Welcome </button>
                </a>                                                   
              </div>
          </div>
        </div>

        <div class="flex justify-center mt-4 sm:items-right sm:justify-between bg-gray-100 dark:bg-gray-900">
          <div class="text text-sm text-gray-500 sm:text-left">
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
          </div>
        </div>
          
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <div class="container-fluid">
                    @if (session('message'))
                    <div class="row mb-2">                      
                      <div class="col-lg-12">
                        <div class="alert alert-danger">
                          {{ session('message') }}
                        </div>
                      </div>
                    </div>                        
                    @endif
                  </div>

                  @yield('content')                  
                
                </div>
              </div>

              
            </div>
            
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

      <div class="m-5 p-5 shadow-lg" id="contenido">
        @foreach ($posts as $form)
        <div class="row alert alert-success" role="alert">
            <div class="col">
                <div class="row">
                    <h3 class="col text-secondary lead fs-2">Titulo:</h3>
                    <h3 class="col text-dark">{{$form->title}}</h3>
                </div>
            </div>
            <div class="col">
              <div class="row">
                <h3 class="col text-secondary lead fs-2">Descripción:</h3>
                <h3 class="col text-dark">{{$form->description}}</h3>
              </div>
            </div>
        </div>
        @endforeach
      </div>
      @yield('scripts')

    </body>
</html>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/lux/bootstrap.min.css"
        integrity="sha512-RI2S7J+KOTIVVh6JxrBRNIxJjIioHORVNow+SSz2OMKsDLG5y/YT6iXEK+R0LlKBo/Uwr1O063yT198V6AZh4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>
    {{-- <nav class=" navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container ">
          <a class="navbar-brand" href="{{route('dashboard')}}">Inicio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('cuarto.index')}}">Cuartos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   detalles
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('piso.index')}}">Pisos</a></li>
                  <li><a class="dropdown-item" href="{{route('categoria.index')}}">Categorias</a></li>
                </ul>
              </li> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Perfil</a></li>
                  
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">Desconectar</button>                        
                    </form>
                    
                  </li>
                  
                </ul>
              </li> 
            </ul>

          </div>
        </div>
      </nav> --}}

    <nav class="navbar bg-primary " data-bs-theme="dark">
        <div class="container ">

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="nav-item dropdown text-light">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Desconectar</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="offcanvas  offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header ">
                    <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">Panel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('dashboard') }}">Panel dashboard</a>
                        </li>

                    </ul>

                </div>

                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">CONTROL HOSTAL</h5>

                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <a class="nav-link " aria-current="page" href="{{ route('recepcion.index') }}">Control de Reservas</a>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Mantenimiento
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"href="{{ route('cuarto.index') }}">Habitaciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('piso.index') }}">Pisos</a></li>
                                <li><a class="dropdown-item" href="{{ route('categoria.index') }}">Categorias</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('registro.index') }}">Reporte</a>
                        </li>

                        @if (Auth::user()->rol == 'admin')
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page"
                                    href="{{ route('usuario.index') }}">Usuarios</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('cliente.index') }}">Clientes</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>

</html>

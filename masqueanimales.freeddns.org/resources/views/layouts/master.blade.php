<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>@yield('titulopagina')</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark navegacion">
        <a class="navbar-brand" href="/">Más que animales</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('mascotas.index')}}">Mascotas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('anuncios.index')}}">Anuncios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('contactar.create')}}" tabindex="-1" >Contactar</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container mt-5">
        <h1 class="text-center">@yield('textocabecera')</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('estado'))
            <div class="alert alert-success">
                {{session('estado')}}
            </div>
        @endif

        @if(session('problema'))
            <div class="alert alert-danger">
                {{session('problema')}}
            </div>
        @endif

        @yield('central')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
    
</body>
</html>
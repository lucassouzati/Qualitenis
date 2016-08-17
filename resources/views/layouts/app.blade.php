<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    {{Html::script('js/jquery.js')}}    
    {{Html::script('js/jquery.maskedinput.js')}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}    

    <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<!--    <script src="http://demo.expertphp.in/js/jquery.js"></script>-->
    <script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Qualitenis
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- inicio -->
                <!-- Left Side Of Navbar -->                
<!-- Authentication Links -->                    
@if (Auth::guard('tenista')->check()) 
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li><a href="{{ url('/tenista') }}">Área do Tenista</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::guard('tenista')-> user()->nome }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/tenista/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </li>
    </ul>  

@elseif (Auth::guest())
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li><a href="{{ url('/tenista') }}">Área do Tenista</a></li>
    </ul>
    <ul class="nav navbar-nav">
        <li><a href="{{ url('/login') }}">Área Administrativa</a></li>
    </ul>
    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/tenista/login') }}">Entrar</a></li>
        <li><a href="{{ url('/tenista/adicionar') }}">Registrar</a></li>
    </ul>
                        
                        
@else 
    @can('Func')
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li><a href="{{ url('/login') }}">Área Administrativa</a></li>

                      @can('Academia_index')
                         <li>
                             <a href="{{route('Academia.index')}}">Academias</a>
                         </li>
                      @endcan
                       <li>
                           <a href="{{route('torneio.index')}}">Torneios</a>
                       </li>
                       @can('Classe_index')
                         <li>
                             <a href="{{route('Classe.adicionar')}}">Classe</a>
                         </li>
                       @endcan
                        @can('Funcionario_index')
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Funcionarios <span class="caret"></span>
                            </a>
                             <ul class="dropdown-menu" role="menu">
                            @can('Func')
                                <li><a href="{{ url('/register') }}">Registrar</a></li>
                            @endcan
                                <li><a href="{{route('auth.index')}}">Lista</a></li>
                            </ul>
                         </li>
                        @endcan
                       <li>
                           <a href="{{route('tenista.lista')}}">Tenistas</a>
                       </li>
    </ul>
    <!-- Right Side Of Navbar -->
    <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/register') }}">Registrar</a></li>
    </ul> -->                    
    @endcan              

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </li>
    </ul>                        
@endif
            <!-- fim -->
            </div>
        </div>
    </nav>
    @if(Session::has('flash_message'))
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                        {{ Session::get('flash_message')['msg'] }}
                    </div>
                </div>
            </div>
        </div>

    @endif
    @yield('content')

    <script>
    jQuery(function($){
            $("#date").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
            $("#phone").mask("(99) 99999-9999");
            $("#tin").mask("99-9999999");
            $("#ssn").mask("999-99-9999");
        });
    </script>

    
    

    <!-- JavaScripts -->

    <!-- Retirado pois estava dando conflito com a pesquisa ajax de tenista-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>

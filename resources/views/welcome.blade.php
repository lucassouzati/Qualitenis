@extends('layouts.app')

<<<<<<< HEAD
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

<<<<<<< HEAD
=======
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
>>>>>>> 45e13ae0ca55d60081078218e0b368f2fa5cd108
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            header{
                clear:both;
            }
                
            </header><!-- /header -->
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                /* display: inline-block; */
            }

            .title {
                font-size: 96px;
            }

        </style>
    </head>
    <body>
<<<<<<< HEAD
    
        <div class="container">
            <div class="content">
                <div class="title">Qualitenis</div>
=======
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
>>>>>>> origin/master
            </div>
            
            @include('layouts._includes._footer')
            
        </div>
<<<<<<< HEAD
        <div class="panel-footer"></div>
=======
        @include('layouts._includes._nav')
        
            
        <section class="container">
            <div class="content">
                <div class="title">Qualitenis</div>
            </div>
        </section>

    <!-- JavaScripts -->
    <script src="script_jquery.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
>>>>>>> 45e13ae0ca55d60081078218e0b368f2fa5cd108
    </body>
</html>
=======
    </div>
</div>
@endsection
>>>>>>> origin/master

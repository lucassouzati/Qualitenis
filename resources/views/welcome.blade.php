@extends('layouts.app')


@section('content')


    <head>   

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

        
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

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
                /* font-family: 'Lato'; */
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
       
                   
        
            
        <section class="container">
            <div class="content">
                <!-- <div class="title">Qualitenis</div> -->
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="text-align: left;">Welcome</div>
    
                        <!-- <div class="container">
                        <div class="content"> -->
                            <div class="title">Qualitenis</div>

                            <div class="panel-body">Your Application's Landing Page.</div>
                        </div>            
                    <!-- @include('layouts._includes._footer')             -->
                    </div>
                <!-- <div class="panel-footer"></div> -->
                </div>
            </div>
        </section>

            <!-- JavaScripts -->
            <script src="script_jquery.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
            
            {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    </body>
</html>
@endsection

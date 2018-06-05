<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestão') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <title>Gestão</title>


    <!--Icons-->
    <script src="{{ asset('js/lumino.glyphs.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <a class="navbar-brand" href="{{ url('/home') }}">
                    Lia <span>Artes</span> Manuais  <!--<img src="{{ url('img/lia-header.png') }}" class="col-md-2" >-->
                </a>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <li>
                                <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        </li>
                    </ul>

                @endif
            </div>
        </div><!-- /.container-fluid -->
    </nav>


    @include('partials.sidebar')


    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">




        @yield('content')


    </div>	<!--/.main-->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.11.1.min.js') }} "></script>
    <script src="{{ asset('js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('js/chart.min.js') }} "></script>
    <script src="{{ asset('js/chart-data.js') }} "></script>
    <script src="{{ asset('js/easypiechart.js') }} "></script>
    <script src="{{ asset('js/easypiechart-data.js') }} "></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }} "></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

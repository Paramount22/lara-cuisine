<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Recepty')</title>


    <!-- Styles -->
    {{--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>

<body id="{{ body_id() }}" class="{{ body_class() }}">



    <div class="date" id="top">
        <div class="container">
            <p>
                <i class="fas fa-calendar-alt"></i>
                @include('partials.date')
            </p>
        </div>
    </div>

        @include('partials.navigation')

        <main>

                @yield('admin-content')

            <div class="container">
                <a href="#top" class="back-to-top page-scroll">
                    <i class="fas fa-angle-up fa-4x"></i>
                </a>
            </div>

            @include('flash::message')
        </main>



</body>




<!-- Scripts -->
{{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
<script src="{{ asset('js/easing.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</html>

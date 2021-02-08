<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <title>404 stránka sa nenašla</title>
</head>
<body>
<div class="container-not-found">
    <h1 class="error-404">404</h1>
    <p class="not-found">Stránku sa nepodarilo nájisť  <i class="far fa-frown fa-2x"></i> </p>



    <span class="go-home-link">
               <a href="{{ url('/') }}">Úvod</a>
           </span>

</div>
</body>


</html>

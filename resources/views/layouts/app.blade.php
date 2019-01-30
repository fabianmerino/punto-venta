<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @section('header')
            @include('layouts.partials.header')
        @show
    

        <main class="py-4">
            @yield('content')
        </main>
        {{--<footer class="bg-dark py-3" role="footer">--}}
            {{--<div class="container-fluid">--}}
                {{--<div class="d-flex justify-content-center">--}}
                    {{--<!-- Footer Copyrights -->--}}
                    {{--<div class="text-center text-md-right">--}}
                        {{--<small class="text-white">&copy; 2018 {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.</small>--}}
                    {{--</div>--}}
                    {{--<!-- End Footer Copyrights -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}
    </div>
    @section('scripts')
        @include('layouts.partials.scripts')
    @show

</body>
</html>

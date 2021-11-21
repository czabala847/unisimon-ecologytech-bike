<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ecologitech Bike')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    @section('css')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @show
</head>

<body>

    <div id="root">

        <div class="App" id="App">

            @include('layouts.header')

            @yield('content')

            @include('layouts.contact')
            @include('layouts.footer')

        </div>

    </div>


    @section('js')
        <script src="https://kit.fontawesome.com/2028b75fa6.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>

</html>

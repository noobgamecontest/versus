<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Carter+One:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Passion+One&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        {{--        on installe fontawesome ?--}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        @auth
            <script>
                window.user_id = '{{ auth()->user()->id }}';
            </script>
        @endauth
    </head>
    <body class="min-h-screen bg-gray-200 relative font-sans antialiased">
        <div id="app">
            <!-- Page Heading -->
            <nav-component></nav-component>

            <!-- Page Content -->
            <main class="relative">
                @yield('content')
            </main>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

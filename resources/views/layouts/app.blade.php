<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Carter+One:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-blue-800">

            <!-- Page Heading -->
            <header class="bg-blue-900 border-b-2 border-black text-white">
                <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8 font-title text-4xl text-orange-400 text-center">
                    Versus
                </div>
            </header>

            <!-- Page Content -->
            <main class="mx-4 mt-4">
                <div class="max-w-sm overflow-hidden shadow-lg bg-blue-500 border-2 border-black mb-4">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">1v1 Ping-Pong</div>
                        <p class="text-white text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                </div>
                <div class="max-w-sm overflow-hidden shadow-lg bg-blue-500 border-2 border-black mb-4">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">2v2 Ping-Pong</div>
                        <p class="text-white text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                </div>
                <div class="max-w-sm overflow-hidden shadow-lg bg-blue-500 border-2 border-black">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">1v1 Street Fighter</div>
                        <p class="text-white text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                </div>
            </main>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

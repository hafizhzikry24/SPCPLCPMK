<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SPCPLCPMK</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-12 py-40 sm:pt-0" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("assets/background.jpg") }}'); background-size: cover; background-position: center center;">

                {{-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> --}}


            {{-- <div class="w-full sm:max-w-md px-6 py-4 bg-blue-500 shadow-md overflow-hidden sm:rounded-lg">
                <a class="text-black text-3xl font-bold text-center flex items-center justify-center">SPCPLCPMK</a>
            </div> --}}

            <div class="w-full sm:max-w-md mt-24 px-1 py-16 bg-[#004D85CC] bg-opacity-100 shadow-md overflow-hidden sm:rounded-3xl backdrop-filter backdrop-blur-md ">
                <a class="text-white text-3xl mb-4 font-bold text-center flex justify-center ">SPCPLCPMK</a>

                {{ $slot }}
            </div>


        </div>
    </body>
</html>

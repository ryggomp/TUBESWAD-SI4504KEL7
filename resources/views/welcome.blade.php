<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recycle Connect</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('/assets/logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: hsla(152, 40%, 52%, 1);
            background-image:
                radial-gradient(at 96% 4%, hsla(141, 44%, 81%, 1) 0px, transparent 50%),
                radial-gradient(at 16% 0%, hsla(141, 44%, 81%, 1) 0px, transparent 50%);
        }

    </style>
</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="btn bg-[#1B4332] inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Dashboard</a>
            @else
            <a href="{{ route('login') }}"
                class="btn bg-[#1B4332] inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Log
                in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="btn bg-[#1B4332] inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8 lg:flex lg:items-center lg:px-16">
            <img class="w-1/2 md:w-1/3 mx-auto" src="{{ asset('assets/logo.png') }}" alt="Logo of Recycle Connect">
            <p class="font-medium mt-6 text-white text-center lg:w-1/2">Recycle Connect is a comprehensive platform dedicated to environmental
                education and fostering
                sustainable practices. Our website empowers users to make a positive impact on the environment by
                providing engaging educational content on recycling and waste management.</p>
        </div>
    </div>
</body>

</html>

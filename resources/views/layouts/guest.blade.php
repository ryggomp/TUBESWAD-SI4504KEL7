<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Recycle Connect</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('/assets/logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-roboto antialiased lg:flex min-h-screen">
    <div class="lg:w-1/2 bg-[#52b788] p-6 sm:pt-0 hidden lg:block">
        <div class="flex flex-col justify-center h-full text-white text-center">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo of Recycle Connect" class="mx-auto w-1/3">
            <h1 class="text-6xl">Recycle Connect</h1>
            <p class="font-light mt-6">Recycle Connect is a comprehensive platform dedicated to environmental
                education and fostering
                sustainable practices. Our website empowers users to make a positive impact on the environment by
                providing engaging educational content on recycling and waste management.</p>
        </div>
    </div>
    <div class="lg:w-1/2 bg-[#b7e4c7] min-h-screen flex flex-col items-center justify-center p-6 sm:pt-0">
        <div class="flex justify-end w-full">
            @if(request()->is('register'))
            <a href="{{ route('registerVendor') }}" class="flex justify-end items-center px-4 py-2 sm:mt-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Register as Vendor</a>
            @endif
            @if(request()->is('register-vendor'))
            <a href="{{ route('register') }}" class="flex justify-end items-center px-4 py-2 sm:mt-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Register as User</a>
            @endif
        </div>
        <div>
            <a href="/">
                <x-application-logo class="mx-auto" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#52B788] shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>

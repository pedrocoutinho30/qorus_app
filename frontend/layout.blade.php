<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Qorus Group')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Inter:400%7CRoboto Mono:400,200,300,600,700%7COpen Sans:400,300&amp;subset=latin,vietnamese,khmer,cyrillic-ext,greek-ext,greek,devanagari,latin-ext,cyrillic" class="">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>

<body class="flex flex-col min-h-screen bg-white text-gray-900">

    @include('frontend.partials.header')
    <main class="flex-1 z-10 w-full max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Certifique-se de ter o jQuery -->

</body>



</html>
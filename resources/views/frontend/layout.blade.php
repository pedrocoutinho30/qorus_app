<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Qorus Group')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/png">
</head>

<body>
    @include('frontend.partials.header') <!-- Header -->

    <main class="content">

        @yield('content') <!-- Conteúdo Dinâmico -->
    </main>

    @include('frontend.partials.footer') <!-- Footer -->

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Bodoni MT", "Bodoni 72", serif;
            /* Fallback para serif caso não exista */
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            max-height: 100vh;

        }

        body.menu-open {
            overflow: hidden;
            /* Bloqueia o scroll lateral */
        }

        .content {
            flex: 1;
        }
    </style>
</body>

</html>
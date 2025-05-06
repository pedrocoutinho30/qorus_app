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

<body>

    @include('frontend.partials.header')
    <main class="content">
        @yield('content') <!-- Conteúdo Dinâmico -->
    </main>


    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            /* font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, Ubuntu, Arial, sans-serif; */
            font-weight: 400;
            /* Fallback para serif caso não exista */
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            max-height: 100vh;

        }

        header,
        footer {
            flex: 0 0 auto;
            /* Garante que o header e o footer não expandam */

        }

        body.menu-open {
            overflow: hidden;
            /* Bloqueia o scroll lateral */
        }

        .content {
            flex: 1;
            z-index: 1;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Certifique-se de ter o jQuery -->

    <script>
        // Garante que a página vá para o topo quando recarregada
        $(document).ready(function() {
            $(window).scrollTop(0); // Define a rolagem para o topo da página
            $(window).trigger('scroll');
        });
    </script>
</body>



</html>
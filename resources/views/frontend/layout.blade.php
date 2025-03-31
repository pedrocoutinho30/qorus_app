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
        }

        /** Animação */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            /* Cor de fundo da animação */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Garante que a animação fique acima de todo o conteúdo */
        }

        .animation-container {
            position: relative;
            width: 100px;
            height: 100px;
        }

        .animation-image {
            position: absolute;
            width: 100%;
            height: 100%;
            animation: circular-motion 10s linear infinite;
            /* Animação de rotação */
        }

        .animation-container {
            position: relative;
            width: 100px;
            height: 100px;
        }

        .animation-image {
            position: absolute;
            width: 100%;
            height: 100%;
            animation: spiral-motion 10s linear infinite;
            /* Animação em espiral */
        }

        @keyframes spiral-motion {
            0% {
                transform: rotate(0deg) translateX(0) rotate(0deg);
            }

            25% {
                transform: rotate(90deg) translateX(25px) rotate(-90deg);
            }

            50% {
                transform: rotate(180deg) translateX(50px) rotate(-180deg);
            }

            75% {
                transform: rotate(270deg) translateX(75px) rotate(-270deg);
            }

            100% {
                transform: rotate(360deg) translateX(100px) rotate(-360deg);
            }
        }
    </style>
</body>

</html>
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Qorus Group')</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Preload fonts with onload to apply -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter:400%7CRoboto+Mono:400,200,300,600,700%7COpen+Sans:400,300&amp;subset=latin,vietnamese,khmer,cyrillic-ext,greek-ext,greek,devanagari,latin-ext,cyrillic" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400%7CRoboto+Mono:400,200,300,600,700%7COpen+Sans:400,300&amp;subset=latin,vietnamese,khmer,cyrillic-ext,greek-ext,greek,devanagari,latin-ext,cyrillic">
    </noscript>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        .rocket-rise {
            --start-top: 150%;
            --end-top: 10%;
            position: absolute;
            top: var(--start-top);
            animation: none;
            transition: top 2s ease-out;
        }

        .rocket-rise.animate {
            animation: rise 8s ease-out forwards;
        }

        @keyframes rise {
            from {
                top: var(--start-top);
            }

            to {
                top: var(--end-top);
            }
        }

        /* Animação de opacidade para fade in */
        .hideme {
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .hideme.visible {
            opacity: 1;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-900">


    @include('frontend.partials.header')
    <main class="flex-1 z-10 w-full {{ Request::is('pt/inovacao-e-sustentabilidade') || Request::is('en/innovation-and-sustainability') ? '' : 'pt-[6vh]' }}">
        @yield('content')
    </main>


    <?php
    $currentPath = Request::path();
    $isBlack = in_array($currentPath, ['/', 'en/', 'en/about-qorus',  'en/services', 'pt/sobre-a-qorus', 'pt/servicos']);
    $isBlackAndGrey = in_array($currentPath, ['en/innovation-and-sustainability', 'pt/inovacao-e-sustentabilidade']);
    $isWhite = in_array($currentPath, ['en/contacts', 'pt/contactos']);
    ?>
    @if ($isBlack)
    @include('frontend.partials.footer', ['footerColor' => 'footer-black'])
    @elseif ($isBlackAndGrey)
    @include('frontend.partials.footer', ['footerColor' => 'footer-black', 'footerStyle' => 'grey'])
    @elseif ($isWhite)
    @include('frontend.partials.footer', ['footerColor' => 'footer-white', 'footerStyle' => 'grey-contacts'])
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const rockets = document.querySelectorAll('.rocket-rise');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                        observer.unobserve(entry.target); // Para animar apenas 1 vez
                    }
                });
            }, {
                threshold: 0.1 // Começa a animar quando 10% estiver visível
            });

            rockets.forEach(rocket => {
                observer.observe(rocket);
            });
        });
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<style>
    html,
    body {
        margin: 0;
        padding: 0;
    }
</style>

</html>
@extends('frontend.layout') <!-- Estendendo o layout principal -->
@section('content')
<div class="homepage-container">
    <div class="grid-container">
        <!-- Conteúdo da grid -->
    </div>
    <div class="title-overlay">
        {!! $page->getTranslatedAttribute('title', $lang) !!}
    </div>
</div>
<div class="footer-wrapper ">
    @include('frontend.partials.footer', ['footerColor' => 'footer-white'])
</div>
@endsection


<style>
    html,
    body {
        overflow: hidden;
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }

    /* Estilo base para desktop */
    .homepage-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url("{{ asset('storage/' . $page->image_1) }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100vw;
        height: 100vh;
        position: relative;
        z-index: 1;
    }

    .title-overlay {
        position: absolute;
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        top: 55%;
        left: 90px;
        transform: translateY(-50%);
        color: rgb(255, 255, 255);
        z-index: 2;
        opacity: 0;
        animation: fadeIn 3s forwards;
    }

    .grid-container {
        display: grid;
        grid-template-areas:
            "top top top"
            "left center right"
            "bottom bottom bottom";
        grid-template-columns: 1fr auto 1fr;
        grid-template-rows: 1fr auto 1fr;
        width: 100vw;
        height: 100vh;
        position: relative;
        margin-top: 0;
    }

    /* Responsividade para tablets */
    @media (max-width: 1024px) {
        .homepage-container {
            background-image: url("{{ asset('storage/' . $page->image_1_mobile) }}");
            /* Imagem específica para mobile */

        }

        .title-overlay {
            font-size: 48px;
            left: 30px;
        }

        .grid-container {
            grid-template-areas:
                "top"
                "center"
                "bottom";
            grid-template-columns: 1fr;
            grid-template-rows: auto auto auto;
        }
    }

    /* Responsividade para smartphones */
    @media (max-width: 768px) {
        .homepage-container {
            background-image: url("{{ asset('storage/' . $page->image_1_mobile) }}");
            /* Imagem específica para mobile */
        }

        .title-overlay {
            font-size: 10vw;
            left: 20px;
            top: 60%;
        }

        .grid-container {
            grid-template-areas:
                "center"
                "bottom";
            grid-template-columns: 1fr;
            grid-template-rows: auto auto;
        }

        .footer-wrapper {
            width: 110%;
            /* Torna o footer um pouco mais largo */
            left: -5%;
            /* Centraliza o footer ao expandir a largura */
        }

        footer {
            padding: 10vh 0;
            /* Ajusta o espaçamento vertical */
        }

        .footer-line {
            width: calc(100% - 10vh);
            /* Ajusta a largura da linha no footer */
        }

        .footer-text {
            margin-left: 5vh;
            /* Ajusta o alinhamento do texto */
        }
    }

    /* Responsividade para telas muito pequenas */
    @media (max-width: 480px) {
        .homepage-container {
            background-size: cover;
        }

        .title-overlay {
            font-size: 10vw;
            left: 5%;
            top: 60%;
        }

        .grid-container {
            grid-template-areas:
                "center";
            grid-template-columns: 1fr;
            grid-template-rows: auto;
        }
    }


    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    .footer-wrapper {
        position: absolute;
        /* Posiciona o footer sobre a imagem */
        bottom: 0;
        /* Alinha o footer na parte inferior */
        width: 100%;
        z-index: 2;
        /* Garante que o footer fique acima da imagem */
    }

    footer {
        width: 100%;
        background-color: transparent;
        padding: 14vh 0;
        text-align: left;
    }

    .footer-line {
        width: calc(100% - 18.5vh);
        height: 2px;
        background-color: white;
        margin: 0 auto;
    }

    .footer-text {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 14px;
        margin-left: 9vh;
        margin-top: 5px;
        color: white;
    }
</style>
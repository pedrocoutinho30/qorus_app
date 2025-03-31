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
<div class="footer-wrapper">
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

    .homepage-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url("{{ asset('storage/' . $page->image_1) }}");
        background-size: cover;
        /* Ajusta a imagem para cobrir a tela */
        background-position: center;
        background-repeat: no-repeat;
        width: 100vw;
        /* height: 100vh; */
        height: 100vh;
        /* Subtrai a altura do footer */
        /* Subtrai a altura do header */
        /* flex: 1 0 auto; */
        flex: 1;
        z-index: 1;
        position: relative;
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

    .title-overlay {
        position: absolute;
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        top: 50%;
        left: 50px;
        transform: translateY(-50%);
        color: rgb(255, 255, 255);
        z-index: 2;
        opacity: 0;
        animation: fadeIn 3s forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
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
        /* Subtrai a altura do header */
        position: relative;
        margin-top: 0;
    }

    /* Responsividade para tablets */
    @media (max-width: 1024px) {
        .homepage-container {
            background-size: cover;
        }

        .title-overlay {
            font-size: 48px;
            left: 30px;
        }

        .grid-container {
            margin-top: 0;
        }
    }

    /* Responsividade para smartphones */
    @media (max-width: 768px) {
        .homepage-container {
            background-size: cover;
        }

        .title-overlay {
            font-family: 'Aeonik-Medium', sans-serif;
            /* Fonte Aeonik-Medium */
            font-size: 110px;
            /* Tamanho de fonte maior */
            left: 20px;
        }

        .grid-container {
            margin-top: 0;
        }
    }

    /* Responsividade para telas muito pequenas */
    @media (max-width: 480px) {
        .homepage-container {
            background-size: cover;
        }

        .title-overlay {
            font-family: 'Aeonik-Medium', sans-serif;
            /* Fonte Aeonik-Medium */
            font-size: 40px;
            /* Tamanho de fonte maior */
            left: 10px;

        }

        .grid-container {
            margin-top: 0;
        }
    }
</style>
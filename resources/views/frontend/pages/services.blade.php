@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container-services">
    <div class="image-services ">
        <img src="{{ asset('storage/' . $page->image_1) }}" alt="Imagem Desktop" class="image-desktop">
        <img src="{{ asset('storage/' . $page->image_1_mobile) }}" alt="Imagem Mobile" class="image-mobile">
        <img src="{{ asset('img/Foguetao_Pagina02.svg') }}" alt="Foguetão" class="overlay-image-top">
    </div>
    <!-- Barra branca -->
    <div class="white-bar"></div>
    <div class="title">
        {{$page->getTranslatedAttribute('title', $lang)}}
    </div>


    <div class="content-for-services fade-in">
        @foreach($otherTexts as $otherText)
        <hr>
        <div class="service-item hideme">
            <div class="title-services">
                {!! $otherText->getTranslatedAttribute('title', $lang) !!}
            </div>
            
            <div class="content-services">
                {!! $otherText->getTranslatedAttribute('text', $lang) !!}
            </div>
        </div>
        @endforeach
    </div>
    <div class="image-services imagem-2">
        <img src="{{ asset('storage/' . $page->image_2) }}" alt="Imagem Desktop" class="image-desktop">
        <img src="{{ asset('storage/' . $page->image_2_mobile) }}" alt="Imagem Mobile" class="image-mobile">
        <img src="{{ asset('img/Foguetao_Pagina02.svg') }}" alt="Foguetão" class="overlay-image-bottom">
    </div>
</div>


@include('frontend.partials.footer', ['footerColor' => 'footer-black'])
@endsection

<style>
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, rgb(248, 244, 238), #ffffff);
        background-repeat: no-repeat;
        background-attachment: fixed;
        overflow-x: hidden;
        /* esconde qualquer conteúdo que passe para fora horizontalmente */
        max-width: 100vw;
        /* impede que ultrapasse a largura da viewport */
        /* Bloqueia o scroll no início */
    }

    /* Barra branca */
    .white-bar {

        /* Ocupa toda a largura */
        height: 100px;
        /* Altura da barra branca */
        background-color: #ffffff;
        /* Cor branca */
        display: block;
        /* Garante que a barra seja exibida */
        margin: 0;
        /* Remove margens adicionais */
    }

    .container-services {
        display: flex;
        flex-direction: column;
        /* Dispor os elementos em coluna */
        justify-content: flex-start;
        /* Alinhar os elementos ao início */
        padding: 0;
        justify-content: space-between;
        padding-top: 100px;
        width: 100%;
        max-width: 100%;
        margin-bottom: 10px;
        /* Ajuste conforme necessário para a altura do header */
    }


    .image-services {
        position: relative;
        /* Define o contexto de posicionamento para a imagem sobreposta */
        width: 100%;
        margin-top: -5%;
        padding: 0;
    }

    /* Estilo base: exibe as imagens desktop por padrão */
    .image-mobile {
        display: none !important;
        /* Oculta as imagens mobile por padrão */
    }

    .image-desktop {
        display: block !important;
        /* Exibe as imagens desktop por padrão */
    }

    .overlay-image-top {
        position: absolute;
        /* Posiciona a imagem em relação ao container pai */
        top: 110%;
        /* Move a imagem para metade da altura do container */
        right: 8%;
        /* Alinha a imagem ao lado direito */
        transform: translateY(-50%);
        /* Centraliza verticalmente */
        width: 45% !important;
        /* Faz a imagem ocupar metade da largura da tela */
        /* Mantém a proporção da imagem */
        z-index: 1;
        /* Garante que a imagem fique sobre a principal */
    }

    .image-services.imagem-2 {
        margin-top: 30%;
        margin-bottom: 0;
        /* Espaçamento entre a imagem e o conteúdo */
    }

    .overlay-image-bottom {
        position: absolute;
        top: 30%;
        /* Move a imagem para metade da altura do container */
        left: 6%;
        /* Alinha a imagem ao lado direito */
        transform: translateY(-50%);
        /* Centraliza verticalmente */
        width: 45% !important;
        /* Faz a imagem ocupar metade da largura da tela */
        /* Mantém a proporção da imagem */
        z-index: 1;
    }


    .image-services img {
        width: 100%;
        height: auto;
        display: block;
    }

    .content-for-services {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 0 5%;
        margin-top: 10%;
    }

    hr {
        margin-bottom: 2%;
        margin-top: 10%;
        /* Margem superior */
        border: 0;
        /* Remove bordas padrão */
        border-top: 2px solid;
        /* Define uma borda superior visível */
        width: 100%;
        /* Garante que o <hr> ocupe toda a largura disponível */
    }

    .title {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 68px;
        font-weight: 550;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-top: 20%;
        margin-left: 5%;

    }



    .service-item {
        display: flex;
        align-items: flex-start;
        /* Alinha o título e o texto verticalmente */
        margin-bottom: 20px;
        /* Espaçamento entre os itens */
        gap: 20%;
        /* Define um espaçamento fixo entre o título e o texto */
    }

    .title-services {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 38px;
        font-weight: 550;
        width: 20%;
        margin-top: 2%;

    }

   
    .content-services {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 30px;
        /* Tamanho da fonte do texto */
        /* Cor do texto */
        line-height: 1.4;
        /* Espaçamento entre linhas */
        margin: 0;

    }



    .hideme {
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    /* Estilo para quando o elemento fica visível */
    .hideme.visible {
        opacity: 1;
    }


    @media (max-width: 768px) {

        /* Barra branca */
        .white-bar {
            height: 70px;
        }

        .title {
            font-size: 38px;
            font-weight: 600;
            /* Fonte personalizada */
            margin-top: 48%;
            margin-left: 5%;
        }

        hr {
            margin-bottom: 7%;
            margin-top: 10%;
            /* Margem superior */
            border: 0;
            /* Remove bordas padrão */
            border-top: 2px solid;
            /* Define uma borda superior visível */
            width: 100%;
            /* Garante que o <hr> ocupe toda a largura disponível */
        }

        .service-item {
            flex-direction: column;
            /* Alinha o título e o texto em coluna */
            align-items: flex-start;
            /* Alinha os itens à esquerda */
            gap: 10px;
            /* Espaçamento entre o título e o texto */
        }

        .title-services {
            width: 100%;
            /* Faz o título ocupar toda a largura */
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 3%;
            /* Ajusta o tamanho da fonte para dispositivos pequenos */
        }

        .content-for-services {
            padding: 0 5%;
            margin-top: 8%;
        }

        .content-services br {
            display: none;
            /* Oculta as tags <br> */
        }

        .content-services {
            display: flex;
            flex-wrap: wrap;
            /* 👈 super importante */
            font-size: 22px;
            /* Ajuste o tamanho da fonte para telas menores */
            /* Margem à esquerda */
            margin-right: 2%;
            /* 👇 evita que palavras muito grandes "estiquem" a janela */
            word-break: break-word;
            overflow-wrap: break-word;

            /* 👇 impede overflow horizontal */
            max-width: 100%;
            line-height: 1.2;
            width: 100%;
            /* Faz o texto ocupar toda a largura */
            font-size: 18px;
            white-space: normal;
            /* Ajusta o tamanho da fonte para dispositivos pequenos */
        }


        .overlay-image-top {
            position: absolute;
            /* Posiciona a imagem em relação ao container pai */
            top: 117%;
            /* Move a imagem para metade da altura do container */
            right: 8%;
            /* Alinha a imagem ao lado direito */
            transform: translateY(-50%);
            /* Centraliza verticalmente */
            width: 45% !important;
            /* Faz a imagem ocupar metade da largura da tela */
            /* Mantém a proporção da imagem */
            z-index: 1;
            /* Garante que a imagem fique sobre a principal */
        }

        .image-mobile {
            margin-top: -1%;
            display: block !important;
            /* Exibe as imagens mobile em dispositivos pequenos */
        }

        .image-desktop {
            display: none !important;
            /* Oculta as imagens desktop em dispositivos pequenos */
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    console.log('Largura da tela:', window.innerWidth);
    $(document).ready(function() {

        /* Every time the window is scrolled ... */
        $(window).scroll(function() {

            /* Check the location of each desired element */
            $('.hideme').each(function(i) {

                var bottom_of_object = $(this).position().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height() + 100;

                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).addClass('visible');

                }

            });

        });

    });
</script>
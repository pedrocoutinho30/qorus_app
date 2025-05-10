@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container-about">
    <div class="title">
        {{$page->getTranslatedAttribute('title', $lang)}}
    </div>

    <div class="content fade-in hideme excerpt">
        {!! $page->getTranslatedAttribute('excerpt', $lang) !!}
    </div>
    <div class="content content2 fade-in hideme body-about">
        {!! $page->getTranslatedAttribute('body', $lang) !!}
    </div>
    <div class="image image-right">
        <img src="{{asset('storage/'.$page->image_1)}}" alt="">
        <img src="{{ asset('img/Foguetao_Pagina02.svg') }}" alt="Foguetão" class="overlay-image">
    </div>
</div>
<div class="footer-wrapper">

    @include('frontend.partials.footer', ['footerColor' => 'footer-black'])
</div>
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

    .container-about {
        display: flex;
        flex-direction: column;
        /* Dispor os elementos em coluna */
        justify-content: flex-start;
        /* Alinhar os elementos ao início */
        padding: 0;
        justify-content: space-between;
        padding-top: 100px;
        width: 100vw;
        max-width: 100%;
        margin-top: 9vh;
        margin-left: 5%;
        /* Ajuste conforme necessário para a altura do header */
    }

    .title {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 68px;
        font-weight: 550;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-top: 10%;

    }

    .excerpt {
        margin-bottom: -2px;
        /* Reduza o espaçamento inferior */
    }

    .body-about {
        margin-top: -2px !important;
        /* Reduza o espaçamento superior */
    }

    .hideme {
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
    }

    /* Estilo para quando o elemento fica visível */
    .hideme.visible {
        opacity: 1;
    }

    .content {
        font-family: 'Aeonik-regular', sans-serif;
        font-size: 41px;
        color: rgb(0, 0, 0);
        margin-top: 2%;
        line-height: 1.2;

    }

    .content2 {
        margin-top: -2%;
        color: rgba(62, 62, 62, 0.55);
    }

    .image-right {
        position: relative;
        /* Define o container como relativo para posicionar a nova imagem */
        width: 80%;
        /* Largura total menos 20px (10px de margem em cada lado) */
        margin-left: 20px;
        margin-top: 10vh;
        margin-bottom: 10vh;
        /* Margem de 10px à direita e à esquerda */
    }

    .image-right img {
        width: 100%;
        /* Faz a imagem principal ocupar toda a largura do container pai */
        height: auto;
        /* Mantém a proporção da imagem */
        display: block;
        /* Remove o espaço em branco ao redor da imagem */
    }

    .overlay-image {
        position: absolute;
        /* Posiciona a nova imagem sobre a principal */
        bottom: -100px;
        /* Ajusta a posição vertical para ficar um pouco abaixo */
        left: 60%;
        /* Centraliza horizontalmente */
        transform: translateX(-50%);
        /* Ajusta a centralização */
        width: 50%;
        /* Define a largura da nova imagem (ajuste conforme necessário) */
        height: auto;
        /* Mantém a proporção da nova imagem */
        z-index: 1;
        /* Garante que a nova imagem fique sobre a principal */
    }



    @media (max-width: 768px) {}

    @media (max-width: 480px) {
        .title {
            font-size: 36px;
            margin-bottom: 15px;
            /* Ajuste o tamanho da fonte para telas menores */
        }

        .content {
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
        }

        .body-about {
            margin-top: 8%;
        }


        .overlay-image {
            bottom: -14%;
        }

    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        /* Every time the window is scrolled ... */
        $(window).scroll(function() {

            /* Check the location of each desired element */
            $('.hideme').each(function(i) {

                var bottom_of_object = $(this).position().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();

                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).addClass('visible');

                }

            });

        });

        // Optional: fade in title on page load
        $('.title').fadeIn('slow');
    });

    document.addEventListener('DOMContentLoaded', function() {
        const excerptElement = document.querySelector('.excerpt');
        const bodyElement = document.querySelector('.body-about');

        // Verifica se a largura da tela é menor ou igual a 768px
        if (window.innerWidth <= 480) {
            // Remove as tags HTML do conteúdo do excerpt
            const plainText = excerptElement.innerHTML.replace(/<\/?[^>]+(>|$)/g, ""); // Remove tags HTML
            excerptElement.textContent = plainText; // Define o texto puro no elemento

            const plainTextBody = bodyElement.innerHTML.replace(/<\/?[^>]+(>|$)/g, ""); // Remove tags HTML
            bodyElement.textContent = plainTextBody; // Define o texto puro no elemento
        }
    });
</script>
@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container-innovation">
    <div class="title">
        {!! $page->getTranslatedAttribute('excerpt', $lang) !!}

    </div>
    <div class="content-text">
        {!! $page->getTranslatedAttribute('body', $lang) !!}
    </div>
    <div class="image-services">
        <img src="{{asset('storage/'.$page->image_1)}}" alt="">
        <img src="{{ asset('img/Foguetao_Pagina04.svg') }}" alt="Foguetão" class="overlay-image-top">
    </div>


    <div class="content-for-services fade-in">
        @foreach($otherTexts as $otherText)

        @if($otherText->getTranslatedAttribute('title', $lang) == 'Práticas<br>Sustentáveis')
        <div class="service-title-container">
            {!! $otherText->getTranslatedAttribute('title', $lang) !!}
        </div>
        @else

        <hr>
        <div class="service-item">
            <div class="title-services">
                {!! $otherText->getTranslatedAttribute('title', $lang) !!}
            </div>
            <div class="content-services">
                {!! $otherText->getTranslatedAttribute('text', $lang) !!}
            </div>
        </div>
        @endif
        @endforeach
    </div>

</div>

@include('frontend.partials.footer', ['footerColor' => 'footer-black', 'footerStyle' => 'grey'])

@endsection

<style>
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, rgb(248, 244, 238), #ffffff);
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .container-innovation {
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
        margin-top: 6%;
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
        margin-left: 5%;
    }



    .content-text {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 63px;

        color: grey;
        /* Tamanho da fonte do texto */
        /* Cor do texto */
        line-height: 1.2;
        /* Espaçamento entre linhas */
        margin-left: 5%;
        margin-top: -4% !important;
    }

    .image-services {
        position: relative;
        /* Define o contexto de posicionamento para a imagem sobreposta */
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .image-services img {
        width: 100%;
        height: auto;
        display: block;
    }

    .overlay-image-top {
        position: absolute;
        top: 90%;
        /* Posição inicial */
        right: 8%;
        /* Alinha a imagem ao lado direito */
        transform: translateY(-50%);
        width: 45% !important;
        /* Faz a imagem ocupar metade da largura da tela */
        z-index: 1;
        /* Garante que a imagem fique sobre a principal */
        transition: top 1.5s ease-in-out;
        /* Transição suave para a posição final */
    }

    .overlay-image-top.scrolled {
        top: 110%;
        /* Posição final ao rolar */
    }

    .service-title-container {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        font-weight: 550;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);

        /* Cor preta */
        margin-top: 22%;
        margin-bottom: 0;
    }

    .content-for-services {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 0 5%;
        margin-top: 11.8%;
        background-color: rgb(186, 186, 186);
    }

    hr {
        margin-bottom: 5%;
        margin-top: 5%;
        /* Margem superior */
        border: 0;
        /* Remove bordas padrão */
        border-top: 2px solid;
        /* Define uma borda superior visível */
        width: 100%;
        /* Garante que o <hr> ocupe toda a largura disponível */
    }

    .service-item {
        display: flex;
        align-items: center;
        /* Alinha o título e o texto verticalmente */
        margin-bottom: 20px;
        margin-top: -25px !important;
        /* Espaçamento entre os itens */
        gap: 22%;
        color: rgb(0, 0, 0);
        /* Define um espaçamento fixo entre o título e o texto */
    }

    .title-services {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 42px;
        font-weight: 550;
        /* Tamanho da fonte do título */
        margin-top: -3%;
        width: 23%;
        white-space: nowrap;
        color: rgb(0, 0, 0);
        /* Impede que o texto quebre em várias linhas */
    }

    .content-services {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 34px;
        /* Tamanho da fonte do texto */
        /* Cor do texto */
        line-height: 1.4;
        /* Espaçamento entre linhas */
        margin: 0;
        color: rgb(0, 0, 0);
    }

    @media (max-width: 480px) {

        .title {
            font-size: 36px;
            font-weight: 550;
            /* Fonte personalizada */
            margin-top: 30%;
            margin-bottom: -9%;
            margin-left: 5%;
        }


        .content-text {
            font-size: 25px;
            line-height: 1.4;
            margin-left: 5%;
            margin-top: 4% !important;
        }

        .content-services br {
            display: none;
            /* Oculta as tags <br> */
        }

        .service-title-container {
            font-size: 30px;
            font-weight: 600;
            /* Fonte personalizada */
            margin-top: 50%;
            margin-bottom: 0;
        }

        hr {
            margin-bottom: 18%;
            margin-top: 9%;
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
            font-weight: 590;
            /* Ajusta o tamanho da fonte para dispositivos pequenos */
        }

        .content-services {
            width: 100%;
            /* Faz o texto ocupar toda a largura */
            font-size: 17px;
            /* Ajusta o tamanho da fonte para dispositivos pequenos */
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const overlayImageTop = document.querySelector('.overlay-image-top');

        window.addEventListener('scroll', function() {
            const imagePosition = overlayImageTop.getBoundingClientRect().top; // Posição da imagem em relação à janela
            const windowHeight = window.innerHeight; // Altura da janela

            // Verifica se a imagem está visível na janela
            if (imagePosition <= windowHeight) {
                overlayImageTop.classList.add('scrolled'); // Adiciona a classe quando visível
            } else {
                overlayImageTop.classList.remove('scrolled'); // Remove a classe quando não visível
            }
        });
    });
</script>
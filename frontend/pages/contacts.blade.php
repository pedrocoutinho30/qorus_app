@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
@if(session('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger" id="error-alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container-conctacts">
    <!-- colocar imagem à direita -->
    <div class="image-contacts-up">
        <img src="{{ asset('img/Foguetao_Pagina05.svg') }}" alt="Foguetão" class="overlay-image-top">
    </div>
    <div class="title-contacts">
        {!!$page->getTranslatedAttribute('body', $lang)!!}
    </div>
    <hr>
    <div class="content-info-contacts fade-in">
        <div class="excerpt">
            {!! $page->getTranslatedAttribute('excerpt', $lang) !!}
        </div>
        <div class="contact-details">
            <span class="contact-email">{!! $otherTexts[0]->getTranslatedAttribute('text', $lang) !!}</span>
            <span class="contact-phone">{!! $otherTexts[1]->getTranslatedAttribute('text', $lang) !!}</span>
        </div>
    </div>

</div>
@include('frontend.pages.form')

<div class="image-contacts">
    <img src="{{asset('storage/'.$page->image_1)}}" alt="">
</div>
<div class="footer-wrapper-form">
    @include('frontend.partials.footer', ['footerColor' => 'footer-white'])
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
    }

    .container-conctacts {
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

        /* Ajuste conforme necessário para a altura do header */
    }

    .title-contacts {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-top: 15%;
        margin-left: 5%;
    }

    .image-contacts-up {
        position: absolute;
        font-weight: 1600;
        /* Permite posicionar a imagem em relação ao contêiner pai */
        top: 30%;
        /* Ajuste para posicionar acima da linha do título */
        right: 10%;
        /* Alinha a imagem à direita */
        width: 300px;
        /* Ajuste o tamanho da imagem conforme necessário */
        z-index: 1;
        /* Garante que a imagem fique acima de outros elementos, se necessário */
        transform: translateY(-50%);
        transition: top 1.5s ease-in-out;
    }

    .image-contacts-up.scrolled {
        top: 40%;
        /* Posição final ao rolar */
    }


    hr {
        margin-bottom: 4%;
        margin-top: 7%;
        margin-left: 5%;
        margin-right: 5%;
        /* Margem superior */
        border-top: 2px solid;
        /* Define uma borda superior visível */
        /* Garante que o <hr> ocupe toda a largura disponível */
    }

    .content-info-contacts {

        display: flex;
        flex-direction: row;
        /* Alinha os elementos horizontalmente */
        align-items: center;
        /* Centraliza os elementos verticalmente */
        justify-content: center;
        /* Centraliza os elementos horizontalmente */
        gap: 10px;
        /* Espaçamento entre o excerpt e os detalhes de contato */
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 30px;
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-left: 6%;
        margin-right: 5%;
        margin-bottom: 12%;
    }

    .excerpt {
        flex: 1;
        /* Faz o excerpt ocupar o espaço necessário */
    }

    .contact-details {
        display: flex;
        flex-direction: column;
        /* Alinha o email e o número de telemóvel verticalmente */
        gap: 10px;
        /* Espaçamento entre o email e o número de telemóvel */
        font-size: 30px;
        /* Tamanho da fonte para os detalhes */
        align-items: flex-start;
        margin-right: 30%;
        /* Alinha os elementos à esquerda */
    }

    .contact-email,
    .contact-phone {
        font-family: 'Aeonik-Regular', sans-serif;
        color: rgb(0, 0, 0);
        /* Cor preta */
    }

    .image-contacts {
        position: relative;
        /* Define o contexto de posicionamento para a imagem sobreposta */
        width: 100%;
        padding: 0;
    }

    .image-contacts img {
        width: 100%;
        height: auto;
        display: block;
    }

    .footer-wrapper-form {
        position: flex;
        /* Posiciona o footer sobre a imagem */
        /* Alinha o footer na parte inferior */
        width: 100%;
        z-index: 1;
        background-color: rgb(28, 28, 28);
        /* Garante que o footer fique acima da imagem */
    }


    body.contacts-page .close-menu {
        background: none !important;
        /* Remove qualquer fundo */
        border: none !important;
        /* Remove qualquer borda */
        box-shadow: none !important;
        /* Remove qualquer sombra */
        outline: none !important;
        /* Remove o contorno */
    }

    @media (max-width: 768px) {

        .title-contacts {
            font-size: 40px;
            /* Fonte personalizada */
            margin-top: 25%;
        }

        .image-contacts-up {
            position: absolute;
            /* Permite posicionar a imagem em relação ao contêiner pai */
            top: 20%;
            /* Ajuste para posicionar acima da linha do título */
            right: 10%;
            /* Alinha a imagem à direita */
            width: 80px;
            /* Ajuste o tamanho da imagem conforme necessário */
            z-index: 1;
            transform: translateY(-50%);
            transition: top 1.5s ease-in-out;
        }

        .image-contacts-up.scrolled {
            top: 40%;
            /* Posição final ao rolar */
        }

        .content-info-contacts {
            flex-direction: column;
            /* Alinha os elementos em coluna */
            align-items: flex-start;
            /* Alinha os elementos à esquerda */
            gap: 15px;
            /* Espaçamento entre os elementos */
            font-size: 18px;
        }

        .excerpt,
        .contact-details {
            width: 100%;
            font-size: 18px;
            line-height: 1.2;
            /* Faz os elementos ocuparem toda a largura */
        }

        .contact-email,
        .contact-phone {
            line-height: 0.7;
            /* Define o espaçamento entre as linhas */
        }
    }

    .alert {
        position: fixed;
        top: 12%;
        right: 20px;
        z-index: 9999;
        /* Valor alto para garantir que fique acima de tudo */
        padding: 15px 20px;
        border-radius: 5px;
        font-size: 14px;
        box-shadow: 0 2px 5px rgba(47, 47, 47, 0.32);
        animation: fadeIn 0.5s ease-in-out;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successAlert = document.getElementById("success-alert");
        if (successAlert) {
            // Define o tempo para desaparecer (5 segundos)
            setTimeout(() => {
                successAlert.style.opacity = "0"; // Faz a mensagem desaparecer suavemente
                setTimeout(() => successAlert.remove(), 500); // Remove o elemento após a transição
            }, 5000); // 5000ms = 5 segundos
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const overlayImageTop = document.querySelector('.image-contacts-up');

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
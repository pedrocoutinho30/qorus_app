@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
@if(session('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container-conctacts">
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
        background: linear-gradient(to bottom, rgb(253, 248, 234), #ffffff);
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .container-contacts {
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
        margin-top: 30%;
        margin-left: 5%;
    }

    hr {
        margin-bottom: 4%;
        margin-top: 10%;
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

    .alert-success {
        position: fixed;
        /* Fixa a mensagem no canto superior esquerdo */
        top: 10px;
        /* Distância do topo */
        right: 10px;
        /* Distância da esquerda */
        background-color: rgba(0, 128, 0, 0.8);
        /* Verde com transparência */
        color: white;
        /* Cor do texto */
        padding: 10px 20px;
        /* Espaçamento interno */
        border-radius: 5px;
        /* Bordas arredondadas */
        font-size: 14px;
        /* Tamanho da fonte */
        z-index: 1000;
        /* Garante que fique acima de outros elementos */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Adiciona uma leve sombra */
        transition: opacity 0.5s ease;
        /* Transição suave para desaparecer */
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
</script>
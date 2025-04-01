@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container-about">
    <div class="title">
        {{$page->getTranslatedAttribute('title', $lang)}}
    </div>
    <div class="content fade-in">
        {!! $page->getTranslatedAttribute('excerpt', $lang) !!}
    </div>
    <div class="content content2 fade-in">
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
        background: linear-gradient(to bottom, rgb(253, 248, 234), #ffffff);
        background-repeat: no-repeat;
        background-attachment: fixed;
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
        margin-top: 8vh;
        margin-left: 5%;
        /* Ajuste conforme necessário para a altura do header */
    }

    .title {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-top: 10%;

    }

    .content {
        font-family: 'Aeonik-regular', sans-serif;
        font-size: 41px;
        color: rgb(0, 0, 0);
        margin-top: 2%;
        line-height: 1;
    }

    .content2 {
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

    .footer-wrapper {
        position: absolute;
        /* Posiciona o footer sobre a imagem */
        /* Alinha o footer na parte inferior */
        width: 100%;
        z-index: 2;
        /* Garante que o footer fique acima da imagem */
    }


  

</style>
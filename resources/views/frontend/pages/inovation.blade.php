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
        <img src="{{ asset('img/Foguetao_Pagina02.svg') }}" alt="Foguetão" class="overlay-image-top">
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
        background: linear-gradient(to bottom, rgb(253, 248, 234), #ffffff);
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
        margin-top: 8%;
        margin-bottom: auto;
        /* Ajuste conforme necessário para a altura do header */
    }

    .title {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-top: 10%;
        margin-left: 5%;
        margin-bottom: 0;

    }

    .content-text {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 61px;
        color: grey;
        /* Tamanho da fonte do texto */
        /* Cor do texto */
        line-height: 1.4;
        /* Espaçamento entre linhas */
        margin-left: 5%;
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

    .service-title-container {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-top: 10%;
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

    .title {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 72px;
        /* Fonte personalizada */
        color: rgb(0, 0, 0);
        /* Cor preta */
        margin-top: 20%;
        margin-left: 5%;
    }

    .service-item {
        display: flex;
        align-items: center;
        /* Alinha o título e o texto verticalmente */
        margin-bottom: 20px;
        /* Espaçamento entre os itens */
        gap: 20%;
        /* Define um espaçamento fixo entre o título e o texto */
    }

    .title-services {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 40px;
        /* Tamanho da fonte do título */
        margin: 0;
        width: 200px;
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
</style>
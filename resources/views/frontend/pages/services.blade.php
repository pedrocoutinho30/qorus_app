@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container-services">
    <div class="image-services">
        <img src="{{asset('storage/'.$page->image_1)}}" alt="">
    </div>
    <div class="title">
        {{$page->getTranslatedAttribute('title', $lang)}}
    </div>

    <div class="content-for-services fade-in">
        @foreach($otherTexts as $otherText)
        <hr>
        <div class="service-item">
            <div class="title-services">
                {!! $otherText->title !!}
            </div>
            <div class="content-services">
                {!! $otherText->text !!}
            </div>
        </div>
        @endforeach
    </div>
    <div class="image-services imagem-2">
        <img src="{{asset('storage/'.$page->image_2)}}" alt="">
    </div>
</div>
@include('frontend.partials.footer', ['footerColor' => 'footer-black'])

@endsection

<style>
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #f6f4ee, #ffffff);
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
        width: 100vw;
        max-width: 100%;
        /* Ajuste conforme necessário para a altura do header */
    }

   
    .image-services {
        width: 100%;
        margin: 0;
        padding: 0;
    }
    .image-services.imagem-2 {
        margin-top: 10%;
        /* Espaçamento entre a imagem e o conteúdo */
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
    margin-top: 30px; /* Margem superior */
    border: 0; /* Remove bordas padrão */
    border-top: 2px solid ; /* Define uma borda superior visível */
    width: 100%; /* Garante que o <hr> ocupe toda a largura disponível */
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
    }

    .title-services {
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 40px;
        /* Tamanho da fonte do título */
        color: #000;
        /* Cor preta */
        /* Margem à direita do título */
    }

    .content-services {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 30px;
        /* Tamanho da fonte do texto */
        color: #333;
        /* Cor do texto */
        line-height: 1.4;
        /* Espaçamento entre linhas */
        margin-left: 20vw;
    }

    
</style>
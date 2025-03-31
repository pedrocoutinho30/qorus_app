@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="homepage-container">


    <div class="grid-container">

        <img src="{{ asset('img/transparent-logo.png') }}" class="img-logo" alt="Logo">
    </div>
</div>
@endsection

<style>
    .homepage-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        background: url('{{ asset("img/background.png") }}') no-repeat center center;
        background-size: cover;
        background-position: center;
        width: 100vw;
        height: 100vh;
        flex: 1 0 auto;
        /* Faz com que o conteúdo principal ocupe o espaço restante */
        z-index: 1;
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
        margin-top: 15vh;
    }

    @media (max-width: 768px) {
        .img-logo {
            max-height: 20%;
            position: absolute;
            top: 2px;
            /* Ajuste conforme necessário */
            right: 2px;
            /* Ajuste conforme necessário */
        }
    }

    @media (min-width: 768px) {
        .img-logo {
            max-height: 40%;
            position: absolute;
            top: 10px;
            /* Ajuste conforme necessário */
            right: 10px;
            /* Ajuste conforme necessário */
        }
    }

 
</style>

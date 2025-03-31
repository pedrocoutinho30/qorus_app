@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container-innovation">

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
        margin-top: 8vh;
        margin-left: 5%;
        /* Ajuste conforme necessário para a altura do header */
    }

    
</style>
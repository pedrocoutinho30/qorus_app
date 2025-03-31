@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="homepage-container">
    <div class="grid-container">

        <div class="dashed-circle">
            @foreach ($menus as $index => $menu)
            <a href="{{ $lang . '/' . $menu->getTranslatedAttribute('slug', $lang) }}" class="menu-link grid-item position-{{ $index + 1 }}" onclick="toggleScale(event, this)">
                <div class="menu-content">
                    <img src="{{ asset('storage/' . $menu->icon) }}" class="icon-menu" alt="">
                    <div class="menu-title">{{$menu->getTranslatedAttribute('title', $lang)}}</div>
                </div>
            </a>
            @endforeach
        </div>
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

    .menu-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }


    .menu-link {
        text-decoration: none;
        color: inherit;
    }



    .position-1,
    .position-2,
    .position-3,
    .position-4 {
        position: absolute;
        /* Posiciona os elementos em relação ao contêiner */
    }

    @media (max-width: 768px) {

        .dashed-circle {
            grid-area: center;
            width: 70vw;
            height: 50vh;
            /* border: 3px dashed #000;
            border-color: rgb(129, 11, 11); 
            border-radius: 50%; */
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            transform: translate(-50%, -70%);
            z-index: 1;
        }

        .icon-menu {
            width: 10vw;
            height: auto;

        }

        .menu-title {
            font-weight: bold;
            font-size: 18px;
            color: rgb(129, 11, 11);
        }

        .grid-item {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: 1;
            word-wrap: break-word;
            overflow-wrap: break-word;
            transition: transform 3s ease, width 3s ease, height 3s ease;
            position: absolute;
        }

        /* Estilos para dispositivos móveis */
        .position-1 {
            top: 2%;
            /* Ajuste conforme necessário */
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .position-2 {
            top: 50%;
            right: 17%;
            transform: translate(50%, -50%);
        }

        .position-3 {
            top: 99%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .position-4 {
            top: 50%;
            left: 20%;
            transform: translate(-50%, -50%);
        }
    }

    @media (min-width: 768px) {

        .dashed-circle {
            grid-area: center;
            width: 60vw;
            height: 40vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            transform: translate(-50%, -90%);
            z-index: 1;
        }

        .icon-menu {
            width: 6vw;
            height: auto;
            filter: hue-rotate(10deg);

        }

        .menu-title {
            font-weight: bold;
            font-size: 20px;
            color: rgb(129, 11, 11);
        }

        .grid-item {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: 2;
            transition: transform 1s ease, width 1s ease, height 1s ease;
            position: absolute;
        }



        /* Estilos para dispositivos maiores que 768px */

        .position-1 {
            top: 2%;
            /* Ajuste conforme necessário */
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .position-2 {
            top: 50%;
            /* Ajuste conforme necessário */
            right: 15%;
            transform: translate(50%, -50%);
        }

        .position-3 {
            top: 96%;
            /* Ajuste conforme necessário */
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .position-4 {
            top: 50%;
            /* Posiciona no meio verticalmente */
            left: 15%;
            /* Posiciona no lado esquerdo */
            transform: translate(-50%, -50%);
            /* Centraliza o elemento horizontalmente */
        }
    }

    .grid-item.scaled {
        position: fixed;
        z-index: 9999;
        /* Garante que o item fique acima de todo o conteúdo */
    }

    .grid-item.scaled.position-2 {
        transform: translate(50%, -50%) scale(2);
        /* Transformação específica para position-2 */
    }

    .grid-item.scaled:not(.position-2) {
        transform: translate(-50%, -50%) scale(2);
        /* Transformação para todas as outras posições */
    }
</style>

<script>
    function toggleScale(event, element) {

        event.preventDefault(); // Previne o comportamento padrão do link
        element.classList.add('scaled');
        setTimeout(() => {
            window.location.href = element.href;
        }, 500);
    }
</script>
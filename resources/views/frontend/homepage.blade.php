@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="homepage-container">
    <div class="grid-container">
        @foreach ($menus as $index => $menu)
        <div class="grid-item position-{{ $index + 1 }}">
            <a href="{{ $lang . '/' . $menu->getTranslatedAttribute('slug', $lang) }}" class="menu-link">
                <div class="menu-content">
                    <img src="{{ asset('storage/' . $menu->icon_menu) }}" class="icon-menu" alt="">
                    <div class="menu-title">{{$menu->getTranslatedAttribute('title', $lang)}}</div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="dashed-circle"></div>
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
        width: 100%;
        height: 100%;
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
        width: 100%;
        height: 100%;
        position: relative;
    }

    .dashed-circle {
        grid-area: center;
        width: 1000px;
        height: 800px;
        border: 5px dashed #000;
        border-color: rgb(129, 11, 11);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    .grid-item {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        z-index: 2;
    }

    .menu-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .menu-title {
        font-weight: bold;
        font-size: 20px;
        color: rgb(129, 11, 11);
    }

    .menu-link {
        text-decoration: none;
        color: inherit;
    }

    .icon-menu {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }

    .position-1 {
        grid-area: top;
    }

    .position-2 {
        grid-area: right;
    }

    .position-3 {
        grid-area: bottom;
        margin-bottom: 10%;
    }

    .position-4 {
        grid-area: left;
    }

    /* Media Queries para Responsividade */
    @media (max-width: 1200px) {
        .dashed-circle {
            width: 750px;
            height: 600px;
        }

        .icon-menu {
            width: 40px;
            height: 40px;
        }

        .menu-title {
            font-size: 18px;
        }
    }

    @media (max-width: 768px) {
        .grid-container {
            grid-template-areas:
                "top"
                "right"
                "center"
                "left"
                "bottom";
            grid-template-columns: 1fr;
            grid-template-rows: auto;
        }

        .dashed-circle {
            width: 500px;
            height: 400px;
        }

        .icon-menu {
            width: 30px;
            height: 30px;
        }

        .menu-title {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .dashed-circle {
            width: 300px;
            height: 200px;
        }

        .icon-menu {
            width: 20px;
            height: 20px;
        }

        .menu-title {
            font-size: 14px;
        }
    }
</style>

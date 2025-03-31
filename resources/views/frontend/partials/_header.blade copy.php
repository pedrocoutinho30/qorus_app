<header>
    <div class="container">

        <div class="logo">
            <a href="/"><img src="{{ asset('img/transparent-logo.png') }}" alt="Logo"></a>
        </div>

        @foreach ($menus ?? '' as $index => $menu)
        <a href="{{ url($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) }}" class="menu-link">

            <div class="menu-content">
                <div class="menu-title">{{$menu->getTranslatedAttribute('title', $lang)}} </div>
            </div>
        </a>

        @if($index < count($menus ?? '') - 1)
            <span class="separator separator-pc">|</span>
            @endif
            @endforeach
            <div class="menu-container">
                <ul class="menu-lang">
                    <li><a href="@if($lang == 'pt') /pt/contactos @else /en/contacts @endif" class="lang-link font-menu" data-section="contactos">@if($lang == 'pt') Contatos @else Contacts @endif</a></li>
                    </li>
                    <li>
                        <a href="{{ route('change-language', ['lang' => 'pt', 'slug' => Request::segment(2) ?: 'home' ]) }}" class="lang-link font-menu">PT</a> <span class="separator" style="margin: 5px 5px !important;">|</span>
                        <a href="{{ route('change-language', ['lang' => 'en', 'slug' => Request::segment(2) ?: 'home']) }}" class="lang-link font-menu">EN</a>
                    </li>
                </ul>
                <!-- Criar aqui o menu hamburguer -->
                <div id="menu" class="menu">
                    <div id="menu-bar" onclick="menuOnClick()">
                        <div id="bar1" class="bar"></div>
                        <div id="bar2" class="bar"></div>
                        <div id="bar3" class="bar"></div>
                    </div>
                    <nav class="nav" id="nav">
                        <ul>
                            <li class="menu-lang-mobile">
                                <a href="{{ route('change-language', ['lang' => 'pt', 'slug' => Request::segment(2) ?: 'home' ]) }}" class="lang-link">PT</a> <span class="separator"> | </span>
                                <a href="{{ route('change-language', ['lang' => 'en', 'slug' => Request::segment(2) ?: 'home']) }}" class="lang-link">EN</a>
                            </li>
                            @foreach ($menus ?? '' ?? '' as $menu)
                            <li class="font-menu"><a href="{{ url($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) }}">
                                    {{ $menu->getTranslatedAttribute('title', $lang) }}
                                </a></li>
                            @endforeach
                            <li class="menu-lang-mobile"><a href="@if($lang == 'pt') /pt/contactos @else /en/contacts @endif" class="lang-link" data-section="contactos">@if($lang == 'pt') Contatos @else Contacts @endif</a></li>
                            </li>

                        </ul>

                    </nav>
                </div>
                <div class="menu-bg" id="menu-bg"></div>
            </div>
    </div>
</header>
@if(isset($page) && !empty($page))

<div class="red-bar">
    <div class="title">
        {!!$page->getTranslatedAttribute('title', $lang)!!}

    </div>
</div>
@endif
<style>
    .red-bar {
        width: 100vw;
        height: 6vh;
        /* Ajuste a altura conforme necessário */
        background-color: rgb(129, 11, 11);
        position: fixed;
        top: 9vh;
        z-index: 900;
        /* Certifique-se de que a barra fique acima de outros elementos */
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .title {
        padding-left: 20px;
        font-size: 1.5em;
        font-weight: bold;
        color: white;
    }

    header {
        background-color: #f4f4f4;
        padding: 10px 0;
        min-height: 8vh;
        max-height: 8vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 800;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 0;
    }

    .menu-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #333;
    
    }

    .menu-link {
        text-decoration: none;
        color: inherit;
        display: block;
        transition: transform 0.3s ease;
        /* Transição suave */
    }

    .menu-link:hover {
        transform: scale(1.1);
        /* Aumenta ligeiramente o tamanho */
    }

    .menu-title {
        font-weight: bold;
        font-size: 20px;
        color: #333;
        margin-right: 10px;
        margin-left: 10px;
    }

    .logo img {
        max-height: 150px;
    }



    .separator {
        margin: 10px 10px;
        padding-top: 4px;
        color: #333;
        font-size: 20px;
        text-decoration: none;
        font-weight: bold;
    }

    .menu-container {
        flex: 1;
        /* Faz com que o menu-container ocupe o restante espaço */
        display: flex;
        justify-content: flex-end;
        /* Alinha o menu à direita */
        align-items: center;
        z-index: 400;
    }



    /* Esconder a div em telas menores que 768px */
    @media (max-width: 768px) {
        .menu-lang-mobile {
            display: block;
        }

        .menu-lang {
            display: none;
        }

        .menu-link {
            display: none;
        }

        .menu {
            display: flex;
            z-index: 1000;
        }

        .separator-pc {
            display: none;
        }
    }

    /* Mostrar a div em telas maiores ou iguais a 768px */
    @media (min-width: 768px) {
        .menu-lang {
            margin-right: auto;
            /* Move o menu-lang para a esquerda */
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }


        .menu-lang-mobile {
            display: none;
        }

        .menu-link {
            display: flex;
        }

        .menu {
            display: none;
        }

        .separator-pc {
            display: flex;
        }
    }

    .menu-lang li {
        margin-right: 10vh;
    }

    .lang-link {
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    .font-menu {
        font-size: 20px;
    }

    #menu {
        z-index: 2000;
        position: absolute;
        top: 0;
        right: 0;
    }

    #menu-bar {
        width: 40px;
        height: 20px;
        margin: 25px;
        cursor: pointer;
    }

    .bar {
        height: 5px;
        width: 100%;
        background-color: rgb(129, 11, 11);
        display: block;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    #bar1 {
        transform: translateY(-4px);
    }

    #bar3 {
        transform: translateY(4px);
    }

    .nav {
        transition: 0.3s ease;
        display: none;
        text-align: right;
    }

    .nav ul {
        padding: 0 5px;
    }

    .nav li {
        list-style: none;
        padding: 10px 0;
    }

    .nav li a {
        color: white;
        font-size: 20px;
        text-decoration: none;
    }

    .nav li a:hover {
        font-weight: bold;
    }

    .menu-bg,
    #menu {
        top: 0;
        right: 0;
        position: absolute;
    }

    .menu-bg {
        z-index: 1;
        width: 0;
        height: 0;
        margin: 30px 20px 20px 0;
        background: radial-gradient(circle, rgb(129, 11, 11), rgb(129, 11, 11));
        border-radius: 55%;
        transition: 0.3s ease;
    }

    .change {
        display: block;
    }

    .change .bar {
        background-color: white;
    }

    .change #bar1 {
        transform: translateY(4px) rotateZ(45deg);
    }

    .change #bar2 {
        opacity: 0;
    }

    .change #bar3 {
        transform: translateY(-6px) rotateZ(-45deg);
    }

    .change-bg {
        width: 520px;
        height: 460px;
        transform: translate(40%, -30%);
    }

    .hidden {
        display: none;
    }
</style>
<script>
    function menuOnClick() {
        document.getElementById("menu-bar").classList.toggle("change");
        document.getElementById("nav").classList.toggle("change");
        document.getElementById("menu-bg").classList.toggle("change-bg");



    }
    document.addEventListener("DOMContentLoaded", () => {
        const hamburger = document.getElementById("menu-bar");
        const menuDrawer = document.getElementById("nav");
        const body = document.body;
        const titleElement = document.querySelector(".title");
        const redBar = document.querySelector(".red-bar");


        const menuLangElement = document.querySelector(".lang-link");


        hamburger.addEventListener("click", () => {
            const isOpen = menuDrawer.classList.toggle("open");
            hamburger.classList.toggle("open");
            body.classList.toggle("menu-open", isOpen);
            if (isOpen) {
                titleElement.classList.add("hidden");
                menuLangElement.classList.add("hidden");
            } else {
                titleElement.classList.remove("hidden");
                menuLangElement.classList.remove("hidden");
            }
        });
    });
</script>
</header>
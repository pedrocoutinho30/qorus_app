<header>
    <div class="container">
        <div class="header-section logo">
            <a href="/"><img src="{{ asset('img/Logo_Qorus.png') }}" alt="Logo"></a>
        </div>
        <div class="header-section menu">
            @foreach ($menus ?? '' as $index => $menu)
            <a href="{{ url($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) }}"
                class="menu-link {{ Request::is($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) ? 'active' : '' }}">
                <div class="menu-content">
                    @if($menu->getTranslatedAttribute('title', $lang) == 'Entre em contacto connosco!')
                    <div class="menu-title"> Contactos </div>
                    @elseif($menu->getTranslatedAttribute('title', $lang) == 'Contact us!')
                    <div class="menu-title"> Contacts </div>
                    @else
                    <div class="menu-title">{{$menu->getTranslatedAttribute('title', $lang)}} </div>
                    @endif
                </div>
            </a>
            @endforeach
            <div class="lang-items">
                @php
                // Remove o idioma atual do caminho
                $currentPath = Request::path();
                $currentPathWithoutLang = preg_replace('/^(pt|en)\//', '', $currentPath);
                @endphp

                <a href="{{ route('change-language', ['lang' => 'pt', 'slug' => $currentPathWithoutLang]) }}" class="lang-link">PT</a>
                <span style="margin: 5px 5px !important;">|</span>
                <a href="{{ route('change-language', ['lang' => 'en', 'slug' => $currentPathWithoutLang]) }}" class="lang-link">EN</a>
            </div>
        </div>

        <div class="header-section-mobile menu-mobile">
            <button id="hamburger-menu" class="hamburger-menu">
                ☰
            </button>
            <button id="close-menu" class="close-menu hidden">
                <span class="close-icon">×</span>
            </button>
            <div id="mobile-menu" class="mobile-menu hidden">
                <!-- Conteúdo do menu mobile será adicionado aqui futuramente -->
                <h2 class="mobile-menu-title">Menu</h2>
                @foreach ($menus ?? '' as $index => $menu)
                <ul class="mobile-menu-items">

                    @if($menu->getTranslatedAttribute('title', $lang) == 'Entre em contacto connosco!')
                    <li><a href="{{ url($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) }}" class="mobile-menu-link {{ Request::is($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) ? 'active' : '' }}">@if($lang == 'pt') Contatos @else Contacts @endif</a></li>

                    @else
                    <li><a href="{{ url($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) }}" class="mobile-menu-link {{ Request::is($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) ? 'active' : '' }}">{{$menu->getTranslatedAttribute('title', $lang)}}</a></li>

                    @endif

                </ul>
                @endforeach
                <div class="footer-wrapper-header-mobile">
                    @include('frontend.partials.footer', ['footerColor' => 'footer-black'])
                </div>
            </div>

        </div>
</header>

<style>
    header {
        
        background-color: white;
        /* Transparente no início */
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        /* Transição suave */
        padding: 10px 0;
        min-height: 6vh;
        max-height: 6vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 800;
        box-shadow: none;
        /* Sem sombra no início */
    }

    .footer-wrapper-header-mobile {
        position: absolute;
        bottom: 0;
        /* Posiciona o footer na parte inferior */
        left: 0;
        width: 100%;
        /* Garante que o footer ocupe toda a largura */
        text-align: center;
        /* Centraliza o texto */
        padding: 10px 0;
        /* Adiciona espaçamento vertical */
        background-color: rgb(248, 244, 238);
        /* Cor de fundo para combinar com o menu */
        font-size: 14px;
        color: #cacbcd;
        font-family: 'Aeonik-Medium', sans-serif;
    }

    header.scrolled {
        background-color: rgba(255, 255, 255, 0.85);
        /* Aumenta a transparência */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Adiciona uma sombra ao rolar */
        backdrop-filter: blur(7px);
        /* Adiciona o desfoque ao conteúdo por trás */
        -webkit-backdrop-filter: blur(7px);
        /* Suporte para navegadores baseados em WebKit */
    }

    header.scrolled .hamburger-menu,
    header.scrolled .close-menu {
        color: black;
        /* Cor do ícone quando o header está no estado "scrolled" */
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 0;
    }


    .header-section {
        display: flex;
        align-items: center;
        margin-right: 10vh;

    }

    .header-section.logo {
        justify-content: flex-start;
        /* Alinha o logo à esquerda */
        margin-left: 30px;
        flex: 1;
        /* Ocupa o espaço necessário */
    }

    .header-section.menu {
        justify-content: flex-end;
        /* Alinha os menus e idiomas à direita */
        flex: 2;
        /* Ocupa mais espaço para os menus */
    }

    .menu-link {
        position: relative;
        text-decoration: none;
        /* Remove o sublinhado padrão */
        color: black;
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 15px;
        margin-right: 10vh;

    }

    .menu-link:last-child {
        margin-right: 0;
        /* Remove a margem do último item */
    }

    .lang-items {
        color: #cacbcd !important;
        font-weight: 600;
        text-decoration: none;
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 15px;
        margin-right: 5vh;
    }

    .menu-link:visited {
        color: black;
        text-decoration: none;
        bottom: -3px;
        /* Garante que a cor não mude após o clique */
    }

    .menu-link.active::after {
        text-decoration: none;
        content: "";
        position: absolute;
        left: 0;
        bottom: -3px;
        width: 100%;
        height: 2px;
        background-color: black;
        /* Cor do sublinhado */
    }

    .lang-link {
        color: #cacbcd !important;
        text-decoration: none;
    }

    .lang-link:visited {
        color: #cacbcd !important;
        /* Garante que a cor permaneça cinza após o clique */
        text-decoration: none;

        /* Garante que a cor não mude após o clique */
    }

    .lang-link:hover {
        color: #cacbcd;
        /* Mantém a cor cinza ao passar o mouse */
        text-decoration: underline;
        /* Opcional: adiciona sublinhado ao passar o mouse */
    }

    .lang-link:active {
        color: #cacbcd !important;
        /* Garante que a cor permaneça cinza no estado ativo */
    }

    .menu-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -3px;
        width: 0;
        height: 2px;
        /* Espessura do sublinhado */
        background-color: black;
        /* Cor do sublinhado */
        transition: width 0.3s ease-in-out;
        /* Animação suave */
    }

    .menu-link:hover::after {
        width: 100%;
        /* Faz o sublinhado aparecer da esquerda para a direita */
    }

    .logo img {
        max-height: 4vh;
        width: auto;
        margin-left: 30px;
    }


    .hamburger-menu {
        background: none;
        border: none;
        font-size: 48px;
        cursor: pointer;
        margin-right: 10px;
        margin-bottom: 10px;
        color: black;

    }


    .mobile-menu {
        position: fixed;
        top: 8vh;
        /* Mantém o espaço do header visível */
        left: 0;
        width: 100%;
        height: calc(100% - 8vh);
        /* Ajusta a altura para não cobrir o header */
        background-color: rgb(248, 244, 238);
        z-index: 1000;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        transition: top 0.8s ease-in-out;
        padding-left: 20px;
        /* Transição suave para o movimento */

    }

    .mobile-menu.visible {
        top: 8vh;
        /* Alinha o menu logo abaixo do header */
    }

    .mobile-menu.hidden {
        top: -200%;
        /* Sai da tela novamente */
    }

    body.no-scroll {
        overflow: hidden;
    }


    .close-icon {
        background: none;
        border: none;
        font-size: 58px;
        cursor: pointer;
        margin-bottom: 10px;
        color: black;
        font-weight: 100;
    }

    .close-menu {
        background: none;
        /* Remove qualquer fundo */
        border: none;
        /* Remove bordas */
        font-size: 48px;
        cursor: pointer;
        position: absolute;
        top: 2px !important;
        right: 20px;
        z-index: 1100;
        /* Garante que o botão "X" fique acima do menu */
        color: black;
        /* Define a cor do "X" */
        box-shadow: none;
        /* Remove qualquer sombra */

        outline: none;
        /* Remove o contorno ao focar */

    }

    .close-menu:focus {
        outline: none;
        /* Remove o contorno ao focar no botão */
    }

    .close-menu.hidden {
        display: none;
    }

    body.no-scroll {
        overflow: hidden;
    }

    .hamburger-menu.hidden {
        display: none;
    }

    .mobile-menu-title {
        font-size: 40px;
        color: black;
        font-family: 'Aeonik-Regular', sans-serif;
        font-weight: 500;
        text-align: left;
        /* Alinha o título à esquerda */
        width: 100%;
        /* Garante que o título ocupe toda a largura */
        margin-left: 0;
        margin-top: -60px;
        margin-bottom: 75px;
        /* Remove margens extras */
    }

    .mobile-menu-items {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: left;
        width: 100%;
    }

    .mobile-menu-items li {
        margin-bottom: 40px;
    }

    .mobile-menu-link {
        text-decoration: none;
        font-size: 28px;
        color: black;
        font-family: 'Aeonik-Regular', sans-serif;
        transition: color 0.3s ease;
        position: relative;
        /* Necessário para o uso do ::after */
    }

    .mobile-menu-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        /* Ajuste a posição da linha */
        /* width: 0;
        height: 2px;
        /* Espessura da linha */
        background-color: black;
        /* Cor da linha */
        transition: width 0.3s ease;
        */
        /* Animação suave */
    }

    .mobile-menu-link.active::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0px;
        /* Ajuste a posição da linha */
        width: 100%;
        /* A linha cobre todo o texto */
        height: 2px;
        /* Espessura da linha */
        background-color: black;
        /* Cor da linha */
    }

    .mobile-menu-link:hover::after {
        width: 100%;
        /* Faz a linha aparecer da esquerda para a direita */
    }


    @media (min-width: 769px) {
        .header-section-mobile {
            display: none;
            /* Esconde o menu mobile em telas maiores */
        }

        .header-section.menu {
            display: flex;
            /* Exibe o menu normal em telas maiores */
        }

    }

    @media (max-width: 480px) {

        header {
            min-height: 8vh;
            max-height: 8vh;
        }

        .logo img {
            max-height: 3.1vh;
            width: auto;
            margin-left: 5px;
        }

        .header-section.menu {
            display: none;
        }


    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerMenu = document.getElementById('hamburger-menu');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const body = document.body;

        function toggleMenu(isMenuOpen) {
            if (isMenuOpen) {
                mobileMenu.classList.add('hidden');
                body.classList.remove('no-scroll');
                hamburgerMenu.classList.remove('hidden');
                closeMenu.classList.add('hidden');
            } else {
                mobileMenu.classList.remove('hidden');
                body.classList.add('no-scroll');
                hamburgerMenu.classList.add('hidden');
                closeMenu.classList.remove('hidden');
            }
        }

        hamburgerMenu.addEventListener('click', function() {
            toggleMenu(false);
        });

        closeMenu.addEventListener('click', function() {
            toggleMenu(true);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('header');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) { // Quando o scroll for maior que 50px
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    });
</script>
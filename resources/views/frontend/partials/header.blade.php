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
                    <div class="menu-title">@if($lang == 'pt') Contatos @else Contacts @endif</div>

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
</header>

<style>
    header {
        background-color: rgb(254, 254, 254);
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
        color: grey;
        text-decoration: none;
        font-family: 'Aeonik-Medium', sans-serif;
        font-size: 15px;
        margin-right: 5vh;
    }

    .menu-link:visited {
        color: black;
        /* Garante que a cor não mude após o clique */
    }

    .menu-link.active::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background-color: black;
        /* Cor do sublinhado */
    }

    .lang-link {
        text-decoration: none;
    }

    .lang-link:visited {
        color: grey;
        /* Garante que a cor não mude após o clique */
    }

    .menu-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
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
        max-height: 6vh;
        width: auto;
        margin-left: 30px;
    }
</style>


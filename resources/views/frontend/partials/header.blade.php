<header>
    <div class="container">

        <div class="logo">
            <a href="/"><img src="{{ asset('img/transparent-logo.png') }}" alt="Logo"></a>
        </div>
        <div class="menu-container">
            <ul class="menu-lang">
                <li><a href="@if($lang == 'pt') /pt/contactos @else /en/contacts @endif" class="lang-link" data-section="contactos">@if($lang == 'pt') Contatos @else Contacts @endif</a></li>
                </li>
                <li>
                    <a href="{{ route('change-language', ['lang' => 'pt', 'slug' => Request::segment(2) ?: 'home' ]) }}" class="lang-link">PT</a> |
                    <a href="{{ route('change-language', ['lang' => 'en', 'slug' => Request::segment(2) ?: 'home']) }}" class="lang-link">EN</a>
                </li>
            </ul>
            <!-- Criar aqui o menu hamburguer -->
            <div id="menu">
                <div id="menu-bar" onclick="menuOnClick()">
                    <div id="bar1" class="bar"></div>
                    <div id="bar2" class="bar"></div>
                    <div id="bar3" class="bar"></div>
                </div>
                <nav class="nav" id="nav">
                    <ul>
                        @foreach ($menus ?? '' as $menu)
                        <li><a href="{{ url($lang . '/' . ltrim($menu->getTranslatedAttribute('slug', $lang), '/')) }}">
                                {{ $menu->getTranslatedAttribute('title', $lang) }}
                            </a></li>
                        @endforeach
                        <li class="menu-lang-mobile"><a href="@if($lang == 'pt') /pt/contactos @else /en/contacts @endif" class="lang-link" data-section="contactos">@if($lang == 'pt') Contatos @else Contacts @endif</a></li>
                        </li>
                        <li class="menu-lang-mobile">
                            <a href="{{ route('change-language', ['lang' => 'pt', 'slug' => Request::segment(2) ?: 'home' ]) }}" class="lang-link">PT</a> |
                            <a href="{{ route('change-language', ['lang' => 'en', 'slug' => Request::segment(2) ?: 'home']) }}" class="lang-link">EN</a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="menu-bg" id="menu-bg"></div>
        </div>
    </div>

    <style>
        header {
            background-color: #f4f4f4;
            padding: 10px 0;
            min-height: 60px;
            max-height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0;
        }


        .logo img {
            max-height: 150px;
        }

        .separator {
            margin: 10px 10px;
            color: white;
            font-size: 20px;
            text-decoration: none;
        }

        .menu-container {
            flex: 1;
            /* Faz com que o menu-container ocupe o restante espaço */
            display: flex;
            justify-content: flex-end;
            /* Alinha o menu à direita */
            align-items: center;
            margin-bottom: 10px;
        }



        /* Esconder a div em telas menores que 768px */
        @media (max-width: 768px) {
            .menu-lang-mobile {
                display: block;
            }

            .menu-lang {
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
        }

        .menu-lang li {
            margin-right: 10vh;
        }

        .lang-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }


        #menu {
            z-index: 5000;
            position: absolute;
            top: 0;
            right: 0;
        }

        #menu-bar {
            width: 40px;
            height: 20px;
            margin: 30px 20px 10px 0;
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
            padding: 0 10px;
        }

        .nav li {
            list-style: none;
            padding: 12px 0;
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

            hamburger.addEventListener("click", () => {
                const isOpen = menuDrawer.classList.toggle("open");
                hamburger.classList.toggle("open");
                body.classList.toggle("menu-open", isOpen);
                if (isOpen) {
                    titleElement.classList.add("hidden");
                } else {
                    titleElement.classList.remove("hidden");
                }
            });
        });
    </script>
</header>
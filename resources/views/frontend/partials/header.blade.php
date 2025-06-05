<header class="fixed top-0 w-full z-50 bg-white bg-opacity-90 backdrop-blur-md shadow-sm min-h-[6vh] flex items-center px-6 md:px-12">
    <div class="container mx-auto flex items-center justify-between w-full">
        <!-- Logo -->
        <div>
            <a href="/">
                <img src="{{ asset('img/Logo_Qorus.png') }}" alt="Logo" class="min-h-[4vh] max-h-[4vh] md:h-10 object-contain">
            </a>
        </div>

        <!-- Menu Desktop -->
        <nav class="desktop-menu hidden space-x-12 items-center">
            @foreach ($menus ?? [] as $menu)
            @php
            $slug = ltrim($menu->getTranslatedAttribute('slug', $lang), '/');
            $url = url($lang . '/' . $slug);
            $title = $menu->getTranslatedAttribute('title', $lang);
            if( $title == "Entre em contacto connosco!"){
                $title = "Contactos";
            }
            @endphp
            @if($title !== "Sobre a Qorus" && $title !== "About Qorus")
            <a href="{{ $url }}" class="text-black font-medium text-base hover:underline">
                {{ $title }}
            </a>
            @endif
            @endforeach
            <!-- Language switch -->
            @php
            $currentPath = Request::path();
            $currentPathWithoutLang = preg_replace('/^(pt|en)\//', '', $currentPath);
            @endphp
            <div class="text-gray-400 font-semibold space-x-2">
                <a href="{{ route('change-language', ['lang' => 'pt', 'slug' => $currentPathWithoutLang]) }}" class="hover:text-gray-600 transition">PT</a>
                <span>|</span>
                <a href="{{ route('change-language', ['lang' => 'en', 'slug' => $currentPathWithoutLang]) }}" class="hover:text-gray-600 transition">EN</a>
            </div>
        </nav>

        <!-- Botão Hamburger mobile -->
        <button id="hamburger-btn" class="text-black text-3xl focus:outline-none">
            &#9776;
        </button>
    </div>
</header>

<!-- Menu mobile fullscreen -->
<div id="mobile-menu" class="hidden fixed inset-0 z-50  flex flex-col bg-[rgb(248,244,238)]">
    <!-- Header do menu mobile fixo no topo -->
    <div class="flex items-center justify-between px-6 py-4 h-[6vh] bg-white shadow-md">
        <a href="/" class="flex items-center">
            <img src="{{ asset('img/Logo_Qorus.png') }}" alt="Logo" class="h-10 object-contain">
        </a>
        <button id="close-btn" class="text-3xl font-bold focus:outline-none">&times;</button>
    </div>

    <h2 class="ml-6 mt-36 mb-16 text-[40px] font-medium text-black">Menu</h2>

    <!-- Menu mobile opções ocupando resto do ecrã -->
    <nav class="flex flex-col px-6 py-8 mt-8 overflow-auto" style="flex-grow:1;">
        @foreach ($menus ?? [] as $menu)
        @php
        $slug = ltrim($menu->getTranslatedAttribute('slug', $lang), '/');
        $url = url($lang . '/' . $slug);
        $title = $menu->getTranslatedAttribute('title', $lang);
        if( $title == "Entre em contacto connosco!"){
            $title = "Contactos";
        }
        @endphp
        @if($title !== "Sobre a Qorus" && $title !== "About Qorus")
        <a href="{{ $url }}" class="mb-10 text-[28px] font-medium font-aeonik text-black hover:underline">
            {{ $title }}
        </a>
        @endif
        @endforeach
        <div class="flex space-x-4 text-gray-400 font-semibold text-lg">
            <a href="{{ route('change-language', ['lang' => 'pt', 'slug' => $currentPathWithoutLang]) }}" class="hover:text-gray-600 transition">PT</a>
            <span>|</span>
            <a href="{{ route('change-language', ['lang' => 'en', 'slug' => $currentPathWithoutLang]) }}" class="hover:text-gray-600 transition">EN</a>
        </div>
    </nav>

    @include('frontend.partials.footer', ['footerColor' => 'footer-black'])
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const closeBtn = document.getElementById('close-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const body = document.body;

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            body.style.overflow = 'hidden'; // bloqueia scroll do fundo
        });

        closeBtn.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            body.style.overflow = 'auto'; // libera scroll do fundo
        });
    });
</script>

<style>
    /* Desktop a partir de 821px */
    @media (min-width: 821px) {
        #hamburger-btn {
            display: none !important;
        }
        #mobile-menu {
            display: none !important;
        }
        nav.desktop-menu {
            display: flex !important;
        }
    }

    /* Mobile até 820px */
    @media (max-width: 820px) {
        #hamburger-btn {
            display: block !important;
        }
        nav.desktop-menu {
            display: none !important;
        }
    }
</style>

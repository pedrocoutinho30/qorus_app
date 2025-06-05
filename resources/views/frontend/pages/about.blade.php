<div class="w-screen max-w-full bg-gradient-to-b from-[#f8f4ee] to-white">
    <div class="flex flex-col justify-start space-y-6 pt-[80px]  ml-16 mr-16">
        <div class="text-[42px] xs:text-[42px] sm:text-[42px] md:text-[42px] lg:text-[68px] xl:text-[68px] 2xl:text-[68px] font-medium text-black mt-[10%] md:block tracking-wide">
            {{$page->getTranslatedAttribute('title', $lang)}}
        </div>
        {{-- Mobile: texto limpo, sem tags --}}
        <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] mr-4 transition-opacity duration-[1500ms] ease-in-out fade-in excerpt text-black mt-[2%] tracking-normal">
            {!! strip_tags($page->getTranslatedAttribute('excerpt', $lang)) !!}
        </div>

        {{-- Desktop: conteúdo HTML --}}
        <div class="hidden md:block text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px]  transition-opacity duration-[1500ms] ease-in-out fade-in excerpt text-black mt-[2%] tracking-wider">
            {!! $page->getTranslatedAttribute('excerpt', $lang) !!}
        </div>

        <div class="relative w-[100%] mx-auto mr-5 mb-[15vh] mt-12">
            <img src="{{ asset('storage/' . $page->image_2) }}" alt="" class="w-full h-auto block">
        </div>
        {{-- Versão Mobile - texto sem tags HTML --}}
        <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] mr-5 transition-opacity duration-[1500ms] ease-in-out fade-in body-about text-gray-500 mt-2 tracking-normal">
            {!! strip_tags($page->getTranslatedAttribute('body', $lang)) !!}
        </div>

        {{-- Versão Desktop - texto com HTML --}}
        <div class="hidden md:block text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] transition-opacity duration-[1500ms] ease-in-out fade-in body-about text-gray-500 mt-2 tracking-wider">
            {!! $page->getTranslatedAttribute('body', $lang) !!}
        </div>

        <div class="relative w-[90%] mt-12 mb-[10vh]">
            <img src="{{ asset('storage/' . $page->image_1) }}" alt="" class="w-full h-auto block">
            <img src="{{ asset('img/Foguetao_Pagina02.svg') }}" alt="Foguetão"
                class="absolute ml-[10%] bottom-0 left-1/2 transform -translate-x-1/2 w-full h-auto z-[1] transition-all duration-[3000ms] ease-in-out overlay-image">
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            $('.hideme').each(function() {
                var bottom_of_object = $(this).position().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();

                if (bottom_of_window > bottom_of_object) {
                    $(this).addClass('visible');
                }
            });
        });

        $('.title').fadeIn('slow');
    });

    document.addEventListener('DOMContentLoaded', function() {
        const overlayImage = document.querySelector('.overlay-image');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                overlayImage.classList.add('scrolled');
            } else {
                overlayImage.classList.remove('scrolled');
            }
        });
    });
</script>

<style>
    .overlay-image.scrolled {
        bottom: -100px !important;
    }

    @media (max-width: 480px) {
        .overlay-image.scrolled {
            bottom: -20px !important;
        }
    }
</style>
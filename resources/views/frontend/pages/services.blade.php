@extends('frontend.layout')

@section('content')
<div class="w-screen max-w-full bg-gradient-to-b from-[#f8f4ee] to-white">
    <!-- Imagem topo -->
    <div class="relative w-full mt-20 md:-mt-16 mb-[20vh]">
        <img src="{{ asset('storage/' . $page->image_1) }}" alt="Imagem Desktop" class="hidden md:block w-full h-auto">
        <img src="{{ asset('storage/' . $page->image_1_mobile) }}" alt="Imagem Mobile" class="block md:hidden w-full h-auto">
        <img src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" alt="Foguetão"
            class="absolute right-8 top-full md:w-2/5 w-3/5 transform -translate-y-1/2 transition-all duration-700 ease-in-out overlay-image-top" />
    </div>

    <div class="flex flex-col justify-start space-y-6 pt-[80px]  ml-16 mr-16 ">

        <!-- Título -->
        <div class="text-[42px] xs:text-[42px] sm:text-[42px] md:text-[42px] lg:text-[68px] xl:text-[68px] 2xl:text-[68px] font-medium text-black mt-[10%] md:block tracking-wide">
            {{$page->getTranslatedAttribute('title', $lang)}}
        </div>

        <!-- Conteúdo dos serviços -->
        <div class="flex flex-col gap-8 px-5 mt-10 md:mt-[10%]">

            @foreach($otherTexts as $otherText)
            <hr class="border-t-2 border-black mb-3 mt-6 w-full" />

            <article class="flex flex-col xl:flex-row xl:items-start gap-4">
                {{-- Título --}}
                <h2 class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl md:w-[500px] mt-2 md:mt-0 tracking-wider">
                    {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                </h2>

                {{-- Texto (Mobile: visível, Desktop: oculto) --}}
                <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed max-w-full tracking-normal hideme">
                    {{-- Texto sem tags HTML --}}
                    {!!strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                </div>

                {{-- Texto (Desktop) --}}
                <div class="hidden md:block w-full ml-16 sm:ml-0 mr-16 md:mr-0  text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed tracking-wider">
                    {!! strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                </div>
            </article>
            @endforeach

        </div>
    </div>

    <!-- Imagem inferior -->
    <div class="relative w-full mt-[30vh]  mb-0">
        <img src="{{ asset('storage/' . $page->image_2) }}" alt="Imagem Desktop" class="hidden md:block w-full h-auto">
        <img src="{{ asset('storage/' . $page->image_2_mobile) }}" alt="Imagem Mobile" class="block md:hidden w-full h-auto">
        <img src="{{ asset('img/Foguetao_Pagina03_02.svg') }}" alt="Foguetão"
            class="absolute left-6 top-[10%] md:w-2/5 w-3/5 transform -translate-y-1/2 transition-all duration-700 ease-in-out overlay-image-bottom" />
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Animação de opacidade para fade in */
    .hideme {
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    .hideme.visible {
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(window).on('scroll load', function() {
        $('.hideme').each(function() {
            const bottom_of_object = $(this).offset().top + $(this).outerHeight();
            const bottom_of_window = $(window).scrollTop() + $(window).height() + 100;

            if (bottom_of_window > bottom_of_object) {
                $(this).addClass('visible');
            }
        });

        // Animação das imagens sobrepostas
        ['.overlay-image-top', '.overlay-image-bottom'].forEach(selector => {
            const el = document.querySelector(selector);
            if (!el) return;
            const pos = el.getBoundingClientRect().top;
            if (pos <= window.innerHeight) {
                el.classList.add('scrolled');
            } else {
                el.classList.remove('scrolled');
            }
        });
    });
</script>
<style>
    /* Transições customizadas para imagens sobrepostas */
    .overlay-image-top {
        top: 100%;
        right: 8%;
        z-index: 10;
    }

    .overlay-image-top.scrolled {
        top: 108%;
    }

    .overlay-image-bottom {
        top: 10%;
        left: 6%;
        z-index: 10;
    }

    .overlay-image-bottom.scrolled {
        top: 23%;
    }

    /* Mobile overrides */
    @media (max-width: 480px) {
        .overlay-image-top {
            top: 110% !important;
            right: 5% !important;
            width: 60% !important;
        }

        .overlay-image-top.scrolled {
            top: 128% !important;
        }
    }
</style>
@endpush
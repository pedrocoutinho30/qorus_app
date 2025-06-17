@extends('frontend.layout')

@section('content')
<div class="w-screen max-w-full bg-gradient-to-b from-[#f8f4ee] to-white ">
    <div class="flex flex-col justify-start space-y-6 pt-[80px] mb-[10vh] ml-16 mr-16">
        <div class="text-[28px] xs:text-[32px] sm:text-[42px] md:text-[42px] lg:text-[68px] xl:text-[68px] 2xl:text-[68px] font-medium text-black mt-[10%] md:block tracking-wide">
            {!!$page->getTranslatedAttribute('excerpt', $lang)!!}
        </div>

        {{-- Versão Mobile - texto sem tags HTML --}}
        <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] mr-5 transition-opacity duration-[1500ms] ease-in-out fade-in body-about text-gray-500 mt-2   ">
            {!! strip_tags($page->getTranslatedAttribute('body', $lang)) !!}
        </div>

        {{-- Versão Desktop - texto com HTML --}}
        <div class="hidden md:block text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] transition-opacity duration-[1500ms] ease-in-out fade-in body-about text-gray-500 mt-2  ">
            {!! $page->getTranslatedAttribute('body', $lang) !!}
        </div>
    </div>
    <div class="relative w-full  md:mt-16">
        <img src="{{ asset('storage/' . $page->image_1) }}" alt="Imagem Desktop" class="hidden md:block w-full h-auto">
        <img src="{{ asset('storage/' . $page->image_1_mobile) }}" alt="Imagem Mobile" class="block md:hidden w-full h-auto">
        <!-- <img src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" alt="Foguetão"
            class="absolute right-8 top-full md:w-2/5 w-3/5 transform -translate-y-1/2 transition-all" />
            -->
        <img
            src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" loading="lazy"
            alt="Foguetão"
            class="absolute right-8 top-full md:w-2/5 w-3/5 md:hidden rocket-rise"
            style="--start-top: -10%; --end-top: 50.5%;" />

        <img
            src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" loading="lazy"
            alt="Foguetão"
            class="absolute right-8 top-full md:w-2/5 w-3/5 hidden md:block rocket-rise"
            style="--start-top: 10%; --end-top: 54.5%;" />
    </div>

    <div class="flex flex-col justify-start space-y-6 pt-[80px] px-6 sm:px-16 md:px-24 lg:px-24 xl:px-24  bg-[rgb(186,186,186)]">
        <!-- Conteúdo dos serviços -->
        <div class="flex flex-col gap-8 px-5 mt-10 md:mt-[10%] mb-[5vh]">

            @foreach($otherTexts as $otherText)
            @if($otherText->getTranslatedAttribute('title', $lang) == 'Práticas<br>Sustentáveis' || $otherText->getTranslatedAttribute('title', $lang) == 'Sustainable<br>Practices')
            <article class="flex flex-col xl:flex-row xl:items-start gap-bg-gray-1004 mt-[10%] pt-1">
                {{-- Título --}}
                <h2 class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl md:w-[500px]  ">
                    {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                </h2>

            </article>
            @else
            <hr class="border-t-2 border-black mb-3 mt-6 w-full" />

            <article class="flex flex-col xl:flex-row xl:items-start gap-4">
                {{-- Título --}}
                <div class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl md:w-[500px] mt-2 md:mt-0  ">
                    <div class="flex flex-col">
                        <span class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl   ">
                            {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                        </span>
                        <img src="{{ asset('storage/' . $otherText->icon) }}" alt="Imagem" class="mt-8 ml-[6%] xs:ml-[6%] sm:ml-[6%] md:ml-[8%] lg:ml-[10%] xl:ml-[20%] w-[17%] sm:w-[15%] md:w-[17%] lg:w-[20%] xl:w-[20%] h-auto" />

                    </div>
                </div>

                {{-- Texto (Mobile: visível, Desktop: oculto) --}}
                <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed max-w-full    ">
                    {{-- Texto sem tags HTML --}}
                    {!!strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                </div>

                {{-- Texto (Desktop) --}}
                <div class="hidden md:block w-full ml-16 sm:ml-0 mr-16 md:mr-0  text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed  ">
                    {!! strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                </div>
            </article>
            @endif
            @endforeach

        </div>
    </div>
</div>
</div>
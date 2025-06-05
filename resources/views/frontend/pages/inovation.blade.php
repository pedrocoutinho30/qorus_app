@extends('frontend.layout')

@section('content')
<div class="w-screen max-w-full bg-gradient-to-b from-[#f8f4ee] to-white">
    <div class="flex flex-col justify-start space-y-6 pt-[80px]  mb-[10vh] ml-16 mr-16 ">
        <div class="text-[42px] xs:text-[42px] sm:text-[42px] md:text-[42px] lg:text-[68px] xl:text-[68px] 2xl:text-[68px] font-medium text-black mt-[10%] md:block tracking-wide">
            {!!$page->getTranslatedAttribute('excerpt', $lang)!!}
        </div>

        {{-- Versão Mobile - texto sem tags HTML --}}
        <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] mr-5 transition-opacity duration-[1500ms] ease-in-out fade-in body-about text-gray-500 mt-2 tracking-normal">
            {!! strip_tags($page->getTranslatedAttribute('body', $lang)) !!}
        </div>

        {{-- Versão Desktop - texto com HTML --}}
        <div class="hidden md:block text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] transition-opacity duration-[1500ms] ease-in-out fade-in body-about text-gray-500 mt-2 tracking-wider">
            {!! $page->getTranslatedAttribute('body', $lang) !!}
        </div>
    </div>
    <div class="relative w-full  md:-mt-16">
        <img src="{{ asset('storage/' . $page->image_1) }}" alt="Imagem Desktop" class="hidden md:block w-full h-auto">
        <img src="{{ asset('storage/' . $page->image_1_mobile) }}" alt="Imagem Mobile" class="block md:hidden w-full h-auto">
        <img src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" alt="Foguetão"
            class="absolute right-8 top-full md:w-2/5 w-3/5 transform -translate-y-1/2 transition-all duration-700 ease-in-out overlay-image-top" />
    </div>

    <div class="flex flex-col justify-start space-y-6 pt-[80px]  bg-[rgb(186,186,186)]">

        <div class="flex flex-col justify-start space-y-6 pt-[80px]  ml-16 mr-16 ">


            <!-- Conteúdo dos serviços -->
            <div class="flex flex-col gap-8 px-5 mt-10 md:mt-[10%]">

                @foreach($otherTexts as $otherText)
                @if($otherText->getTranslatedAttribute('title', $lang) == 'Práticas<br>Sustentáveis')
                <article class="flex flex-col xl:flex-row xl:items-start gap-bg-gray-1004 mt-[10%] pt-1">
                    {{-- Título --}}
                    <h2 class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl md:w-[500px] tracking-wider">
                        {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                    </h2>

                </article>
                @else
                <hr class="border-t-2 border-black mb-3 mt-6 w-full" />

                <article class="flex flex-col xl:flex-row xl:items-start gap-4">
                    {{-- Título --}}
                    <div class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl md:w-[500px] mt-2 md:mt-0 tracking-wider">
                        <div class="flex flex-col">
                            <span class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl tracking-wider text-center">
                                {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                            </span>
                            <img src="{{ asset('storage/' . $otherText->icon) }}" alt="Imagem" class="w-[6px] h-auto mt-8" style="width:15% !important; max-width:100px !important;" />
                        </div>
                    </div>

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
                @endif
                @endforeach

            </div>
        </div>


        <!-- <div class="flex flex-col justify-start space-y-6 pt-[80px]  ml-16 mr-16"> -->

        <!-- @foreach($otherTexts as $otherText)

            @if($otherText->getTranslatedAttribute('title', $lang) == 'Práticas<br>Sustentáveis')
            <article class="flex flex-col xl:flex-row xl:items-start gap-bg-gray-1004 mt-[10%] pt-1">
                {{-- Título --}}
                <h2 class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl md:w-[500px] tracking-wider">
                    {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                </h2>

            </article>
            @else
            <hr class="border-t-2 border-black mb-3 mt-6 w-full" />
            <article class="flex flex-col xl:flex-row xl:items-start gap-4">
                <div class="w-[500px] text-left mr-16 sm:mr-0">
                    <div class="flex flex-col items-center">
                        <span class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl tracking-wider text-center">
                            {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                        </span>
                        <img src="{{ asset('storage/' . $otherText->icon) }}" alt="Imagem" class="w-[50px] h-auto mt-8" />
                    </div>
                </div>

                <div class="flex-1 flex flex-col justify-center">
                    {{-- Texto (Mobile: visível, Desktop: oculto) --}}
                    <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed max-w-full tracking-normal hideme">
                        {!! strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                    </div>
                    {{-- Texto (Desktop) --}}
                    <div class="hidden md:block w-full ml-0 text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed tracking-wider">
                        {!! strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                    </div>
                </div>
            </article>
            @endif
            @endforeach -->

        <!-- </div> -->
    </div>
</div>
@extends('frontend.layout')

@section('content')
<div class="w-screen max-w-full bg-gradient-to-b from-[#f8f4ee] to-white">
    <!-- Imagem topo -->
    <div class="relative w-full  mb-[20vh]">
        <img src="{{ asset('storage/' . $page->image_1) }}" alt="Imagem Desktop" loading="lazy" class="hidden md:block w-full h-auto">
        <img src="{{ asset('storage/' . $page->image_1_mobile) }}" alt="Imagem Mobile" loading="lazy" class="block md:hidden w-full h-auto">
        <!-- <img src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" alt="Foguetão"
            class="absolute right-8 top-full md:w-2/5 w-3/5 transform -translate-y-1/2 transition-all rocket-rise" /> -->
        <img
            src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" loading="lazy"
            alt="Foguetão"
            class="absolute right-8 md:w-2/5 w-3/5 md:hidden rocket-rise"
            style="--start-top: 150%; --end-top: 50.5%;" />

        <img
            src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" loading="lazy"
            alt="Foguetão"
            class="absolute right-8 md:w-2/5 w-3/5 hidden md:block rocket-rise"
            style="--start-top: 150%; --end-top: 64.5%;" />
    </div>

    <div class="flex flex-col justify-start space-y-6 pt-[80px] px-6 sm:px-16 md:px-24 lg:px-24 xl:px-24 mb-[10vh]">

        <!-- Título -->
        <div class="text-[42px] xs:text-[42px] sm:text-[42px] md:text-[42px] lg:text-[68px] xl:text-[68px] 2xl:text-[68px] font-medium text-black mt-[10%] md:block    ">
            {{$page->getTranslatedAttribute('title', $lang)}}
        </div>

        <!-- Conteúdo dos serviços -->
        <div class="flex flex-col gap-8 mt-10 md:mt-[10%]">

            @foreach($otherTexts as $otherText)
            <hr class="border-t-2 border-black mb-3 mt-6 w-full" />

            <article class="flex flex-col xl:flex-row xl:items-start gap-4">
                {{-- Título --}}
                <h2 class="font-semibold text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] md:text-4xl md:w-[500px] mt-2 md:mt-0  ">
                    {!! $otherText->getTranslatedAttribute('title', $lang) !!}
                </h2>

                {{-- Texto (Mobile: visível, Desktop: oculto) --}}
                <div class="block md:hidden text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed max-w-full    ">
                    {{-- Texto sem tags HTML --}}
                    {!!strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                </div>

                {{-- Texto (Desktop) --}}
                <div class="hidden md:block w-full  text-[20px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] leading-relaxed  ">
                    {!! strip_tags($otherText->getTranslatedAttribute('text', $lang)) !!}
                </div>
            </article>
            @endforeach

        </div>
    </div>

    <!-- Imagem inferior -->
    <div class="relative w-full mt-[30vh]  mb-0">
        <img src="{{ asset('storage/' . $page->image_2) }}" alt="Imagem Desktop" class="hidden md:block w-full h-auto">
        <img src="{{ asset('storage/' . $page->image_2_mobile) }}" alt="Imagem Mobile" loading="lazy" class="block md:hidden w-full h-auto">
        <!-- <img src="{{ asset('img/Foguetao_Pagina03_02.svg') }}" alt="Foguetão" loading="lazy"
            class="absolute left-6 top-[10%] md:w-2/5 w-3/5 transform -translate-y-1/2 transition-all rocket-rise" /> -->

        <img
            src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" loading="lazy"
            alt="Foguetão"
            class="absolute left-6 top-[10%] md:w-2/5 w-3/5 md:hidden rocket-rise"
            style="--start-top: 10%; --end-top: -15%;" />

        <img
            src="{{ asset('img/Foguetao_Pagina03_01.svg') }}" loading="lazy"
            alt="Foguetão"
            class="absolute left-6 top-[10%] md:w-2/5 w-3/5 hidden md:block rocket-rise"
            style="--start-top: 10%; --end-top: -10%;" />
    </div>
</div>
@endsection

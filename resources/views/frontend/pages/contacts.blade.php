@extends('frontend.layout')

@section('content')
<div class="w-screen max-w-full bg-gradient-to-b from-[#f8f4ee] to-white ">
    @if(session('success'))
    <div id="success-alert" class="fixed top-12 right-5 z-50 bg-green-100 text-green-800 border border-green-300 rounded px-4 py-3 text-sm shadow animate-fadeIn">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div id="error-alert" class="fixed top-12 right-5 z-50 bg-red-100 text-red-800 border border-red-300 rounded px-4 py-3 text-sm shadow animate-fadeIn">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="relative flex flex-col justify-start space-y-6  px-6 sm:px-16 md:px-24 lg:px-24 xl:px-24  mb-[8vh] ">


        <!-- Imagem à direita (absoluta) -->
        <div class="absolute top-[30%] right-10 w-[30%] xs:w-[30%] sm:w-[25%] md:w-[33%] lg:w-[30%] xl:w-[25%] pt-[13%] sm:pt-[23%] md:pt-[13%] lg:pt-[13%] xl:pt-[13%] px-6 sm:px-16 md:px-28 lg:px-24 xl:px-24 transition-all  md:block">
            <!-- Mobile -->

            <img
                src="{{ asset('img/Foguetao_Pagina05.svg') }}" loading="lazy"
                alt="Foguetão"
                class="md:hidden rocket-rise"
                style="--start-top: 10%; --end-top: -65.5%;" />

            <!-- Desktop -->
            <img
                src="{{ asset('img/Foguetao_Pagina05.svg') }}" loading="lazy"
                alt="Foguetão"
                class=" hidden md:block rocket-rise"
                style="--start-top: 150%; --end-top: -54%;" />
        </div>

        <!-- Título -->
        @if( $page->getTranslatedAttribute('title', $lang) == 'Contact us!')
        <br>
        <br>
        @endif
        <div class="text-black text-4xl md:text-7xl pt-[50%] sm:pt-[25%] md:pt-[35%] lg:pt-[20%] xl:pt-[20%] font-medium tracking-wide">
            {!! $page->getTranslatedAttribute('body', $lang) !!}
        </div>

        <!-- Linha -->
        <hr class="border-t-2 border-black w-full my-12" />
    </div>
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between w-full gap-10 text-black text-lg md:text-2xl mb-[12%] space-y-6  px-6 sm:px-16 md:px-24 lg:px-24 xl:px-24">

        <!-- Excerpt -->
        <div class="flex-1">
            <a href="https://www.google.com/maps/search/?api=1&query=Rua da Estrada, 915 4950-006 Abade de Neiva Barcelos" target="_blank" class="hover:underline">
                {!! $page->getTranslatedAttribute('excerpt', $lang) !!}
            </a>
        </div>


        <!-- Detalhes de contacto -->
        <div class="flex flex-col md:mr-[20%]">
            <a href="mailto:{{ ($otherTexts[0]->getTranslatedAttribute('text', $lang)) }}" class="hover:underline">
                {!! $otherTexts[0]->getTranslatedAttribute('text', $lang) !!}
            </a>
            <span>{!! $otherTexts[1]->getTranslatedAttribute('text', $lang) !!}</span>
        </div>
    </div>

    @include('frontend.pages.form')



</div>
<div class="relative w-full ">
    <a href="https://www.google.com/maps/search/?api=1&query=Rua da Estrada, 915 4950-006 Abade de Neiva Barcelos" target="_blank" class="hover:underline">
        <img src="{{asset('storage/'.$page->image_1_mobile)}}" alt="" class="block md:hidden w-full h-auto">
        <img src="{{asset('storage/'.$page->image_1)}}" alt="" class="hidden md:block w-full h-auto">
</div>
@endsection
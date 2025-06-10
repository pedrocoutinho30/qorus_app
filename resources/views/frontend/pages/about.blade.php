<div class="w-screen max-w-full bg-gradient-to-b from-[#f8f4ee] to-white ">
    <div class="flex flex-col justify-start space-y-6 pt-[80px]  ml-16 mr-16 mb-[10vh]">
        {{-- Título --}}
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
                class="absolute ml-[10%] bottom-[-20px] sm:bottom-[-20px] md:bottom-[-100px] lg:bottom-[-100px] xl:bottom-[-100px] 2xl:bottom-[-100px] left-1/2 transform -translate-x-1/2 w-full h-auto z-[1]" />
        </div>
    </div>
</div>
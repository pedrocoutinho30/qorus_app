@extends('frontend.layout')

@section('content')
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

<div class="w-full max-w-full pt-24 bg-gradient-to-b from-[#f8f4ee] to-white">
    <div class="relative">
        <div class="absolute right-10 top-[30%] w-[300px] -translate-y-1/2 transition-all duration-1000 ease-in-out image-contacts-up">
            <img src="{{ asset('img/Foguetao_Pagina05.svg') }}" alt="Foguetão" />
        </div>

        <div class="text-black font-medium text-[72px] mt-[15%] ml-[5%]   ">
            {!! $page->getTranslatedAttribute('body', $lang) !!}
        </div>

        <hr class="my-10 mx-[5%] border-t-2 border-black" />

        <div class="flex flex-col md:flex-row items-start justify-center gap-10 text-black text-[30px] mx-[6%] mb-[12%] font-regular">
            <div class="flex-1 leading-tight">
                {!! $page->getTranslatedAttribute('excerpt', $lang) !!}
            </div>
            <div class="flex flex-col gap-3 mr-[30%]">
                <span>{!! $otherTexts[0]->getTranslatedAttribute('text', $lang) !!}</span>
                <span>{!! $otherTexts[1]->getTranslatedAttribute('text', $lang) !!}</span>
            </div>
        </div>
    </div>

    @include('frontend.pages.form')

    <div class="relative w-full">
        <img src="{{ asset('storage/'.$page->image_1) }}" alt="" class="w-full h-auto block">
    </div>

</div>
@endsection

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-in-out;
    }

    .image-contacts-up.scrolled {
        top: 40% !important;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successAlert = document.getElementById("success-alert");
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.opacity = "0";
                setTimeout(() => successAlert.remove(), 500);
            }, 5000);
        }

        const overlayImageTop = document.querySelector('.image-contacts-up');

        window.addEventListener('scroll', function () {
            const imagePosition = overlayImageTop.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (imagePosition <= windowHeight) {
                overlayImageTop.classList.add('scrolled');
            } else {
                overlayImageTop.classList.remove('scrolled');
            }
        });
    });
</script>

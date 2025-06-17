@extends('frontend.layout')

@section('content')
<div
    class="w-screen"
    style="
    height: 100vh;
    background-image: url('{{ asset('storage/' . $page->image_1) }}');
    background-size: cover;
    background-position: center;background-repeat: no-repeat;">
   <div
    class="absolute z-20 text-white opacity-0 text-[32px] sm:text-[42px] md:text-[52px] lg:text-[72px] xl:text-[76px] 2xl:text-[72px] "
    style="top: 55%; left: 60px; transform: translateY(-50%); animation: fadeIn 3s forwards;">
    {!! $page->getTranslatedAttribute('title', $lang) !!}
</div>


</div>
@include('frontend.pages.about', ['page' => $aboutPage, 'lang' => $lang])

@endsection
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
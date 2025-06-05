<footer class="{{ $footerColor ?? 'footer-white' }} {{ $footerStyle ?? '' }} w-full z-[100] text-left py-[10vh] pb-[5vh]">
    <div class="mx-auto h-[2px] w-[calc(100%-18.5vh)] bg-white footer-line"></div>
    <div class="mt-[5px] ml-[9vh] text-[14px] font-[Aeonik-Regular] text-white footer-text">
        2025 © Qorus Group
    </div>
</footer>

@push('styles')
<style>
    .footer-white .footer-line {
        background-color: white;
    }

    .footer-white .footer-text {
        color: white;
    }

    .footer-black .footer-line {
        background-color: black;
    }

    .footer-black .footer-text {
        color: black;
    }

    @media (max-width: 768px) {
        .footer-line {
            width: calc(100% - 10vh);
            margin-left: 5vh;
            margin-right: 5vh;
        }

        .footer-text {
            margin-left: 5vh;
        }
    }
</style>
@endpush

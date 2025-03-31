@extends('frontend.layout') <!-- Estendendo o layout principal -->




@section('content')
<div class="container">

    <!-- Carrega a seção dinâmica -->
    <div class="section-content">
        <div class="red-bar">
            <div class="title">
                @if($lang == 'pt') Contatos @else Contacts @endif
            </div>
        </div>
        <div class="section">

            <div class="contacts-container">
                <img src="{{ Voyager::image(setting('site.maps')) }}" alt="mapa" class="image-map">
                <div class="contacts-info">

                    {!! Voyager::setting('site.local') !!}




                    <div class="contact-icons">

                        <div class="phone">
                            <a href="tel:+351967446095" title="Ligar">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="24" height="24">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.14A19.51 19.51 0 0 1 3.11 9.8 19.86 19.86 0 0 1 0 1.37 2 2 0 0 1 2 0h3a2 2 0 0 1 2 1.72 12.44 12.44 0 0 0 .66 2.83 2 2 0 0 1-.45 2.11L5.91 8a16 16 0 0 0 6.09 6.09l1.32-1.32a2 2 0 0 1 2.11-.45 12.44 12.44 0 0 0 2.83.66A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                                {{ Voyager::setting('site.phone') }}
                            </a>
                        </div>
                        <div class="email">
                            <a href="mailto:info@gorusgroup.com" title="Enviar E-mail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M22 6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h20z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                {{ Voyager::setting('site.email') }}
                            </a>
                        </div>
                    </div>
                    <div class="social-media">
                        <a href="https://www.instagram.com/qorus_group/" target="_blank" rel="noopener noreferrer" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37a4 4 0 1 1-4.73-4.73"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection

<style>
    .container {
        display: flex;
        justify-content: space-between;
        padding: 0;
    }

    .social-media {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    .phone{
        margin-bottom: 10px;
    }
    .email{
        margin-bottom: 10px;
        text-decoration: none;
    }

    .section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        background: url('{{ asset("img/background.png") }}') no-repeat center center;
        background-size: cover;
        background-position: center;
        width: 100vw;
        height: 100vh;
        z-index: 1;
    }

    .section-content {
        width: 100%;
        margin: 0 auto;
        padding: 0;
        box-sizing: border-box;

    }

    .contacts-container {
        display: flex;
        align-items: flex-start;
    }

    .image-map {
        width: 50%;
        height: auto;
        margin-left: 10px;
        margin-right: 20px;

        filter: grayscale(100%);
    }

    .contacts-info {
        background-color: rgba(255, 255, 255, 0.8);
        height: 25vh;
        width: 10vw;
        padding: 20px;
        flex: 1;
    }

    .section-content .container {
        max-width: 100vw;
        margin: 0 auto;
        padding: 0 20px;
    }

    .red-bar {
        width: 100vw;
        height: 6vh;
        /* Ajuste a altura conforme necessário */
        background-color: rgb(129, 11, 11);
        position: sticky;
        top: 0;
        z-index: 100;
        /* Certifique-se de que a barra fique acima de outros elementos */
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .title {
        padding-left: 20px;
        font-size: 1.5em;
        font-weight: bold;
        color: white;
    }
</style>
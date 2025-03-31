<div class="section-content">

    <div class="image-container ">
        <img src="{{ asset('storage/' . $page->image_1) }}"
            class="@if($page->image_1_color == 0) grayscale @endif image"
            alt="Imagem 1">
        <div class="opacity-layer"></div>
    </div>

    <div class="description">
        {!!$page->getTranslatedAttribute('excerpt', $lang)!!}
    </div>

    <div class="complementary">
        {!!$page->getTranslatedAttribute('body', $lang)!!}
    </div>

    <div class="image @if($page->image_2_opacity == 1) opacity @endif">
        <img src=" {{ asset('storage/' . $page->image_2) }}"
            class="@if($page->image_2_color == 0) grayscale @endif"
            alt="Imagem 2">
    </div>
    <!-- Botão para voltar à homepage -->
    <div class="back-to-home">
        <a href="/{{$lang}}" class="btn-home">
            <i class="fa fa-angle-left"></i>
            @if($lang == 'pt') Voltar ao início @else Back @endif</a></a>
    </div>
    <i class="fa-duotone fa-light fa-angles-left"></i>
</div>
<style>
    .back-to-home {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    .btn-home {
        display: inline-block;
        padding: 10px 20px;
        border: 2px solid rgb(129, 11, 11);
        /* Borda cinzenta */
        color: rgb(129, 11, 11);
        /* Texto cinzento */
        background-color: white;
        /* Fundo transparente */
        text-decoration: none;
        border-radius: 25px;
        /* Borda arredondada */
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-home:hover {
        background-color: rgb(129, 11, 11);
        color: #fff
    }

    .section-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-top: 7vh;
        /* Ensure the section-content takes the full viewport height */
    }

    .image-container {
        position: relative;
        margin-top: 10px;
        /* Altura da imagem */
        overflow: hidden;
    }

    .image {
        width: 100vw;
        height: 50vh;
        object-fit: cover;
    }

    .image img {
        width: 100vw;
        height: 50vh;
        object-fit: cover;
    }

    .grayscale {
        filter: grayscale(100%);
    }

    .opacity-layer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 0;
        /* Inicialmente sem cobertura */
        background-color: rgba(109, 25, 25, 0.5);
        /* Cor da opacidade (preto com 50%) */
        pointer-events: none;
        content: '';
    }

    .opacity::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(109, 25, 25, 0.5);
        pointer-events: none;
        text-align: justify;
    }
    .description {
        margin-bottom: 3%;
        margin-top: 1%;
        margin-left: 5%;
        margin-right: 5%;
        flex: 1;
        padding: 20px;
        color: black;
        font-size: 22px;
        text-align: left;
    }

    .complementary {
        margin-bottom: 3%;
        margin-top: 1%;
        margin-left: 5%;
        margin-right: 5%;
        flex: 1;
        padding: 20px;
        color: black;
        font-size: 22px;
        text-align: left;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {


        // const imageContainer = document.querySelector('.image-container');
        // const opacityLayer = document.querySelector('.opacity-layer');

        // // Atualiza a altura da opacidade com base no scroll
        // window.addEventListener('scroll', () => {
        //     const containerTop = imageContainer.getBoundingClientRect().top;
        //     const containerHeight = imageContainer.offsetHeight;
        //     console.log(containerTop, containerHeight);
        //     // Calcula quanto da imagem está visível
        //     if (containerTop < window.innerHeight && containerTop + containerHeight > 0) {

        //         const scrollPosition = Math.max(0, window.innerHeight - containerTop);
        //         const opacityHeight = scrollPosition - containerHeight - 250; // Math.min(containerHeight, scrollPosition);

        //         opacityLayer.style.height = `${opacityHeight}px`;
        //     } else {
        //         opacityLayer.style.height = `0px`; // Reseta se estiver fora da viewport
        //     }
        // });
    });
</script>
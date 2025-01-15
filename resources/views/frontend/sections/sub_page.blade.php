<div class="section-content">
    
    <div class="image @if($page->image_1_opacity == 1) opacity @endif">
        <img src="{{ asset('storage/' . $page->image_1) }}"
            class="@if($page->image_1_color == 0) grayscale @endif "
            alt="Imagem 1">
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

</div>
<style>
    .section-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Ensure the section-content takes the full viewport height */
    }


    .image {
        width: 100%;
        height: 600px;
        overflow: hidden;
        position: relative;
    }



    .image img,
    .image img {
        width: 100%;
        height: 600px;
        object-fit: cover;
    }

    .grayscale {
        filter: grayscale(100%);
    }


    .opacity::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(109, 25, 25, 0.5);
        /* Aplica a sobreposição com transparência */
        pointer-events: none;
        /* Permite interações com a imagem abaixo */
    }


    .description {
        margin-bottom: 3%;
        margin-top: 1%;
        margin-left: 5%;
        margin-right: 5%;
        flex: 1;
        padding: 20px;
        color: black;
        font-size: 25px;
        text-align: justify;
    }

    .complementary {
        margin-bottom: 3%;
        margin-top: 1%;
        margin-left: 5%;
        margin-right: 5%;
        flex: 1;
        padding: 20px;
        color: black;
        font-size: 25px;
        text-align: justify;
    }
</style>
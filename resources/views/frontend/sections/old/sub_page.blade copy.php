<div class="content-sub-page">
    <div class="image_1">
        <img src="{{ asset('storage/' . $image_1) }}" alt="Imagem">
    </div>



    <div class="description">
        {{$page->description}}
    </div>

    <div class="image_2">
        <img src="{{ asset('storage/' . $image_2) }}" alt="Imagem">
    </div>
</div>


<style>
    .content-sub-page {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .image_1,
    .image_2 {
        width: 100%;
        overflow: hidden;
    }

    .image_1 img,
    .image_2 img {
        width: 100%;
        height: auto;
    }

    .image_1 {
        max-height: 200px;
    }

    .image_2 {
        max-height: 300px;
    }

    .description {
        flex: 0 0 60%;
        padding-right: 20px;
        color: black;
        font-size: 25px;
        text-align: justify;
    }
</style>

<h2>{{$page->title}}</h2>
<div class="description">
    {{$page->description}}
</div>

<div class="images">
    @if(isset($page->images) && !empty($page->images))
        @foreach (json_decode($page->images) as $image)
            <img src="{{ asset('storage/' . $image) }}" alt="Imagem">
        @endforeach
    @endif
</div>

<style>
    .description {
        flex: 1;
        padding-right: 20px;
        color: black;
        font-size: 25px;
        text-align: justify;
    }

    .images {
        flex: 1;
        align-items: center;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .images img {
        max-width: 80%;
        height: auto;
    }
</style>
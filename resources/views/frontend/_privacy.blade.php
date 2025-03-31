@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="red-bar">
    <!-- <ul class="menu"> -->
    <div class="title">
        {!!$page->getTranslatedAttribute('title', $lang)!!}
    </div>
</div>
<div class="container">

    {!!$page->getTranslatedAttribute('body', $lang)!!}


</div>
@endsection

<style>
    .container {
        display: flex;
        justify-content: space-between;
        padding: 0;
    }

    .red-bar {
        width: 100vw;
        height: 70px;
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
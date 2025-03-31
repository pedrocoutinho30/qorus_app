@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container">
    <!-- Carrega a seção dinâmica -->
    <div class="section-content">
        <div class="section" id="sub_page">
            @include('frontend.sections.sub_page')
        </div>
    </div>
</div>
@endsection

<style>
    .container {
        display: flex;
        justify-content: space-between;
        padding: 0;
        padding-bottom: 10px;
        width: 100vw;
        max-width: 100%;
    }

    .section-content {
        width: 100%;
        margin: 0 auto;
        padding: 0;
        box-sizing: border-box;

    }

    .section-content .container {
        max-width: 100vw;
        margin: 0 auto;
        padding: 0 20px;
    }



</style>

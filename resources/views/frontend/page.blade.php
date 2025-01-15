@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container">

    <!-- Carrega a seção dinâmica -->
    <div class="section-content">
        <div class="red-bar">
            <div class="title">
                {!!$page->getTranslatedAttribute('title', $lang)!!}
            </div>
        </div>
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

    .red-bar {
        width: 100vw;
        height: 6vh;
        /* Ajuste a altura conforme necessário */
        background-color: rgb(129, 11, 11);
        position: sticky;
        top: 0;
        z-index: 1000;
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

    .menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
    }

    .menu-link {
        text-decoration: none;
        color: grey;
        padding: 0 10px;
        transition: color 0.3s, font-size 0.3s;
    }

    .selected a {
        font-size: 1.2em;
        font-weight: bold;
        color: white;
    }

    .separator {
        color: grey;
        font-weight: bold;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuLinks = document.querySelectorAll('.menu-link');

        // Restaurar o item selecionado do localStorage
        const selectedSection = localStorage.getItem('selectedSection');
        if (selectedSection) {
            const selectedLink = document.querySelector(`.menu-link[data-section="${selectedSection}"]`);
            if (selectedLink) {
                selectedLink.parentElement.classList.add('selected');
            }
        }

        menuLinks.forEach(item => {
            item.addEventListener('click', function(event) {
                // Remover a classe 'selected' de todos os itens
                menuLinks.forEach(link => link.parentElement.classList.remove('selected'));

                // Adicionar a classe 'selected' ao item clicado
                event.target.parentElement.classList.add('selected');
                
                // Salvar o item selecionado no localStorage
                localStorage.setItem('selectedSection', event.target.getAttribute('data-section'));
            });
        });
    });
</script>
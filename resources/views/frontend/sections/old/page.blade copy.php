@extends('frontend.layout') <!-- Estendendo o layout principal -->

@section('content')
<div class="container">

    <!-- Carrega a seção dinâmica -->
    <div class="section-content">
        <div class="red-bar">
            <ul class="menu">
                <li><a href="sobre-a-qorus" class="menu-link" data-section="sobre-a-qorus">Sobre Nós</a></li> <span class="separator">|</span>
                <li><a href="engenharia-e-construcao" class="menu-link" data-section="engenharia-e-construcao">Engenharia e construção</a></li><span class="separator">|</span>
                <li><a href="inovacao-e-sustentabilidade" class="menu-link" data-section="inovacao-e-sustentabilidade">Inovação e sustentabilidade</a></li><span class="separator">|</span>
                <li><a href="consultoria" class="menu-link" data-section="consultoria">Consultoria</a></li>
            </ul>
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
       
    }

    .section-content {
        width: 100%;
        margin: 0 auto;
        padding: 0;
        box-sizing: border-box;
       
    }

    .section-content .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section {
        margin-left:5% ;
        margin-right:5% ;
    }
    .red-bar {
        width: 100%;
        height: 70px;
        /* Ajuste a altura conforme necessário */
        background-color:rgb(129, 11, 11);
        position: sticky;
        top: 0;
        z-index: 1000;
        /* Certifique-se de que a barra fique acima de outros elementos */
        display: flex;
        align-items: center;
        justify-content: flex-start;
        /* Alinha o menu à esquerda */
        padding-left: 20px;
        /* Adiciona um pouco de espaço à esquerda */
    }

    .menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 20px;
        /* Espaçamento entre os itens do menu */
    }

    .menu li {
        display: inline;
    }

    .menu li:not(:last-child)::after {
        color: aqua;
        margin-left: 10px;
        margin-right: 10px;
        font-weight: bold;
        /* Faz com que a barra de separação tenha o mesmo estilo da letra */
    }

    .menu-link {
        color: white;
        text-decoration: none;
        font-size: 18px;
        /* Tamanho padrão da fonte */
        font-weight: bold;
        /* Torna a fonte mais "gorda" */
        opacity: 0.5;
        /* Torna os links meio transparentes */
    }

    .menu-link:target {
        font-size: 124px;
        /* Aumenta o tamanho da fonte do link selecionado */
        opacity: 0;
        /* Torna o link selecionado totalmente opaco */
    }
    .separator {
        color: grey;
        font-weight: bold;
    }
</style>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            // Esconder todas as seções
            document.querySelectorAll('.section').forEach(section => {
                section.style.display = 'none';
            });
            // Mostrar a seção clicada
            document.querySelector(this.getAttribute('href')).style.display = 'block';
        });
    });

    // Mostrar a primeira seção por padrão
    document.querySelector('#homepage').style.display = 'block';
</script>
<footer class="{{ $footerColor ?? 'footer-white' }} {{ $footerStyle ?? '' }}">
    <div class="footer-line"></div>
    <div class="footer-text">2025 © Qorus Group</div>
</footer>

<style>
    /* Garante que o body ocupe pelo menos 100% da altura da viewport */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }

    /* O conteúdo principal ocupa o espaço restante */
    .content {
        flex: 1;
        /* Faz o conteúdo ocupar o espaço restante */
    }

    footer {
        width: 100%;
        background-color: transparent;
        padding: 10vh 0 5vh 0;
        z-index: 100;
        text-align: left;
    }

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

    .footer-line {
        width: calc(100% - 18.5vh);
        /* Reduz a largura total para criar margem */
        height: 2px;
        margin: 0 auto;
        /* Centraliza horizontalmente */
    }

    .footer-text {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 14px;
        margin-left: 9vh;
        /* Margem à esquerda */
        margin-top: 5px;
    }

    .grey {
        background-color: rgb(186, 186, 186)
    }

    /* Responsividade para dispositivos móveis */
    
    @media (max-width: 768px) {
        .footer-wrapper {
            width: 105%;
            /* Torna o footer um pouco mais largo */
            left: -5%;
            margin-bottom: 10px;
            /* Centraliza o footer ao expandir a largura */
        }

        footer {
            padding: 10vh 0 5vh 0;
            /* Ajusta o espaçamento vertical */
        }

        .footer-line {
            width: calc(100% - 10vh);
            /* Ajusta a largura da linha no footer */
            margin: 0 5vh; /* Margem de 5vh à esquerda e à direita */
            height: 2px; /* Mantém a altura da linha */
        }

        .footer-text {
            margin-left: 5vh;
            /* Ajusta o alinhamento do texto */
        }
    }

</style>
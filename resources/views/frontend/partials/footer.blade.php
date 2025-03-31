<footer class="{{ $footerColor ?? 'footer-white' }}">
    <div class="footer-line"></div>
    <div class="footer-text">2025 © Qorus Group</div>
</footer>

<style>
    /* Garante que o body ocupe pelo menos 100% da altura da viewport */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }

    /* O conteúdo principal ocupa o espaço restante */
    .content {
        flex: 1; /* Faz o conteúdo ocupar o espaço restante */
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
        width: calc(100% - 18.5vh); /* Reduz a largura total para criar margem */
        height: 2px;
        margin: 0 auto; /* Centraliza horizontalmente */
    }

    .footer-text {
        font-family: 'Aeonik-Regular', sans-serif;
        font-size: 14px;
        margin-left: 9vh; /* Margem à esquerda */
        margin-top: 5px;
    }
</style>
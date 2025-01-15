<div class="footer">

    <div class="footer-left">
        @if($lang == 'pt')
        <a href="/pt/politica-de-privacidade" class="">Políticas de Privacidade</a> |
        <a href="/pt/termos-e-condicoes" class="">Termos e Condições</a> |
        <a href="/pt/contactos" class="">Contatos</a>
        @else
        <a href="/en/privacy-policies" class="">Privacy Policies</a> |
        <a href="/en/terms-and-conditions" class="">Terms and Conditions
        </a> |
        <a href="/en/contacts" class="">Contacts</a>

        @endif
    </div>
    <div class="footer-center">
        <a href="https://instagram.com" target="_blank">Instagram</a>
    </div>
    <div class="footer-right">
        <p>© {{ date('Y') }} Qorus Group. Todos os direitos reservados.</p>
    </div>
</div>

<style>
    .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        font-size: 0.9em;
        color: #fff;
        padding: 10px 40px;
        background-color: rgba(0, 0, 0, 0.8);
        flex-wrap: wrap;
        /* Permite que os itens quebrem linha */
    }

    .footer-left,
    .footer-center,
    .footer-right {
        flex: 1;
        margin: 10px 0;
        /* Adiciona margem vertical para espaçamento */
    }

    .footer-left {
        text-align: left;
    }

    .footer-center {
        text-align: center;
    }

    .footer-right {
        text-align: right;
    }

    .footer a {
        color: #fff;
        text-decoration: none;
        margin: 0 5px;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .footer {
            flex-direction: column;
            /* Alinha os itens em coluna */
            text-align: center;
            /* Centraliza o texto */
        }

        .footer-left,
        .footer-center,
        .footer-right {
            text-align: center;
            /* Centraliza o texto */
        }
    }
</style>
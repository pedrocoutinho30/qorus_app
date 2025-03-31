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
    <a href="https://www.instagram.com/qorus_group/" target="_blank" rel="noopener noreferrer" class="social-link">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
        <path d="M16 11.37a4 4 0 1 1-4.73-4.73"></path>
        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
      </svg>
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
        flex: 2;
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
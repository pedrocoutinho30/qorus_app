<body>

    <div class="form-container">
        <form action="{{ route('form.submit') }}" method="POST">
            @csrf
            <hr class="form-divider">

            <input type="text" name="name" placeholder="Nome" required>
            <input type="tel" name="phone" required pattern="[0-9+]+" placeholder="Telefone" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <textarea placeholder="Mensagem" name="message" required></textarea>
            <button class="buttonSubmit" type="submit">Enviar</button>
        </form>

    </div>


</body>

<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin-top: 2vh;
        background-color: rgb(28, 28, 28);
    }

    .form-divider {
        background: transparent;
        border: none;
        border-bottom: 1px solid #fff;
        /* Cor branca para combinar com o design */
        margin: 0 0;
        margin-left: 0;

            /* Espaçamento acima e abaixo da barra */
        width: 100%;
        /* Faz a barra ocupar toda a largura do formulário */
    }

    input,
    textarea {
        width: 100%;
        padding: 10px 0;
        margin: 0 0;
        background: transparent;
        border: none;
        border-bottom: 1px solid #fff;
        color: white;
        font-size: 16px;
        outline: none;
        height: auto;
        /* Permite que a altura seja ajustada dinamicamente */
        overflow-y: hidden;
        /* Remove a barra de rolagem vertical */
        resize: none;
        /* Impede o redimensionamento manual */
        /* Aumenta o numero de linhas para o textarea */
    }

    textarea {
        min-height: 250px;
        resize: none;
        max-height: 250px;

    }


    /* Garante que o texto permaneça branco ao focar no campo */
    input:focus,
    textarea:focus {
        color: white;
        /* Texto branco ao focar */
        border-bottom: 1px solid #fff;
        /* Mantém a borda branca */
    }

    /* Garante que o texto preenchido automaticamente seja branco */
    input:-webkit-autofill,
    textarea:-webkit-autofill {
        background-color: transparent !important;
        color: white !important;
        -webkit-text-fill-color: white !important;
        -webkit-box-shadow: 0 0 0px 1000px rgb(28, 28, 28) inset !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    /* Estiliza o placeholder */
    input::placeholder,
    textarea::placeholder {
        margin: 0;
        color: rgba(255, 255, 255, 0.6);
        /* Placeholder branco com transparência */
    }

    /* Garante que o texto do placeholder permaneça branco ao focar */
    input:focus::placeholder,
    textarea:focus::placeholder {
        color: rgba(255, 255, 255, 0.6);
        /* Placeholder branco com transparência */
    }

    .buttonSubmit {
        width: 20%;
        /* O botão ocupará 20% da largura da tela */
        max-width: 300px;
        /* Define um limite máximo para o tamanho do botão */
        padding: 10px;
        background: transparent;
        border: 2px solid white;
        color: white;
        font-size: 16px;
        cursor: pointer;
        border-radius: 20px;
        margin: 20% auto;
        /* Centraliza o botão horizontalmente */
        display: block;
        /* Garante que o botão seja tratado como um bloco */
    }

    .buttonSubmit:hover {
        background: white;
        color: black;
    }

    /* Ajustes para dispositivos menores */
    @media (max-width: 480px) {

        .form-container {
            height: 100vh;
        margin-top: 2vh;
        }
        

        .buttonSubmit {
            width: 30%;
            /* O botão ocupará 80% da largura da tela em dispositivos menores */
            font-size: 14px;
            margin-top: 20%;
            /* Reduz o tamanho da fonte */
        }

        input,
        textarea {
            width: 90%;
            /* Reduz a largura para acomodar as margens */
            margin: 0px 5%;
            /* Adiciona 5% de margem à direita e à esquerda */
        }

        .form-divider {
       
        margin: 0 5%;

            /* Espaçamento acima e abaixo da barra */
        width: 90%;
        /* Faz a barra ocupar toda a largura do formulário */
    }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textareas = document.querySelectorAll('textarea');

        textareas.forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto'; // Reseta a altura para recalcular
                this.style.height = this.scrollHeight + 'px'; // Ajusta a altura com base no conteúdo
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 5000); // Oculta após 5 segundos
        }

        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 5000); // Oculta após 5 segundos
        }
    });
</script>
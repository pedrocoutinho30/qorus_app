<html>
<!-- Tela de carregamento -->
<div id="preloader">
    <div class="loader"></div>
</div>

<body>

</html>
<style>
    /* styles.css */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        /* Cor de fundo da tela de carregamento */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loader {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<script>
    // script.js
    document.addEventListener("DOMContentLoaded", function() {
        // Verifica se é a primeira visita do usuário
        if (!sessionStorage.getItem('visited')) {
            // Exibe a tela de carregamento
            document.getElementById('preloader').style.display = 'flex';

            // Após o carregamento completo da página
            window.onload = function() {
                // Oculta a tela de carregamento
                document.getElementById('preloader').style.display = 'none';
                // Exibe o conteúdo principal
                document.getElementById('content').style.display = 'block';
                // Marca que o usuário já visitou o site
                sessionStorage.setItem('visited', 'true');
            };
        } else {
            // Se não é a primeira visita, exibe diretamente o conteúdo principal
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('content').style.display = 'block';
        }
    });
</script>
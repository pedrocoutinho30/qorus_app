<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Qorus Group')</title>
    <style>
        /* Ocupa toda a tela */
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .button-container {
            display: none;
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .button-container button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: rgb(129, 11, 11);
            /* Cor de fundo */
            color:white;
            border: none;
            /* Remove a borda padrão */
            border-radius: 5px;
            /* Adiciona bordas arredondadas */
            transition: background-color 0.3s ease;
            /* Transição suave para a cor de fundo */
        }

        .button-container button:hover {
            background-color: #a00;
            /* Cor de fundo ao passar o mouse */
        }
    </style>
</head>

<body>
    <!-- Insira o vídeo -->
    <video id="video" autoplay muted playsinline>
        <source src="{{ asset('videos/teste2.mp4') }}" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>

    <!-- Contêiner dos botões -->
    <div class="button-container" id="button-container">
        <button onclick="window.location.href='/pt'">PT</button>
        <button onclick="window.location.href='/en'">EN</button>
    </div>

    <script>
        // Quando o vídeo terminar, mostra os botões
        const video = document.getElementById('video');
        const buttonContainer = document.getElementById('button-container');
        video.onended = function() {
            buttonContainer.style.display = 'flex';
        };
    </script>
</body>

</html>
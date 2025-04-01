<body>
 
    <div class="form-container">
        <form action="{{ route('form.submit') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nome" required>
            <input type="tel" name="phone" required pattern="[0-9+]+" placeholder="Telefone" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <textarea placeholder="Mensagem" name="message" required></textarea>
            <button type="submit">Enviar</button>
        </form>

    </div>


</body>

<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin-top: 5vh;
        background-color: rgb(28, 28, 28);
    }



    input,
    textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        background: transparent;
        border: none;
        border-bottom: 1px solid #fff;
        color: white;
        font-size: 16px;
        outline: none;
    }

    textarea {
        height: 100px;
        resize: none;
    }

    button {
        width: 10%;
        padding: 10px;
        background: transparent;
        border: 2px solid white;
        color: white;
        font-size: 16px;
        cursor: pointer;
        border-radius: 20px;
        margin-left: 40%;
        margin-top: 10%;
    }

    button:hover {
        background: white;
        color: black;
    }

   
</style>
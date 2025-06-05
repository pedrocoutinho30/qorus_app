<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg px-4">
        <form action="{{ route('form.submit') }}" method="POST" class="space-y-6">
            @csrf

            <hr class="border-b border-white">

            <input type="text" name="name" placeholder="Nome" required
                class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none focus:border-white" />

            <input type="tel" name="phone" required pattern="[0-9+]+" placeholder="Telefone"
                class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none focus:border-white" />

            <input type="email" name="email" placeholder="E-mail" required
                class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none focus:border-white" />

            <textarea name="message" placeholder="Mensagem" required rows="6"
                class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none resize-none max-h-[250px] min-h-[250px] overflow-hidden focus:border-white"></textarea>

            <button type="submit"
                class="block mx-auto w-2/5 max-w-xs py-2 border-2 border-white text-white rounded-full hover:bg-white hover:text-black transition">
                Enviar
            </button>
        </form>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const textareas = document.querySelectorAll('textarea');

        textareas.forEach(textarea => {
            textarea.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });

        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 5000);
        }

        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 5000);
        }
    });
</script>

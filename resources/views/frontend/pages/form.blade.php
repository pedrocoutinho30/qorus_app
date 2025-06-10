    <div class="flex flex-col justify-start space-y-6 pt-[80px] px-6 sm:px-16 md:px-24 lg:px-24 xl:px-24  bg-[rgb(28,28,28)] min-h-screen">
        <div class="flex flex-col justify-start space-y-6 pt-[80px] mb-[10vh] ml-[10%] mr-[10%] sm:ml-[12%] sm:mr-[12%] md:ml-[15%] md:mr-[15%] lg:ml-[25%] lg:mr-[25%] ">

            <form action="{{ route('form.submit') }}" method="POST">
                @csrf

                <hr class="border-white" />

                <!-- Nome -->
                <div>
                    <input type="text" id="name" name="name" placeholder="{{$lang === 'pt' ? 'Nome' : 'Name' }}" required
                        class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none focus:border-white transition duration-300" />
                </div>

                <!-- Telefone -->
                <div>
                    <input type="tel" id="phone" name="phone" required pattern="[0-9+]+" placeholder="{{$lang === 'pt' ? 'Telefone' : 'Phone' }}"
                        class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none focus:border-white transition duration-300" />
                </div>

                <!-- E-mail -->
                <div>
                    <input type="email" id="email" name="email" placeholder="E-mail" required
                        class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none focus:border-white transition duration-300" />
                </div>

                <!-- Mensagem -->
                <div>
                    <textarea id="message" name="message" placeholder="{{$lang === 'pt' ? 'Mensagem' : 'Message' }}" required
                        class="w-full bg-transparent border-b border-white text-white placeholder-white/60 py-2 outline-none resize-none min-h-[250px] max-h-[400px] overflow-hidden focus:border-white transition duration-300"></textarea>
                </div>

                <!-- Botão -->
                <div class="text-center mt-24">
                    <button type="submit"
                        class="w-full sm:w-2/3 max-w-sm mx-auto py-2 border-2 border-white text-white rounded-full hover:bg-white hover:text-black transition duration-300">
                        {{$lang === 'pt' ? 'Enviar' : 'Submit' }} 
                    </button>
                </div>
            </form>

            <!-- Mensagens de sucesso/erro -->
                        
            <div id="success-alert" class="hidden mt-4 p-4 bg-green-600 text-white text-center rounded"> {{$lang === 'pt' ? 'Mensagem enviada com sucesso!' : 'Message sent successfully!' }} </div>
            <div id="error-alert" class="hidden mt-4 p-4 bg-red-600 text-white text-center rounded">{{$lang === 'pt' ? 'Erro ao enviar mensagem.' : 'Error sending message.' }} </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textareas = document.querySelectorAll('textarea');

            textareas.forEach(textarea => {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = this.scrollHeight + 'px';
                });
            });

            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');

            if (successAlert) {
                setTimeout(() => successAlert.style.display = 'none', 5000);
            }

            if (errorAlert) {
                setTimeout(() => errorAlert.style.display = 'none', 5000);
            }
        });
    </script>
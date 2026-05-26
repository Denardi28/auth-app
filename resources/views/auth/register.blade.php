<x-guest-layout>
        <style>
            /* MÁGICA DO DESIGN COMPLETO:
               Injeta o fundo e altera o comportamento visual do componente mãe do Laravel 
            */
            
            /* 1. Altera o fundo da tela inteira para um degradê moderno e aconchegante */
            div.min-h-screen {
                background: linear-gradient(135deg, #f37021 0%, #d45207 100%) !important;
            }

            /* 2. Remove o espaço vazio do logo padrão antigo do Laravel que foi ocultado */
            div.min-h-screen > div:first-child:not(.custom-card-wrapper) {
                display: none !important;
                height: 0 !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            /* 3. Estiliza e dá profundidade à caixinha branca do formulário */
            div.min-h-screen > div.w-full {
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
                border-radius: 1.5rem !important;
                padding: 2.5rem !important;
            }

            /* 4. Suaviza a transição de clique nos inputs */
            input:focus {
                outline: none !important;
                box-shadow: 0 0 0 4px rgba(243, 112, 33, 0.15) !important;
            }
        </style>
    </head>

    <div class="custom-card-wrapper">
        <div class="flex items-center justify-center min-h-[150px] w-full">
            <div class="inline-flex items-center px-15 py-30 bg-blue-600 border border-transparent rounded-md font-semibold text-2xl text-white-500 uppercase tracking-widest hover:bg-blue-500">
                Blog
            </div>
        </div>
        <br>
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">
                Criar Nova Conta
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Junte-se à comunidade do Blog.
            </p>
            <br>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nome Completo')" class="text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-wider" />
                <x-text-input id="name" class="block mt-1.5 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-[#f37021] dark:focus:border-[#f37021] focus:ring-[#f37021] dark:focus:ring-[#f37021] shadow-sm py-2.5 transition" 
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ex: André Silva" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
            </div>
            <br>

            <div>
                <x-input-label for="email" :value="__('Endereço de E-mail')" class="text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-wider" />
                <x-text-input id="email" class="block mt-1.5 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-[#f37021] dark:focus:border-[#f37021] focus:ring-[#f37021] dark:focus:ring-[#f37021] shadow-sm py-2.5 transition" 
                    type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="seuemail@exemplo.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
            </div>
            <br>

            <div>
                <x-input-label for="password" :value="__('Palavra-passe')" class="text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-wider" />
                <x-text-input id="password" class="block mt-1.5 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-[#f37021] dark:focus:border-[#f37021] focus:ring-[#f37021] dark:focus:ring-[#f37021] shadow-sm py-2.5 transition"
                    type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
            </div>
            <br>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Palavra-passe')" class="text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-wider" />
                <x-text-input id="password_confirmation" class="block mt-1.5 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-[#f37021] dark:focus:border-[#f37021] focus:ring-[#f37021] dark:focus:ring-[#f37021] shadow-sm py-2.5 transition"
                    type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
            </div>
            <br>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-5 border-t border-gray-100 dark:border-gray-800">
                <a class="text-sm text-gray-500 dark:text-gray-400 hover:text-[#f37021] dark:hover:text-orange-400 font-medium transition underline decoration-dotted underline-offset-4" href="{{ route('login') }}">
                    {{ __('Já está registado?') }}
                </a>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
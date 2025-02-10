<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Criar uma conta</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Preencha os dados abaixo para começar</p>
    </div>

    <form method="POST" 
          action="{{ route('register') }}"
          x-data="registerForm"
          @submit.prevent="handleSubmit">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <div class="relative">
                <x-text-input id="name" 
                             class="block mt-1 w-full pl-10"
                             type="text" 
                             name="name"
                             x-model="name"
                             @input="validateName"
                             :value="old('name')"
                             autocomplete="name" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="mt-1">
                <p x-show="errors.name" 
                   x-text="errors.name"
                   class="text-sm text-red-600 dark:text-red-400"></p>
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <div class="relative">
                <x-text-input id="email" 
                             class="block mt-1 w-full pl-10"
                             type="email"
                             name="email"
                             x-model="email"
                             @input="validateEmail"
                             :value="old('email')"
                             autocomplete="username" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1">
                <p x-show="errors.email" 
                   x-text="errors.email"
                   class="text-sm text-red-600 dark:text-red-400"></p>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <div class="relative">
                <x-text-input id="password" 
                             class="block mt-1 w-full pl-10"
                             type="password"
                             name="password"
                             x-model="password"
                             @input="validatePassword"
                             autocomplete="new-password" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="mt-1">
                <p x-show="errors.password" 
                   x-text="errors.password"
                   class="text-sm text-red-600 dark:text-red-400"></p>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Mínimo de 8 caracteres</p>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
            <div class="relative">
                <x-text-input id="password_confirmation" 
                             class="block mt-1 w-full pl-10"
                             type="password"
                             name="password_confirmation"
                             x-model="password_confirmation"
                             @input="validatePasswordConfirmation"
                             autocomplete="new-password" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="mt-1">
                <p x-show="errors.password_confirmation" 
                   x-text="errors.password_confirmation"
                   class="text-sm text-red-600 dark:text-red-400"></p>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                    class="w-full flex justify-center items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:bg-indigo-700 dark:focus:bg-indigo-400 active:bg-indigo-900 dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    :disabled="loading">
                <span x-show="!loading">{{ __('Registrar') }}</span>
                <span x-show="loading" class="inline-flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ __('Processando...') }}
                </span>
            </button>
        </div>

        <div class="mt-6 text-center">
            <span class="text-sm text-gray-600 dark:text-gray-400">{{ __('Já tem uma conta?') }}</span>
            <a href="{{ route('login') }}" 
               class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 transition-colors duration-200 font-semibold ml-1">
                {{ __('Faça login aqui') }}
            </a>
        </div>
    </form>
</x-guest-layout>

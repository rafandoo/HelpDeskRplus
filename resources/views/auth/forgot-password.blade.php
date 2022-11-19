<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                @include('layouts.logo')
            </a>
        </x-slot>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um e-mail com um link de redefinição de senha que permitirá que você escolha uma nova.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Solicitar redefinição de senha') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

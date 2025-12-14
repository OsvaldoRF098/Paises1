<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        
        <!-- Logo más pequeño y centrado -->
        <div class="mb-8">
            <a href="/">
                <x-authentication-card-logo class="w-16 h-16 mx-auto fill-current text-gray-500" />
            </a>
        </div>

        <!-- Tarjeta de autenticación más compacta y centrada -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-lg overflow-hidden sm:rounded-xl border border-gray-200">
            
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ secure_url(route('login')) }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember me -->
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Botones y enlace -->
                <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="w-full sm:w-auto justify-center">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>

        <!-- Texto adicional opcional (puedes quitarlo si no lo quieres) -->
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>¿No tienes cuenta? 
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Registrarse gratis
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
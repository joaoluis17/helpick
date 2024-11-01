<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto sm:px-6 lg:px-8 py-12">
            <h2 class="text-center text-2xl font-semibold text-dark-hair mb-6">{{ __('Login') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block text-dark-hair mt-1 w-full border-gray-300 focus:border-gray-500 focus:ring-gray-500 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block text-dark-hair mt-1 w-full border-gray-300 focus:border-gray-500 focus:ring-gray-500 rounded-md" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-brown-eyes shadow-sm focus:ring-brown-eyes" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-dark-hair hover:text-brown-eyes rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-skin-color" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-skin-color hover:bg-brown-eyes text-brown-eyes font-semibold py-2 px-4 rounded-md border-2 border-gray-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="flex items-center justify-center mt-6">
                <a href="{{ route('register') }}" class="ms-2 text-sm font-semibold text-dark-hair hover:text-brown-eyes">
                    {{ __('Don\'t have an account? Register') }}
                </a>
            </div>
        </div>
</x-guest-layout>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div>



            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" placeholder=" email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>


        <!-- Password -->
        <div class="mt-4">


            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" placeholder=" password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-black-800">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ml-3 bg-yellow-400 text-black">
                {{ __('Log in') }}
            </x-primary-button>

        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class=" bg-red-400 text-black">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class=" text-sm text-black-800 dark:text-gray-500">Register</a>
            @endif
            </x-primary-button>
        </div>


    </form>
</x-guest-layout>

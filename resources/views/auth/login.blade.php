<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div class="my-5 mx-5">
            <label for="username" class="block text-sm font-medium text-gray-100">Username</label>
            <x-text-input id="email" class="block w-full mt-3" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" placeholder=" masukkan username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>


        <!-- Password -->
        <div class="my-7 mx-5">
            <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
            <x-text-input id="password" class="block w-full mt-3" type="password" name="password" required
                autocomplete="current-password" placeholder=" password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-black-800">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex justify-center mb-4 mx-5">
            <x-primary-button class=" w-full text-center mt-5 h-12 bg-[#0395FF] justify-center ">
                Login
            </x-primary-button>

        </div>

        {{-- <div class="flex items-center justify-center mt-4">
            <x-primary-button class=" bg-red-400 text-black">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class=" text-sm text-black-800 dark:text-gray-500">Register</a>
            @endif
            </x-primary-button>
        </div> --}}


    </form>
</x-guest-layout>

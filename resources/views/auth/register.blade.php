<x-guest-layout>
<div class="form-box" style="margin-left: 175px;">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2 style="margin-bottom: 50px">Register</h2>

        <!-- Name -->
        <div class="input-box">
        <i class='bx bxs-user'></i>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="input-box" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="input-box" style="margin-top: 20px;">
        <i class='bx bxs-envelope' ></i>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-box" style="margin-top: 20px;">
        <i class='bx bxs-lock-alt' ></i>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input-box" style="margin-top: 20px;">
        <i class='bx bxs-lock-alt' ></i>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4" style="margin-top: 40px;">
            <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-guest-layout>

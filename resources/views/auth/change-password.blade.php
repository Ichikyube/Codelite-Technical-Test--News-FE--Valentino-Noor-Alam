<x-guest-layout>
    <form method="POST" action="{{ route('updatepassword') --}}">
        @csrf

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="old_password" :value="__('Password')" />
            <x-text-input id="old_password" class="block mt-1 w-full" type="password" name="old_password" required />
            <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="new_password" :value="__('Confirm Password')" />

            <x-text-input id="new_password" class="block mt-1 w-full"
                                type="password"
                                name="new_password" required />

            <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="services" :value="__('Services')" />

                <x-input id="services" class="block mt-1 w-full"
                         type="text"
                         name="services"
                         required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

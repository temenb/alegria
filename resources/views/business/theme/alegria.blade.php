<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="post" action="{{ route('files.uploadFile', ['business' => $business])  }}" enctype="multipart/form-data" />
        @csrf
        <input type="file" name="files[]" accept="image/*" multiple />
        <x-button class="ml-3">{{ __('Upload') }}</x-button>
        </form>
        alegria
        <x-button class="ml-3 calendar">{{ __('Calendar') }}</x-button>{{-- ///@todo update according to the rules --}}

        <table>
            <thead>
            <tr>
                <th> id </th>
                <th> user </th>
                <th> name </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> {{ $business->id }} </td>
                <td> {{ $business->name }} </td>
                <td> {{ $business->user->email }} </td>
            </tr>
            </tbody>
        </table>
    </x-auth-card>
</x-guest-layout>

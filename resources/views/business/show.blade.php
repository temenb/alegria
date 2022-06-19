<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="post" action="{{ route('businesses.uploadFile', ['business' => $business])  }}" enctype="multipart/form-data" />
            @csrf
            <input type="file" name="files[]" accept="image/*" multiple />
            <x-button class="ml-3">{{ __('Upload') }}</x-button>
        </form>
        <table>
            <thead>
            <tr>
                <th> id </th>
                <th> user </th>
                <th> name </th>
                <th> layout </th>
                <th> link </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $business->id }} </td>
                    <td> {{ $business->name }} </td>
                    <td> {{ $business->user->email }} </td>
                    <td> {{ $business->layout }} </td>
                    <td> <a href="{{ route('businesses.show', ['business' => $business->slug]) }}" /a>link</a> </td>
                </tr>
            </tbody>
        </table>
    </x-auth-card>
</x-guest-layout>

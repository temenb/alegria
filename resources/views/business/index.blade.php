<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <table>
            <thead>
            <tr>
                <th> id </th>
                <th> user </th>
                <th> layout </th>
            </tr>
            </thead>
            <tbody>
            @foreach($businesses as $business)
                <tr>
                    <td> <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('businesses.show', ['business' => $business->slug]) }}" /a>#{{ $business->id }}</a> </td>
                    <td> {{ $business->user->email }} </td>
                    <td> {{ $business->layout }} </td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
            {{ $businesses->links() }}
        </table>

        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('businesses.create') }}">
            {{ __('Register business') }}
        </a>
    </x-auth-card>
</x-guest-layout>

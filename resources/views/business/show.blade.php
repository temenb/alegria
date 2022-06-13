<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <table>
            <thead>
            <tr>
                <th> id </th>
                <th> user </th>
                <th> layout </th>
                <th> link </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $business->id }} </td>
                    <td> {{ $business->user->email }} </td>
                    <td> {{ $business->layout }} </td>
                    <td> <a href="{{ route('businesses.show', ['business' => $business->slug]) }}" /a>link</a> </td>
                </tr>
            </tbody>
        </table>
    </x-auth-card>
</x-guest-layout>

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
                    <td> {{ $customer->id }} </td>
                    <td> {{ $customer->user->email }} </td>
                    <td> {{ $customer->layout }} </td>
                    <td> <a href="{{ route('customers.show', ['customer' => $customer->slug]) }}" /a>link</a> </td>
                </tr>
            </tbody>
        </table>
    </x-auth-card>
</x-guest-layout>

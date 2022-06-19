<x-app-layout>
    <x-slot name="header">
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('businesses.search') }}" >
                    @csrf
                        <input name="q" placeholder="{{ __('Search')  }}">
                    </form>
                    <table>
                        <thead>
                        <tr>
                            <th> id </th>
                            <th> user </th>
                            <th> name </th>
                            <th> layout </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($businesses as $business)
                            <tr>
                                <td> <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('businesses.show', ['business' => $business->slug]) }}" /a>#{{ $business->id }}</a> </td>
                                <td> {{ $business->user->email }} </td>
                                <td> {{ $business->name }} </td>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


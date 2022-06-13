<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div>
                <x-label for="slug" :value="__('Url')" />
                <x-input id="slug" class="block mt-1 w-full" type="text" name="name" :value="old('slug')" required autofocus />
            </div>

            <div class="container mt-5">
                <div classs="form-group">
                    <input type="text" id="service" name="service" placeholder="Service" class="form-control" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script src="https://rawgit.com/ahmohamed/typeahead-multiselect/master/typeahead-multiselect.min.js"></script>
        <script type="text/javascript">
            const wildcard = '%QUERY';
            const route = '{{ route('services.autocompleteSearch') }}?query=%QUERY';
            const $service = $('#service');

            const servicesBloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                identify: function(obj) { return obj.id; },
                remote: {
                    url: route,
                    wildcard: wildcard,
                    cache: false
                }
            });

            // instantiate the typeahead UI
            $service
                .typeaheadmulti({
                        hint: true,
                        highlight: true,
                        minLength: 1,
                    },
                    {
                        name: 'services',
                        display: 'name',
                        displayKey: 'id',
                        source: servicesBloodhound
                    })
        </script>
    </x-auth-card>
</x-guest-layout>

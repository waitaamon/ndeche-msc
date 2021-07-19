<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900"> {{ _('Investigators') }}</h1>
            @livewire('institutions')
        </div>
    </x-slot>

    <div class="py-6">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">

                <livewire:datatable
                        model="App\Models\Institution"
                        include="name, ip_address, created_at"
                        searchable="name"
                        exportable
                />

            </div>
        </div>
    </div>
</x-app-layout>

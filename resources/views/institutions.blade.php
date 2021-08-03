<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900"> {{ _('Institutions') }}</h1>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                @livewire('institutions')
            </div>
        </div>
    </div>
</x-app-layout>

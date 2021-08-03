<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900"> {{ _('Legal Cases') }}</h1>
    </x-slot>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            @livewire('legal-cases')
        </div>
    </div>
</x-app-layout>

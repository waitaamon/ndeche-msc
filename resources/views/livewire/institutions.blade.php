<div>
    <div class="p-6">
        <div class="flex justify-end">
            <x-jet-button type="button" wire:click="create">Add Institution</x-jet-button>
        </div>

        <div class="mt-6 overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ip Address
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Case Count
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Added On
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                @forelse($institutions as $institution)
                    <tr wire:key="{{ $institution->id  }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $institution->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $institution->ip_address }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{  $institution->legal_cases_count }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $institution->created_at->format('d F, Y') }}
                        </td>
                        <td class="px-6 py-4 space-x-2 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
                            <a href="#" wire:click.prevent="edit({{$institution->id}})" class="text-gray-600 hover:text-gray-900">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"> No
                            institutions
                        </td>
                    </tr>

                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showEditModal">
        <x-slot name="title">
            Institution
        </x-slot>

        <x-slot name="content">

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-6 gap-6 space-y-4">

                    <div class="col-span-6">
                        <x-jet-label>Institution Name</x-jet-label>
                        <x-jet-input type="text" wire:model="institution.name"/>
                        <x-jet-input-error for="institution.name"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Institution Email</x-jet-label>
                        <x-jet-input type="email" wire:model="institution.email"/>
                        <x-jet-input-error for="institution.email"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Institution Address</x-jet-label>
                        <x-jet-input type="text" wire:model="institution.address"/>
                        <x-jet-input-error for="institution.address"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Institution Ip Address</x-jet-label>
                        <x-jet-input type="text" wire:model="institution.ip_address"/>
                        <x-jet-input-error for="institution.ip_address"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Institution Description</x-jet-label>
                        <x-input.textarea wire:model="institution.description"/>
                        <x-jet-input-error for="institution.description"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </div>
            </form>

        </x-slot>
    </x-jet-dialog-modal>
</div>

<div>
    <div class="p-6">
        <div class="flex justify-end">
            <x-jet-button type="button" wire:click="create">Add Role</x-jet-button>
        </div>

        <div class="mt-6 overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Users Count
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Permissions Count
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        Jane Cooper
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Regional Paradigm Technician
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        jane.cooper@example.com
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
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
                        <x-jet-input type="text" wire:model="institution.name" />
                        <x-jet-input-error for="institution.name" />
                    </div>


                    <div class="col-span-6">
                        <x-jet-label>Institution IP address</x-jet-label>
                        <x-jet-input type="text" wire:model="institution.ip_address" />
                        <x-jet-input-error for="institution.ip_address" />
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Desription</x-jet-label>
                        <textarea class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="institution.description"></textarea>
                        <x-jet-input-error for="institution.description" />
                    </div>

                    <div class="col-span-6">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </div>
            </form>

        </x-slot>
    </x-jet-dialog-modal>
</div>

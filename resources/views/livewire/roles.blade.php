<div>
    <div class="p-6">
        <div class="flex justify-end">
            <x-jet-button type="button" wire:click="create">Add Role</x-jet-button>
        </div>

        <div class="mt-6 overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Users Count
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Permissions Count
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                @forelse($roles as $role)
                    <tr wire:key="{{ $role->id  }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $role->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ optional($role->user)->count() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $role->permissions_count }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" wire:click.prevent="edit({{$role->id}})"
                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"> No
                            roles
                        </td>
                    </tr>

                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showEditModal">
        <x-slot name="title">
            Role
        </x-slot>

        <x-slot name="content">

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-6 gap-6 space-y-4">

                    <div class="col-span-6">
                        <x-jet-label>Role Name</x-jet-label>
                        <x-jet-input type="text" wire:model="role.name"/>
                        <x-jet-input-error for="role.name"/>
                    </div>


                    <div class="col-span-6">
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($permissions as $permission)
                                <div class="col-span-2 flex items-center" wire:key="{{ (int)$permission->id  }}">
                                    <input wire:model="selected_permissions" value="{{ $permission->id }}"
                                           id="{{ \Illuminate\Support\Str::slug($permission->name) }}"
                                           name="{{ \Illuminate\Support\Str::slug($permission->name) }}" type="checkbox"
                                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="{{ \Illuminate\Support\Str::slug($permission->name) }}"
                                           class="ml-2 block text-sm text-gray-900">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-6">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </div>
            </form>

        </x-slot>
    </x-jet-dialog-modal>
</div>

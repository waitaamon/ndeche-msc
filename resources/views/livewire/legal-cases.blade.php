<div>
    <div class="p-6">
        <div class="flex justify-end">
            <x-jet-button type="button" wire:click="create">Create new legal case</x-jet-button>
        </div>

        <div class="mt-6 overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Institution
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created By
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created On
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Last updated
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                @forelse($users as $user)
                    <tr wire:key="{{ $user->id  }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{  $user->roles->pluck('name') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->created_at->format('d F, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" wire:click.prevent="edit({{$user->id}})"
                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"> No
                            users
                        </td>
                    </tr>

                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showEditModal">
        <x-slot name="title">
            User
        </x-slot>

        <x-slot name="content">

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-6 gap-6 space-y-4">

                    <div class="col-span-6">
                        <x-jet-label>User Name</x-jet-label>
                        <x-jet-input type="text" wire:model="user.name"/>
                        <x-jet-input-error for="user.name"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>User Email</x-jet-label>
                        <x-jet-input type="email" wire:model="user.email"/>
                        <x-jet-input-error for="user.email"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>User Password</x-jet-label>
                        <x-jet-input type="password" wire:model="password"/>
                        <x-jet-input-error for="password"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>User Role</x-jet-label>
                        <x-input.select wire:model="selected_role" placeholder="Select user role">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" wire:key="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </x-input.select>
                        <x-jet-input-error for="selected_role"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </div>
            </form>

        </x-slot>
    </x-jet-dialog-modal>
</div>

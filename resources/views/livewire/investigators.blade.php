<div>
    <div class="flex justify-end">
        <x-jet-button type="button" wire:click="create">Add Investigator</x-jet-button>
    </div>

    <div>
        <div class=" flex flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading>Name</x-table.heading>
                    <x-table.heading>Email</x-table.heading>
                    <x-table.heading>Status</x-table.heading>
                    <x-table.heading>Category</x-table.heading>
                    <x-table.heading></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($investigators as $investigator)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $investigator->id }}">

                            <x-table.cell>
                            <span class="inline-flex space-x-2 truncate text-sm leading-5">
                                <p class="text-gray-900 truncate">
                                    {{ $investigator->name }}
                                </p>
                            </span>
                            </x-table.cell>

                            <x-table.cell>
                                {{ $investigator->email }}
                            </x-table.cell>

                            <x-table.cell>
                                {{ $investigator->status }}
                            </x-table.cell>

                            <x-table.cell>
                                {{ $investigator->category }}
                            </x-table.cell>

                            <x-table.cell>
                                <a href="/investigators/{{ $investigator->id }}" class="mr-2 text-sm text-indigo-500 hover:text-indigo-800">View</a>
                                <x-button.link wire:click.prevent="edit({{ $investigator->id }})">Edit</x-button.link>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="6">
                                <div class="flex justify-center items-center space-x-2">
                                    <x-icon.inbox class="h-8 w-8 text-gray-300"/>
                                    <span
                                            class="font-medium py-8 text-gray-400 text-xl">No investigators found</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
            <div>
                {{ $investigators->links() }}
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showEditModal">
        <x-slot name="title">
            Add Investigator
        </x-slot>

        <x-slot name="content">

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-6 gap-6 space-y-4">

                    <div class="col-span-6">
                        <x-jet-label>investigator officer name</x-jet-label>
                        <x-jet-input type="text" wire:model="investigator.name" />
                        <x-jet-input-error for="investigator.name" />
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>investigator officer email</x-jet-label>
                        <x-jet-input type="email" wire:model="investigator.email" />
                        <x-jet-input-error for="investigator.email" />
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>investigator officer password</x-jet-label>
                        <x-jet-input type="password" wire:model="password" />
                        <x-jet-input-error for="password" />
                    </div>

                    <div class="col-span-6">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-jet-dialog-modal>
</div>

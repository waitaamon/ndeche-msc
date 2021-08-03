<div>
    <div class="p-6">
        <div class="flex justify-end">
            @can('create legal case')
                <x-jet-button type="button" wire:click="create">Create new legal case</x-jet-button>
            @endcan
        </div>

        <div class="mt-6 overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
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

                @forelse($legalCases as $legalCase)
                    <tr wire:key="{{ $legalCase->id  }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $legalCase->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $legalCase->institution->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{  $legalCase->user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{  $legalCase->status }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $legalCase->created_at->format('d F, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $legalCase->updated_at->format('d F, Y') }}
                        </td>
                        <td class="px-6 py-4 space-x-2 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('legal-cases.show', ['legal_case' => $legalCase]) }}"
                               class="text-indigo-600 hover:text-indigo-900">View</a>
                            <a href="#" wire:click.prevent="edit({{$legalCase->id}})"
                               class="text-gray-600 hover:text-gray-900">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"> No
                            legal cases
                        </td>
                    </tr>

                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showEditModal" maxWidth="6xl">
        <x-slot name="title">
            Legal Case
        </x-slot>

        <x-slot name="content">

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-6 gap-6 space-y-4">

                    <div class="col-span-6">
                        <x-jet-label>Legal Case Title</x-jet-label>
                        <x-jet-input type="text" wire:model="legalCase.title"/>
                        <x-jet-input-error for="legalCase.title"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Legal Case Institution</x-jet-label>
                        <x-input.select wire:model="legalCase.institution_id" placeholder="Select institution">
                            @foreach($institutions as $institution)
                                <option value="{{ $institution->id }}"
                                        wire:key="{{ $institution->id }}">{{ $institution->name }}</option>
                            @endforeach
                        </x-input.select>
                        <x-jet-input-error for="legalCase.institution_id"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Legal Case Investigator</x-jet-label>
                        <x-input.select wire:model="legalCase.investigator_id" placeholder="Select investigator">
                            @foreach($investigators as $investigator)
                                <option value="{{ $investigator->id }}"
                                        wire:key="{{ $investigator->id }}">{{ $investigator->name }}</option>
                            @endforeach
                        </x-input.select>
                        <x-jet-input-error for="legalCase.investigator_id"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label>Legal Case Description</x-jet-label>
                        <x-input.textarea wire:model="legalCase.description"/>
                        <x-jet-input-error for="legalCase.description"/>
                    </div>

                    <div class="bg-indigo-50 rounded p-3 col-span-6 overflow-y-scroll" style="height: 300px;">
                        <x-jet-input-error for="selected_system_events" class="py-4"/>
                        <div class="grid grid-cols-4 gap-4 space-y-2">
                            @forelse($systemEvents as $sysEvent)
                                <div class="col-span-4" wire:key="{{ $sysEvent->identifier }}">
                                    <div class="flex items-center">
                                        <input wire:model="selected_system_events" value="{{ $sysEvent->identifier }}"
                                               id="{{ 'sys_event_' . $sysEvent->identifier }}"
                                               name="{{ 'sys_event_' . $sysEvent->identifier }}" type="checkbox"
                                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="{{ 'sys_event_' . $sysEvent->identifier }}"
                                               class="ml-2 block text-sm text-gray-900">
                                            {{ $sysEvent->Message  }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <div class=" py-4 col-span-4">
                                    <p class="text-sm text-gray-400 text-center">Selected institution has no system
                                        logs</p>
                                </div>
                            @endforelse
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

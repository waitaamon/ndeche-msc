<div>
    <div class="p-6">
        <div class="flex justify-end">
            <x-jet-button type="button" wire:click="create">Assign Judicial Officer</x-jet-button>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showEditModal">
        <x-slot name="title">
           Judicial Officer
        </x-slot>

        <x-slot name="content">

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-6 gap-6 space-y-4">

                    <div class="col-span-6">
                        <x-jet-label>Judicial Officers</x-jet-label>
                        <x-input.select wire:model="legalCase.judicial_officer_id" placeholder="Select judicial officer">
                            @foreach($judicialOfficers as $judicialOfficer)
                                <option value="{{ $judicialOfficer->id }}" wire:key="{{ $judicialOfficer->id }}">{{ $judicialOfficer->name }}</option>
                            @endforeach
                        </x-input.select>
                        <x-jet-input-error for="legalCase.judicial_officer_id"/>
                    </div>
                    <div class="col-span-6 flex justify-between">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </div>
            </form>

        </x-slot>
    </x-jet-dialog-modal>
</div>

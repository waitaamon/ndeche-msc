<div>
    <div class="p-6">
        <div class="flex justify-end">
            <x-jet-button type="button" wire:click="create">Judicial Officer Action</x-jet-button>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showEditModal">
        <x-slot name="title">
            Judicial Officer Actions
        </x-slot>

        <x-slot name="content">

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-6 gap-6 space-y-4">

                    <div class="col-span-6">
                        <x-jet-label>Judicial Officer Remarks</x-jet-label>
                        <x-input.textarea wire:model="legalCase.judicial_officer_remarks"/>
                        <x-jet-input-error for="legalCase.judicial_officer_remarks"/>
                    </div>

                    <div class="col-span-6 flex justify-between">
                        <x-jet-button>Save</x-jet-button>
                        @can('end legal case')
                            @if($legalCase->judicial_officer_remarks)
                                <x-jet-button type="button" wire:click="publish" class="bg-red-800 hover:bg-red-700">
                                    Publish Case
                                </x-jet-button>
                            @endif
                        @endcan
                    </div>
                </div>
            </form>

        </x-slot>
    </x-jet-dialog-modal>
</div>

<div>
    <div>
        <x-jet-button type="button" wire:click="create">Add Institution</x-jet-button>
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

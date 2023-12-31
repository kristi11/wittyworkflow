<form wire:submit="save">
    <x-dialog-modal wire:model="showEditModal">
        <x-slot name="title">User role</x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="role" value="{{ __('Role name') }}"/>
                <select id="role"
                        wire:model.live="role"
                        type="text"
                        class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm dark:bg-gray-900">
                    <option value="" class="font-bold" selected>Choose a role</option>
                        @foreach(\App\Models\Functionality::ROLE as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                </select>
                <x-input-error for="role" class="mt-2"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showEditModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button type="submit">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</form>

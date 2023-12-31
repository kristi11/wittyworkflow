<form wire:submit="save">
    <x-dialog-modal wire:model="showServicesModal">
        <x-slot name="title">Services</x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="name" value="{{ __('Service name') }}" />
                {{--                <p class="text-gray-400  text-xs">{{__('What should the main quote of your business say')}}</p>--}}
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.blur="name"/>
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="description" value="{{ __('Service description') }}" />
                <textarea wire:model.blur="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" rows="10" id="description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="price" value="{{ __('Price in $') }}" />
                <x-input id="price" type="text" class="mt-1 block w-full" wire:model.blur="price" />
                <x-input-error for="price" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="estimated_hours" value="{{ __('Estimated Hours') }}" />
                <x-input id="estimated_hours" type="number" class="mt-1 block w-full" wire:model.blur="estimated_hours"/>
                <x-input-error for="estimated_hours" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="estimated_minutes" value="{{ __('Estimated Minutes') }}" />
                <x-input id="estimated_minutes" type="number" class="mt-1 block w-full" wire:model.blur="estimated_minutes"/>
                <x-input-error for="estimated_minutes" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="extra_description" value="{{ __('Extra description') }}" />
                <x-input id="extra_description" type="text" class="mt-1 block w-full" wire:model.blur="extra_description"/>
                <x-input-error for="extra_description" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showServicesModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button type="submit">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</form>

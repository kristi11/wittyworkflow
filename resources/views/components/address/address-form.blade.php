<form wire:submit="save">
    <x-dialog-modal wire:model="showAddressModal">
        <x-slot name="title">Store address</x-slot>

        <x-slot name="content">
            <!-- Main quote -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="name" value="{{ __('Whats the business name') }}" />
{{--                <p class="text-gray-400  text-xs">{{__('What should the main quote of your business say')}}</p>--}}
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.blur="name"/>
                <x-input-error for="name" class="mt-2" />
            </div>

            <!-- Third quote -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="street" value="{{ __('Street') }}" />
{{--                <p class="text-gray-400  text-xs">{{__('What should the third quote of your business say')}}</p>--}}
                <x-input id="street" type="text" class="mt-1 block w-full" wire:model.blur="street" />
                <x-input-error for="street" class="mt-2" />
            </div>

            <!-- Gradient Degree -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="city" value="{{ __('City') }}" />
                <x-input id="city" type="text" class="mt-1 block w-full" wire:model.blur="city" />
                <x-input-error for="city" class="mt-2" />
            </div>

            <!-- Gradient Degree First color -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="state" value="{{ __('State') }}" />
                <x-input id="state" type="text" class="mt-1 block w-full" wire:model.blur="state"/>
                <x-input-error for="state" class="mt-2" />
            </div>

            <!-- Gradient Degree Start -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="zip" value="{{ __('Zip code') }}" />
                <x-input id="zip" type="number" class="mt-1 block w-full" wire:model.blur="zip"/>
                <x-input-error for="zip" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="phone" value="{{ __('Business phone number') }}" />
                <x-input id="phone" type="number" class="mt-1 block w-full" wire:model.blur="phone"/>
                <x-input-error for="phone" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showAddressModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button type="submit">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</form>

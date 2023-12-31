<form wire:submit="save">
    <x-dialog-modal wire:model="showBusinessHoursModal">
        <x-slot name="title">Business hours</x-slot>

        <x-slot name="content">
            <!-- Main quote -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="day" value="{{ __('Day') }}" />
                <select id="day"
                        wire:model.blur="day"
                        type="text"
                        class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm dark:bg-gray-900">
                    <option value="" class="font-bold" selected>Days</option>
                    @foreach(\App\Models\Functionality::WEEK_DAYS as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                <x-input-error for="day" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="open" value="{{ __('Is the business open or closed on this day') }}" />
                <select id="open"
                        wire:model.live="open"
                        type="text"
                        class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm dark:bg-gray-900"
                required>
                    <option value="" class="font-bold" disabled>Availability</option>
                    @foreach(\App\Models\Functionality::IS_OPEN as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                <x-input-error for="open" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                @if($open == '')
                    <x-label for="open_from" class="text-red-600" value="{!!__('Please select if the business is open or closed on this day') !!}" />
                @else
                    @if(!$open)
                        <x-label for="open_from" class="text-red-600" value="{!!__('Can\'t select hours because the business is closed on this day') !!}" />
                        <x-input id="open_from" type="time" class="mt-1 block w-full opacity-25" wire:model.blur="open_from" disabled />
                    @else
                        <x-label for="open_from" value="{{ __('When does the business open') }}" />
                        <x-input id="open_from" type="time" class="mt-1 block w-full" wire:model.blur="open_from" />
                        <x-input-error for="open_from" class="mt-2" />
                    @endif

                    @if(!$open)
                        <x-label for="open_until" class="text-red-600" value="{!!__('Can\'t select hours because the business is closed on this day') !!}" />
                        <x-input id="open_until" type="time" class="mt-1 block w-full opacity-25" wire:model.blur="open_until" disabled />
                    @else
                        <x-label for="open_until" value="{{ __('When does the business close') }}" />
                        <x-input id="open_until" type="time" class="mt-1 block w-full" wire:model.blur="open_until" />
                        <x-input-error for="open_until" class="mt-2" />
                    @endif
               @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showBusinessHoursModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button type="submit">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</form>

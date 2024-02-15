<div>
    @if($alwaysOpen)
        <div class="flex items-center justify-evenly">
            <p class="bg-gray-200 flex items-center ml-2 justify-center mb-6 p-6 rounded-lg shadow-md text-gray-700 w-9/12 dark:bg-gray-800 dark:text-gray-400">
                {{ __('This business is always open. Click the icon to change the hours status') }}

                <button wire:click="toggleAlwaysOpen" class="flex ml-2 p-1 items-center justify-center w-8 h-8 rounded-full bg-indigo-100 dark:bg-gray-700">
                    @if($alwaysOpen)
                        <x-icons.x-mark/>
                    @else
                        <x-icons.checkmark/>
                @endif

            </p>
        </div>
    @else
        <div class="flex justify-end mr-3">
            <x-button class="mb-5" wire:click="addHours">
                Add Hours
            </x-button>
        </div>

        <div class="bg-white overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">
            <x-table.table>
                <x-slot name="head">
                    <x-table.table-heading class="px-6 py-6">
                        {{ __('Day') }}
                    </x-table.table-heading>
                    <x-table.table-heading class="px-6 py-6">
                        {{ __('Open from') }}
                    </x-table.table-heading>
                    <x-table.table-heading class="px-6 py-6">
                        {{ __('Open until') }}
                    </x-table.table-heading>
                    <x-table.table-heading class="px-6 py-6">
                        {{ __('Status') }}
                    </x-table.table-heading>
                    <x-table.table-heading class="flex justify-center px-6 py-6">
                    {{--Dropdown menu--}}
                    </x-table.table-heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($businessHours as $hours)
                        <tr class="bg-white border-b dark:bg-gray-700"
                            wire:loading.class.delay="opacity-50 dark:opacity-95" wire:key="{{ $hours->id }}">
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                                {{ ucwords($hours->day) }}
                            </td>
                            <td class="py-4 text-gray-900 dark:text-gray-200">
                                @if($hours->open_from == null)
                                    <p class="text-red-600">{{ __('Closed') }}</p>
                                @else
                                    <p class="text-indigo-600">{{ \Carbon\Carbon::parse($hours->open_from)->format('g:i A') }}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                                @if($hours->open_from == null)
                                    <p class="text-red-600">{{ __('Closed') }}</p>
                                @else
                                    <p class="text-indigo-600">{{ \Carbon\Carbon::parse($hours->open_until)->format('g:i A') }}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                                @if($hours->open)
                                    <p class="text-green-600">Open</p>
                                @else
                                    <p class="text-red-600">Closed</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                                <div class="flex justify-center">
                                    <div class="flex items-center justify-end">
                                        <x-menu>
                                            <x-menu.button class="rounded hover:bg-gray-100">
                                                <x-icons.ellipsis-horizontal />
                                            </x-menu.button>

                                            <x-menu.items>
                                                <x-menu.close>
                                                    <x-menu.item class="flex items-center"
                                                                 wire:click="edit({{ $hours->id }})"
                                                    >
                                                        <x-icons.edit/>
                                                        Edit
                                                    </x-menu.item>
                                                </x-menu.close>
                                                <x-menu.close>
                                                    <x-menu.item class="flex items-center"
                                                                 wire:click="delete({{ $hours->id }})"
                                                                 wire:confirm="Are you sure you want to delete this business hour?"
                                                    >
                                                        <x-icons.delete/>
                                                        Delete
                                                    </x-menu.item>
                                                </x-menu.close>
                                            </x-menu.items>
                                        </x-menu>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-700">
                            <td class="px-6 py-4 text-gray-900" colspan="5">
                                <div class="flex justify-center text-gray-400">
                                    {{ __('No business hours found') }}
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-table.table>
            {{--End users table--}}
        </div>
        @include('components.business-hours.business-hours_form')
    @endif
</div>

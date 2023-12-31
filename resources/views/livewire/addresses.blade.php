<div>
    <div class="flex justify-evenly invisible md:visible">
        <p class="bg-gray-200 flex justify-center mb-0 p-0 md:mb-6 md:p-6 rounded-lg shadow-md text-gray-700 w-9/12 dark:bg-gray-800  dark:text-gray-400">
            {{ __('Please provide your business\'s address ') }}
        </p>
    </div>
    <div class="bg-white overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">
        <x-table.table>
            <x-slot name="head">
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Business name') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Street') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('City') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('State') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Zip code') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6 flex justify-center">
                    {{ __('Phone') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Actions') }}
                </x-table.table-heading>
            </x-slot>
            <x-slot name="body">
                @if($addresses)
                    <tr class="bg-white border-b dark:bg-gray-700"
                        wire:loading.class.delay="opacity-50 dark:opacity-95"
                    >
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            {{ $addresses->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            {{ $addresses->street }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            {{ $addresses->city }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            {{ $addresses->state }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            {{ $addresses->zip }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            {{ $addresses->phone }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            <div class="flex justify-end">
                                <x-secondary-button wire:click="editAddress({{ $addresses->id }})" class="mr-2">Edit
                                </x-secondary-button>
                            </div>
                        </td>
                    </tr>
                @else
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 text-gray-900" colspan="8">
                            <div class="flex justify-center text-gray-400">
                                {{ __('No address found') }}
                            </div>
                        </td>
                    </tr>
                @endif
            </x-slot>
        </x-table.table>
    </div>
    @include('components.address.address-form')
</div>

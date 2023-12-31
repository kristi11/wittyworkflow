<div>
    <div class="flex justify-end mr-3">

{{--        <p class="bg-gray-200 flex justify-center mb-6 p-6 rounded-lg shadow-md text-gray-700 w-9/12">--}}
{{--            {{ __('Please provide what services your business offers ') }}--}}
{{--        </p>--}}
        <x-button class="mb-5" wire:click="addService">
            Add Service
        </x-button>
    </div>

    <div class="bg-white overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">
        {{--Users table--}}
        <x-table.table>
            <x-slot name="head">
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Service name') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Service Description') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Price') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Estimated Hours') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Estimated Minutes') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Extra Description') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6 flex justify-center">
                    {{ __('Actions') }}
                </x-table.table-heading>
            </x-slot>
            <x-slot name="body">
                @forelse ($services as $service)
                    <tr class="bg-white border-b dark:bg-gray-700"
                        wire:loading.class.delay="opacity-50 dark:opacity-95" wire:key="{{ $service->id }}">
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $service->name }}
                        </td>
                        <td class="py-4 text-gray-900 dark:text-gray-200">
                            {{Str::words($service->description, 5, '...')}}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ '$ '.$service->price }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $service->estimated_hours }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $service->estimated_minutes }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{Str::words($service->extra_description, 3, '...')}}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            <div class="flex justify-end">
                                <x-secondary-button wire:click="editService({{ $service->id }})" class="mr-2">Edit
                                </x-secondary-button>

                                <x-danger-button wire:click="delete({{ $service->id }})" wire:confirm="Are you sure you want to delete this service?" >
                                    Delete
                                </x-danger-button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-700">
                        <td class="px-6 py-4 text-gray-900" colspan="7">
                            <div class="flex justify-center text-gray-400">
                                {{ __('No services found') }}
                            </div>
                        </td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table.table>
        {{--End users table--}}
    </div>
    {{--Paginate links--}}
    <div class="p-2">
        {{ $services->links() }}
    </div>
    {{--End paginate links--}}
    @include('components.services.services_form')
</div>

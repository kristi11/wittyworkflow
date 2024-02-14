<div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mr-3">
        <div class="relative text-sm text-gray-800">
            <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                <x-icons.magnifying-glass />
            </div>

            <x-input wire:model.live="search" type="text" placeholder="Search service name or price" class="block ml-2 mr-2 my-2 w-full rounded-lg border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
        </div>

        <div class="flex justify-end col-span-2">

            {{--        <p class="bg-gray-200 flex justify-center mb-6 p-6 rounded-lg shadow-md text-gray-700 w-9/12">--}}
            {{--            {{ __('Please provide what services your business offers ') }}--}}
            {{--        </p>--}}
            <x-button class="my-2 hidden md:block" wire:click="addService">
                Add Service
            </x-button>
        </div>
    </div>
    <div class="bg-white overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">

        {{--Services table--}}
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
                    {{ __('Est. Hours') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Est. Minutes') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Extra Desc.') }}
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
    <div class="pt-4 flex justify-between items-center">
        <div class="text-gray-700 text-sm ml-3 mr-3">
            Services: {{ $services->total() }}
        </div>
        {{ $services->links(data : ['scrollTo' => false]) }}
    </div>
    {{--End paginate links--}}
    @include('components.services.services_form')
</div>

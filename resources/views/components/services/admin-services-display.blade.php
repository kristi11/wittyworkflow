<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mr-3">
        <div class="relative text-sm text-gray-800">
            <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                <x-icons.magnifying-glass />
            </div>

            <x-input wire:model.live="search" type="text" placeholder="Search service name or price" class="block ml-2 mr-2 my-2 w-full rounded-lg border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
        </div>

        <div class="flex justify-end col-span-2">
            <x-button class="my-2 hidden md:block" wire:click="addService">
                Add Service
            </x-button>
        </div>
    </div>
    <div class="bg-white overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">

        {{--Services table--}}
        <x-table.table>
            <x-slot name="head">
                <x-table.table-heading class="p-6">
                    {{ __('Service name') }}
                </x-table.table-heading>
                <x-table.table-heading class="p-6">
                    {{ __('Service Desc.') }}
                </x-table.table-heading>
                <x-table.table-heading class="p-6">
                    {{ __('Price') }}
                </x-table.table-heading>
                <x-table.table-heading class="p-6">
                    {{ __('Est. Hours') }}
                </x-table.table-heading>
                <x-table.table-heading class="p-6">
                    {{ __('Est. Minutes') }}
                </x-table.table-heading>
                <x-table.table-heading class="p-6">
                    {{ __('Extra Desc.') }}
                </x-table.table-heading>
                <x-table.table-heading class="flex justify-center">
                {{--Dropdown menu--}}
                </x-table.table-heading>
            </x-slot>
            <x-slot name="body">
                @forelse ($services as $service)
                    <tr class="bg-white border-b dark:bg-gray-700"
                        wire:loading.class.delay="opacity-50 dark:opacity-95" wire:key="{{ $service->id }}">
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ Str::words($service->name, 2, '...') }}
                        </td>
                        <td class="py-4 text-gray-900 dark:text-gray-200">
                            {{Str::words($service->description, 3, '...')}}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ '$ '.$service->price }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $service->estimated_hours.' hours' }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $service->estimated_minutes.' minutes' }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{Str::words($service->extra_description, 3, '...')}}
                        </td>

                        <td class="whitespace-nowrap p-3 text-sm">
                            <div class="flex items-center justify-end">
                                <x-menu>
                                    <x-menu.button class="rounded hover:bg-gray-100">
                                        <x-icons.ellipsis-horizontal />
                                    </x-menu.button>

                                    <x-menu.items>
                                        <x-menu.close>
                                            <x-menu.item class="flex items-center"
                                                wire:click="editService({{ $service->id }})"
                                            >
                                                <x-icons.edit/>
                                                Edit
                                            </x-menu.item>
                                        </x-menu.close>

                                        <x-menu.close>
                                            <x-menu.item
                                                wire:click="delete({{ $service->id }})"
                                                wire:confirm="Are you sure you want to delete this service?"
                                            >
                                                <x-icons.delete/>
                                                Delete
                                            </x-menu.item>
                                        </x-menu.close>
                                    </x-menu.items>
                                </x-menu>
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

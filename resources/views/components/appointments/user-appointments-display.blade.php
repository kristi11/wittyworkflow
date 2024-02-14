<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mr-3">
        <div class="relative text-sm text-gray-800">
            <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                <x-icons.magnifying-glass />
            </div>

            <x-input wire:model.live="search" type="text" placeholder="Search appointment name" class="block ml-2 mr-2 my-2 w-full rounded-lg border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
        </div>

        <div class="flex justify-end col-span-2">
            <x-button class="my-2 hidden md:block" wire:click="addAppointment">
                New appointment
            </x-button>
        </div>
    </div>

    <div class="overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">
        <x-table.table>
            <x-slot name="head">
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Apt. name') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Apt. date') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Apt. time') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Apt. status') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Your name') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Your email') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6 flex justify-center">
                    {{ __('Your phone') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Your message') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Your Referer') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{--Dropdown menu--}}
                </x-table.table-heading>
            </x-slot>
            <x-slot name="body">
                @forelse($userAppointments as $appointment)
                    <tr class="bg-white border-b dark:bg-gray-700"
                        wire:loading.class.delay="opacity-50"
                        wire:key="{{ $appointment->id }}"
                    >
                        <td class="px-6 py-4 text-gray-900 font- dark:text-gray-200">
                            {{ $appointment->name }}
                        </td>
                        <td class="py-4 text-gray-900 dark:text-gray-200">
                            {{ \Carbon\Carbon::parse($appointment->date)->format('D, d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}
                        </td>
                        @if($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'rescheduled')
                            <td class="px-6 py-4 text-orange-500 font-bold">
                                {{ ucwords(str_replace('_', ' ', $appointment->appointment_status)) }}
                            </td>
                        @elseif($appointment->appointment_status == 'cancelled' || $appointment->appointment_status == 'no_show')
                            <td class="px-6 py-4 text-red-500 font-bold">
                                {{ ucwords(str_replace('_', ' ', $appointment->appointment_status)) }}
                            </td>
                        @else
                            <td class="px-6 py-4 text-green-500 font-bold">
                                {{ ucwords(str_replace('_', ' ', $appointment->appointment_status)) }}
                            </td>
                        @endif
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $appointment->client_name }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            <a href="mailto:{{ $appointment->client_email }}" target="_blank" class="text-indigo-600 dark:text-indigo-300">{{ $appointment->client_email }}</a>
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $appointment->client_phone }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ Str::words($appointment->client_message, 3) }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $appointment->client_referer }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            <div class="flex justify-center">
                                @if($appointment->appointment_status == 'completed')
                                    <p class="text-green-500">
                                        {{ __('Appointment completed') }}
                                    </p>
                                @elseif($appointment->appointment_status == 'cancelled')
                                    <p class="text-red-500">
                                        {{ __('Appointment cancelled') }}
                                    </p>
                                @elseif($appointment->appointment_status == 'confirmed')
                                    <p class="flex items-center mr-3 text-green-500">
                                        {{ __('Appointment Confirmed') }}
                                    </p>
                                    <div class="flex items-center justify-end">
                                        <x-menu>
                                            <x-menu.button class="rounded hover:bg-gray-100">
                                                <x-icons.ellipsis-horizontal />
                                            </x-menu.button>

                                            <x-menu.items>
                                                <x-menu.close>
                                                    <x-menu.item
                                                        wire:click="delete({{ $appointment->id }})"
                                                        wire:confirm="Are you sure you want to delete this service?"
                                                    >
                                                        <x-icons.delete/>
                                                        Cancel appointment
                                                    </x-menu.item>
                                                </x-menu.close>
                                            </x-menu.items>
                                        </x-menu>
                                    </div>
                                @else
                                    <div class="flex items-center justify-end">
                                        <x-menu>
                                            <x-menu.button class="rounded hover:bg-gray-100">
                                                <x-icons.ellipsis-horizontal />
                                            </x-menu.button>

                                            <x-menu.items>
                                                <x-menu.close>
                                                    <x-menu.item class="flex items-center"
                                                                 wire:click="edit({{ $appointment->id }})"
                                                    >
                                                        <x-icons.edit/>
                                                        Edit appointment
                                                    </x-menu.item>
                                                </x-menu.close>

                                                <x-menu.close>
                                                    <x-menu.item
                                                        wire:click="delete({{ $appointment->id }})"
                                                        wire:confirm="Are you sure you want to delete this service?"
                                                    >
                                                        <x-icons.delete/>
                                                        Cancel appointment
                                                    </x-menu.item>
                                                </x-menu.close>
                                            </x-menu.items>
                                        </x-menu>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-700">
                        <td class="px-6 py-4 text-gray-900" colspan="11">
                            <div class="flex justify-evenly text-gray-400">
                                {{ __('No appointments found') }}
                            </div>
                        </td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table.table>
    </div>
    {{--Paginate links--}}
    <div class="pt-4 flex justify-between items-center">
        <div class="text-gray-700 text-sm ml-3 mr-3">
            Appointments: {{ $userAppointments->total() }}
        </div>
        {{ $appointments->links(data : ['scrollTo' => false]) }}
    </div>
    @include('components.appointments.user-appointments-form')
</div>

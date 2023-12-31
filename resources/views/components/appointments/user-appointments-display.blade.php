<div class="flex justify-end mr-3">
{{--    <p class="bg-gray-200 flex justify-center mb-6 p-6 rounded-lg shadow-md text-gray-700 w-9/12 invisible md:visible">--}}
{{--        {{ __('Here you can manage your appointments') }}--}}
{{--    </p>--}}
    <x-button class="mb-5 " wire:click="addAppointment">
        New appointment
    </x-button>
</div>

<div class="overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">
    <x-table.table>
        <x-slot name="head">
            <x-table.table-heading class="px-6 py-6">
                {{ __('Appointment name') }}
            </x-table.table-heading>
            <x-table.table-heading class="px-6 py-6">
                {{ __('Appointment date') }}
            </x-table.table-heading>
            <x-table.table-heading class="px-6 py-6">
                {{ __('Appointment time') }}
            </x-table.table-heading>
            <x-table.table-heading class="px-6 py-6">
                {{ __('Appointment status') }}
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
                {{ __('Actions') }}
            </x-table.table-heading>
        </x-slot>
        <x-slot name="body">
            @forelse($userAppointments as $appointment)
                <tr class="bg-white border-b dark:bg-gray-700"
                    wire:loading.class.delay="opacity-50"
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
                                <x-danger-button wire:click="delete({{ $appointment->id }})" wire:confirm="Are you sure you want to cancel this appointment?">
                                    {{ __('Cancel appointment') }}
                                </x-danger-button>
                                @else
                                <x-secondary-button wire:click="edit({{ $appointment->id }})" class="mr-3">
                                    {{ __('Edit') }}
                                </x-secondary-button>
                                <x-danger-button wire:click="delete({{ $appointment->id }})" wire:confirm="Are you sure you want to cancel this appointment?">
                                    {{ __('Cancel appointment') }}
                                </x-danger-button>
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
@include('components.appointments.user-appointments-form')

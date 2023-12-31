<form wire:submit="changeStatus">
    <x-dialog-modal wire:model="showAppointmentsModal">
        <x-slot name="title">Appointments</x-slot>

        <x-slot name="content">
            @if($readonly)

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="name" value="{{ __('Appointment for') }}" />
                    <x-input id="name"
                           wire:model.blur="name"
                           type="text"
                           class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent dark:bg-gray-800" readonly />
                    <x-input-error for="name" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="date" value="{{ __('Appointment date') }}" />
                    <x-input id="date"
                           wire:model.blur="date"
                           type="date"
                           class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent" readonly />
                    <x-input-error for="date" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="appointment_time" value="{{ __('Appointment time') }}" />
                    <x-input id="appointment_time"
                           wire:model.blur="appointment_time"
                           type="time"
                           class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent" readonly />
                    <x-input-error for="appointment_time" class="mt-2"/>
                </div>

                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="appointment_status" value="{{ __('Appointment status') }}" />
                        <select id="appointment_status"
                                wire:model.blur.blur="appointment_status"
                                type="text"
                                class="mt-1 block w-full border-gray-300
                                     focus:border-indigo-300 focus:ring
                                      focus:ring-indigo-200 focus:ring-opacity-50
                                       rounded-md shadow-sm dark:bg-gray-900">
                            <option value="" class="font-bold" selected>Appointment status</option>
                            @foreach(\App\Models\Functionality::APPOINTMENT_STATUS as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="appointment_status" class="mt-2"/>
                    </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_name" value="{{ __('User name') }}" />
                    <x-input id="client_name"
                             value="{{ auth()->user()->name }}"
                             wire:model.blur="client_name"
                             type="text"
                             class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent"
                             readonly/>
                    <x-input-error for="client_name" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_email" value="{{ __('User email') }}" />
                    <x-input id="client_email"
                             wire:model.blur="client_email"
                             value=" {{ auth()->user()->email }}"
                             type="email"
                             class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent"
                             readonly/>
                    <x-input-error for="client_email" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_phone" value="{{ __('User phone') }}" />
                    <x-input id="client_phone"
                             wire:model.blur="client_phone"
                             value="{{ auth()->user()->phone }}"
                             type="tel"
                             class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent"
                             readonly/>
                    <x-input-error for="client_phone" class="mt-2"/>
                </div>
            @endif
                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_message" value="{{ __('Extra requirements') }}" />
                    <textarea rows="10"
                            id="client_message"
                              wire:model.blur="client_message"
                              type="text"
                              class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent dark:bg-gray-900"
                              readonly></textarea>
                    <x-input-error for="client_message" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_referer" value="{{ __('Referral') }}" />
                    <x-input id="client_referer"
                           wire:model.blur="client_referer"
                           type="text"
                           class="mt-1 block w-full border-gray-300
                                     focus:border-indigo-300 focus:ring
                                      focus:ring-indigo-200 focus:ring-opacity-50
                                       rounded-md shadow-sm border-transparent" readonly />
                    <x-input-error for="client_referer" class="mt-2"/>
                </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showAppointmentsModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button type="submit">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</form>

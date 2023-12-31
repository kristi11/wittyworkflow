<form wire:submit="save">
    <x-dialog-modal wire:model="showAppointmentsModal">
        <x-slot name="title">Appointments</x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="name" value="{{ __('Appointment name') }}" />
                <select id="name"
                        wire:model.blur="name"
                        type="text"
                        class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm">
                    <option value="" class="font-bold" selected>Appointment name</option>
                    @foreach($services as $service)
                        <option value="{{ $service->name }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="name" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="date" value="{{ __('Appointment date') }}" />
                <input id="date"
                       wire:model="date"
                       type="date"
                       class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm">
                <x-input-error for="date" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="appointment_time" value="{{ __('Appointment time') }}" />
                <input id="appointment_time"
                       wire:model="appointment_time"
                       type="time"
                       class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm">
                <x-input-error for="appointment_time" class="mt-2"/>
            </div>
            @if($readonly)

                @can('is_admin_or_staff_member')
                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="appointment_status" value="{{ __('Appointment status') }}" />
                        <select id="appointment_status"
                                wire:model.blur="appointment_status"
                                type="text"
                                class="mt-1 block w-full border-gray-300
                                     focus:border-indigo-300 focus:ring
                                      focus:ring-indigo-200 focus:ring-opacity-50
                                       rounded-md shadow-sm">
                            <option value="" class="font-bold" selected>Appointment status</option>
                            @foreach(\App\Models\Functionality::APPOINTMENT_STATUS as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="appointment_status" class="mt-2"/>
                    </div>
                @endcan

            @can('is_user')
                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="appointment_status" value="{{ __('Appointment status') }}" />
                    <x-input id="appointment_status"
                           wire:model="appointment_status"
                           type="text"
                           class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent"
                             readonly/>
                    <x-input-error for="appointment_status" class="mt-2"/>
                </div>
            @endcan

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="client_name" value="{{ __('User name') }}" />
                <x-input id="client_name"
                       value="{{ auth()->user()->name }}"
                       wire:model="client_name"
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
                           wire:model="client_email"
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
                       wire:model="client_phone"
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
            @can('is_admin_or_staff_member')
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="client_message" value="{{ __('Extra requirements') }}" />
                <textarea id="client_message"
                          wire:model="client_message"
                          type="text"
                          class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm border-transparent"
                placeholder="If you have any questions or comments, please let us know!"
                readonly></textarea>
                <x-input-error for="client_message" class="mt-2"/>
            </div>


                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_referer" value="{{ __('Referral') }}" />
                    <input id="client_referer"
                           wire:model="client_referer"
                           type="text"
                           class="mt-1 block w-full border-gray-300
                                     focus:border-indigo-300 focus:ring
                                      focus:ring-indigo-200 focus:ring-opacity-50
                                       rounded-md shadow-sm border-transparent" readonly>
                    <x-input-error for="client_referer" class="mt-2"/>
                </div>
            @endcan
            @can('is_user')
                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_message" value="{{ __('Extra requirements') }}" />
                    <textarea id="client_message"
                              wire:model="client_message"
                              type="text"
                              class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm"
                              placeholder="If you have any questions or comments, please let us know!"
                              ></textarea>
                    <x-input-error for="client_message" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="client_referer" value="{{ __('Who referred you?') }}" />
                    <input id="client_referer"
                           wire:model="client_referer"
                           type="text"
                           class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm"
                           placeholder="If you were referred by a friend, please let us know who so we can thank them!">
                    <x-input-error for="client_referer" class="mt-2"/>
                </div>
            @endcan
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

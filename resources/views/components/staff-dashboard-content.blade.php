@can('is_staff_member')
    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.appointments/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('appointments') }}" wire:navigate>Appointments</a>
            </h2>
        </div>


        @if($appointmentsVisibility == 0)
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                Appointments are disabled.
            </p>

        @else

            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                Here you can manage the appointments.
            </p>

            <p class="mt-4 text-sm">
                <a href="{{ route('appointments') }}" wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                    @if(count($appointments) == 0)
                        {{ 'There\'s no appointments at this time' }}
                    @elseif(count($appointments) == 1)
                        {{ count($appointments). ' upcoming appointment' }}
                    @else
                        {{ count($appointments). ' upcoming appointments' }}
                    @endif
                    <x-icons.right-carret/>
                </a>
            </p>
        @endif
    </div>
    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.business-hours/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('businessHours') }}">Business hours</a>
            </h2>

        </div>

        @forelse($businessHours as $hours)
            <p class="mt-1 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                {{ ucwords($hours->day) . ' - ' . (ucwords($hours->open ? 'open' : 'closed')) . ($hours->open ? (' from ' . \Carbon\Carbon::parse($hours->open_from)->format('g:i A') . ' to ' . \Carbon\Carbon::parse($hours->open_until)->format('g:i A')) : '') }}
            </p>
        @empty
            <p class="mt-1 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                This business hasn't set their business hours yet.
            </p>
        @endforelse
    </div>
@endcan

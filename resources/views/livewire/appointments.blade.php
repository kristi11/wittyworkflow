<div>
    @if(!$appointmentsVisibility)
        <div class="flex justify-evenly">
            <p class="bg-gray-200 flex justify-center mb-6 p-6 rounded-lg shadow-md text-gray-700 w-9/12 dark:bg-gray-800 dark:text-gray-400">
                {{ __('Appointments are disabled') }}
            </p>
        </div>
    @else
        @can('is_admin_or_staff_member')
            @include('components.appointments.admin-appointments-display')
        @endcan
        @can('is_user')
            @include('components.appointments.user-appointments-display')
        @endcan
    @endif
</div>

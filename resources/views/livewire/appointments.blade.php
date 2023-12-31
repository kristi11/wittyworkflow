<div>
    @can('is_admin')
        @include('components.appointments.admin-appointments-display')
    @endcan
    @can('is_user')
        @include('components.appointments.user-appointments-display')
    @endcan
</div>

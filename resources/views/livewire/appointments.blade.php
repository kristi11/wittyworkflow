<div>
    @can('is_admin_or_staff_member')
        @include('components.appointments.admin-appointments-display')
    @endcan
    @can('is_user')
        @include('components.appointments.user-appointments-display')
    @endcan
</div>

<div>
    @can('is_admin')
        @include('components.gallery.admin-gallery')
    @endcan
    @can('is_user')
        @include('components.gallery.customer-gallery')
    @endcan
</div>

<div>
    @can('is_user')
        <x-services.user-services-display :flexiblePricing="$flexiblePricing" :appointmentsVisibility="$appointmentsVisibility" :customerServices="$customerServices" :service="$service"/>
    @endcan
    @can('is_admin')
        <x-services.admin-services-display :services="$services"/>
    @endcan
</div>

<div>
    <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <x-guest.guest-socials :social="$social"/>
            <x-guest.guest-address-display :address="$address"/>
            <x-guest.guest-services-display :service="$service" :services="$services"/>
        </div>
    </section>
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <x-guest.guest-hours-display :hours="$hours"/>
        </div>
    </section>
    <section class="bg-white border-b py-8">

            <x-guest.guest-gallery-display :gallery="$gallery" :galleries="$galleries"/>

{{--        <x-guest.guest-login-to-see-more :galleries="$galleries"/>--}}
    </section>
    @if($hero['waves'] == 1)
        <x-guest-email-waves/>
    @endif
    <section class="container mx-auto text-center py-6 mb-12">
        <x-guest.guest-email-form-display :admins="$admins"/>
{{--        @error('email')--}}
{{--            <span class="text-xs text-red-500">--}}
{{--                {{ $message }}--}}
{{--            </span>--}}
{{--        @enderror--}}
    </section>
</div>

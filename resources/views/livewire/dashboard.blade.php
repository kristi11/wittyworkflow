<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 dark:bg-gray-800">
        <x-application-logo class="block h-12 w-auto" />

        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-gray-100">
            Welcome to {{ config('app.name', 'Everything Hair Salon')}}!
        </h1>

        @can('is_admin')
            <p class="mt-6 text-gray-500 leading-relaxed dark:text-gray-200">
                This is the administrator's dashboard for {{ config('app.name', 'Everything Hair Salon')}}. Here you have administrative access to the system. You can view all the users in the system, change a user's role, view all the appointments in the system and much more.
            </p>
        @endcan

        @can('is_user')
            <p class="mt-6 text-gray-500 leading-relaxed dark:text-gray-200">
                This is the customer's dashboard for {{ config('app.name', 'Everything Hair Salon')}}. Here you can manage your appointments, view detailed version of the services, and much more to be added in the future.
            </p>
        @endcan

    </div>

    <div class="bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        <x-admin-dashboard-content :users="$users" :address="$address" :services="$services" :businessHours="$businessHours" :appointments="$appointments" :galleries="$galleries" :socials="$socials" :seo="$seo"/>
        <x-user_dashboard_content :address="$address" :services="$services" :businessHours="$businessHours" :userAppointments="$userAppointments" :galleries="$galleries" :socials="$socials"/>
    </div>
</div>

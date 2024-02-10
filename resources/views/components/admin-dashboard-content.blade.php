@can('is_admin')
    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.users-icon/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('users') }}" wire:navigate>Users</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Here you can manage the users in the system.
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('users') }}" wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                @if(count($users) == 0)
                    {{ 'No users' }}
                @elseif(count($users) == 1)
                    {{ count($users). ' user' }}
                @else
                    {{ count($users). ' users' }}
                @endif
                <x-icons.right-carret/>
            </a>
        </p>
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.appointments/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('appointments') }}" wire:navigate>Appointments</a>
            </h2>
            <div class="flex space-x-4 pl-2">
                <button wire:click="toggleAppointmentsVisibility" class="bg-indigo-100 dark:bg-gray-700 dark:hover:bg-gray-800 dark_bg-indigo-200 flex h-8 items-center justify-center rounded-full shadow-md w-8">
                    @if($appointmentsVisibility)
                        <x-icons.x-mark/>
                    @else
                        <x-icons.checkmark/>
                @endif
            </div>
        </div>
        @if(!$appointmentsVisibility)
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                Appointments are disabled. Click above to enable them.
            </p>

        @else

            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                Here you can manage the appointments. Click above to disable the appointments.
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
            <x-icons.landingpage-hero/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('hero') }}">Landingpage hero</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            The landingpage hero is the first thing a user sees when they visit the public page of your website. Here you can change the text and image of the landingpage hero. You can also change the background color or chose a gradient background (a two-tone color background transitioning from one color to another) for a smoother viewing experience. You can also enable waves for a more dynamic viewing experience.
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('hero') }}"  wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Check the landingpage hero

                <x-icons.right-carret/>
            </a>
        </p>
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.dashboard-address/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('address') }}">Address</a>
            </h2>

        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Here you can manage your address.
        </p>

        @if($address)
            <p class="mt-4 text-indigo-600 hover:text-indigo-700 font-semibold text-sm leading-relaxed dark:text-indigo-300">
                <a href="https://www.google.com/maps/search/{{ urlencode($address->street . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip) }}" target="_blank">
                    {{$address->street . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip }}
                </a>
            </p>
            <p class="mt-4 text-sm">
                <a href="{{ route('address') }}"  wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                    Check your address
                    <x-icons.right-carret/>
                </a>
            </p>
        @else
            You haven't set your address yet.
        @endif
    </div>
    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.dashboard-services/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                Services
            </h2>
            <div class="flex space-x-4 pl-2">
                <button wire:click="togglePricing" class="bg-indigo-100 dark:bg-gray-700 dark:hover:bg-gray-800 dark_bg-indigo-200 flex h-8 items-center justify-center rounded-full shadow-md w-8">
                    @if($flexiblePricing)
                        <x-icons.x-mark/>
                    @else
                        <x-icons.checkmark/>
                    @endif
            </div>
        </div>

        @if($flexiblePricing)
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                Here you can manage the services in the system. Flexible pricing is enabled. Click above to disable it.
            </p>
        @else
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                Here you can manage the services in the system. Flexible pricing is disabled. Click above to enable it.
            </p>
        @endif


        @if(count($services) == 0)
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                You have no services in the system.
            </p>
        @elseif(count($services) == 1)
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                You have 1 service in the system.
            </p>
        @else
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                You have {{ count($services) }} services in the system.
            </p>
        @endif
        <p class="mt-4 text-sm">
            <a href="{{ route('services') }}"  wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Check your services
                <x-icons.right-carret/>
            </a>
        </p>
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.business-hours/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('businessHours') }}">Business hours</a>
            </h2>
            <div class="flex space-x-4 pl-2">
                <button wire:click="toggleAlwaysOpen" class="bg-indigo-100 dark:bg-gray-700 dark:hover:bg-gray-800 dark_bg-indigo-200 flex h-8 items-center justify-center rounded-full shadow-md w-8">
                    @if($alwaysOpen)
                        <x-icons.x-mark/>
                    @else
                        <x-icons.checkmark/>
                @endif
            </div>

        </div>

        @if($alwaysOpen)
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                This business is always open. Click above to change the status.
            </p>

        @else
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                Here you can manage your business hours.
            </p>

            @forelse($businessHours as $hours)
                <p class="mt-1 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                    {{ ucwords($hours->day) . ' - ' . (ucwords($hours->open ? 'open' : 'closed')) . ($hours->open ? (' from ' . \Carbon\Carbon::parse($hours->open_from)->format('g:i A') . ' to ' . \Carbon\Carbon::parse($hours->open_until)->format('g:i A')) : '') }}
                </p>
            @empty
                <p class="mt-1 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                    You haven't set your business hours yet.
                </p>
            @endforelse
            <p class="mt-4 text-sm">
                <a href="{{ route('businessHours') }}"  wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                    Check your business hours
                    <x-icons.right-carret/>
                </a>
            </p>
        @endif
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.gallery/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('gallery') }}">Gallery</a>
            </h2>

        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Here you can manage your gallery.
        </p>

        <p class="flex gap-1 leading-relaxed mt-4 text-gray-500 text-sm">
            @forelse($galleries as $gallery)
                <img class="h-8 w-8 object-cover rounded-full" src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="{{ $gallery->path }}">
            @empty
                <span class="dark:text-gray-200">{{ 'You haven\'t uploaded any images' }}</span>
            @endforelse
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('gallery') }}" wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Check full gallery
                <x-icons.right-carret/>
            </a>
        </p>
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.social-networks/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('gallery') }}">Social Networks</a>
            </h2>

        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed mb-4 dark:text-gray-200">
            Here you can manage your social networks.
        </p>

        @if($socials)
            @if(empty($socials->instagram) && empty($socials->facebook) && empty($socials->twitter) && empty($socials->linkedin))
                <p class="mt-4 text-gray-500 text-sm leading-relaxed mb-4">
                    Your socials list is empty. Go to you socials and add some.
                </p>
            @else
                <div class="flex gap-6">

                    @if(!empty($socials->instagram))
                        <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-4 text-center" href="{{ 'https://www.instagram.com/'.$socials->instagram }}">
                            <x-svg.instagram-s-v-g/>
                        </a>
                    @endif

                    @if(!empty($socials->facebook))
                        <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-4 text-center" href="{{ 'https://www.facebook.com/profile.php?id='.$socials->facebook }}">
                            <x-svg.facebook-s-v-g/>
                        </a>
                    @endif

                    @if(!empty($socials->twitter))
                        <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-4 text-center" href="{{ 'https://www.twitter.com/'.$socials->twitter }}">
                            <x-svg.twitter-s-v-g/>
                        </a>
                    @endif

                    @if(!empty($socials->linkedin))
                        <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-4 text-center" href="{{ 'https://www.linkedin.com/in/'.$socials->linkedin }}">
                            <x-svg.linkedin-s-v-g/>
                        </a>
                    @endif
                </div>
            @endif
        @endif

        <p class="text-sm">
            <a href="{{ route('socials') }}" wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Check your socials
                <x-icons.right-carret/>
            </a>
        </p>
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.s-e-o/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('seo') }}">SEO</a>
            </h2>

        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Here you can manage your SEO. Proper SEO will help your website rank higher in search engines.
        </p>

        @if($seo)
            <p class="mt-1 text-gray-500 text-sm font-semibold leading-relaxed dark:text-gray-200">
                {{ $seo->title !== null && $seo->title !== '' ? 'Title: '.$seo->title : 'Title: '.config('app.name') }}

            </p>
            <p class="mt-1 text-gray-500 text-sm font-semibold leading-relaxed dark:text-gray-200">
                {{ $seo->description !== null && $seo->description !== '' ? 'Description: '.Str::words($seo->description.'...',5) : 'You haven\'t set your SEO description yet.' }}
            </p>
        @else
            <p class="mt-1 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                You haven't set your SEO details yet.
            </p>
        @endif
        <p class="mt-4 text-sm">
            <a href="{{ route('seo') }}"  wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Check your SEO details
                <x-icons.right-carret/>
            </a>
        </p>
    </div>
@endcan

@can('is_user')
    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.appointments/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('appointments') }}" wire:navigate>Appointments</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Here you can manage your appointments.
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('appointments') }}" wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                @if(count($userAppointments) == 0)
                    {{ 'You don\'t have any appointments' }}
                @elseif(count($userAppointments) == 1)
                    {{ count($userAppointments). ' upcoming appointment' }}
                @else
                    {{ count($userAppointments). ' upcoming appointments' }}
                @endif
                <x-icons.right-carret/>
            </a>
        </p>
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.dashboard-address/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="#">Address</a>
            </h2>

        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            The current business address:
        </p>

        @if($address)
            <p class="mt-4 text-indigo-600 hover:text-indigo-700 font-semibold text-sm leading-relaxed dark:text-indigo-300">
                <a href="https://www.google.com/maps/search/{{ urlencode($address->street . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip) }}" target="_blank">
                    {{$address->street . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip }}
                </a>
            </p>
        @else
            This business hasn't set an address yet.
        @endif
    </div>
    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.dashboard-services/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                Services
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Check services below or click <a href="{{ route('services') }}" wire:navigate class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">here</a> to view a detailed version.
        </p>

{{--        <p class="mt-4 text-gray-600 text-sm leading-relaxed">--}}
{{--            Current services offered by this business:--}}
{{--        </p>--}}

        @if($services)
            <div class="px-4">
                <ul>
                    @foreach($services as $service)
                        <li class="mt-1 text-gray-500 text-sm leading-relaxed hover:underline cursor-pointer font-semibold dark:text-gray-200">
                            @if($service->estimated_hours <= '1' && $service->estimated_minutes == '0' || $service->estimated_hours <= '1' && $service->estimated_minutes == '00')
                                {{ $service->name.', '.'$'.$service->price.', '.$service->estimated_hours.' hour' }}
                            @elseif($service->estimated_hours >= '1' && $service->estimated_minutes == '0' || $service->estimated_hours >= '1' && $service->estimated_minutes == '00')
                                {{ $service->name.', '.'$'.$service->price.', '.$service->estimated_hours.' hours' }}
                            @else
                                {{ $service->name.', '.'$'.$service->price.', '.$service->estimated_hours.':'.$service->estimated_minutes.' hours' }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @else(count($services) == 1)
            <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                This business hasn't listed any services yet.
            </p>
        @endif
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.business-hours/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="#">Business hours</a>
            </h2>

        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Business hours for this business:
        </p>

        @forelse($businessHours as $hours)
            <p class="mt-1 text-gray-500 text-sm leading-relaxed font-semibold dark:text-gray-200">
                {{ ucwords($hours->day) . ' - ' . (ucwords($hours->open ? 'open' : 'closed')) . ($hours->open ? (' from ' . \Carbon\Carbon::parse($hours->open_from)->format('g:i A') . ' to ' . \Carbon\Carbon::parse($hours->open_until)->format('g:i A')) : '') }}
            </p>
        @empty
            <p class="mt-1 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
                This business hasn't set any business hours yet.
            </p>
        @endforelse
    </div>

    <div class="bg-indigo-50 dark:bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="flex items-center">
            <x-icons.gallery/>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-gray-100">
                <a href="{{ route('gallery') }}">Gallery</a>
            </h2>

        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed dark:text-gray-200">
            Here you can check the gallery of this business.
        </p>

        <p class="flex gap-1 leading-relaxed mt-4 text-gray-500 text-sm">
            @forelse($galleries as $gallery)
                @if($gallery->path)
                    @if($gallery->path !== 'services.jpg')
                        <img src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Service images" class="h-8 w-8 object-cover rounded-full">
                    @else
                        <img src="{{ Storage::disk('serviceImages')->url('serviceImages/services.jpg') }}" alt="Service images" class="h-8 w-8 object-cover rounded-full">
                    @endif
                @endif
{{--                <img class="h-8 w-8 object-cover rounded-full" src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="{{ $gallery->path }}">--}}
            @empty
                {{ 'This business hasn\'t uploaded any images' }}
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
            Here you can check the social networks of this business.
        </p>

        @if($socials)
            @if(empty($socials->instagram) && empty($socials->facebook) && empty($socials->twitter) && empty($socials->linkedin))
                <p class="mt-4 text-gray-500 text-sm leading-relaxed mb-4">
                    This business hasn't set any social networks yet.
                </p>
            @else
                <div class="flex gap-6">

                    @if(!empty($socials->instagram))
                        <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-4 text-center" href="{{ 'https://www.instagram.com/'.$socials->instagram }}">
                            <x-svg.instagram-s-v-g/>
                        </a>
                    @endif

                    @if(!empty($socials->facebook))
                        <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-4 text-center" href="{{ 'https://www.facebook.com/'.$socials->facebook }}">
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
    </div>
@endcan

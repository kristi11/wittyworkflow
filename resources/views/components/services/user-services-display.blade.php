<div class="md:grid md:grid-cols-3 md:gap-6">

    <x-dialog-modal wire:model="showServicesDescriptionModal">
        <x-slot name="title" class="font-bold pb-4 text-2xl text-black dark:text-gray-100">{{ $service->name }}</x-slot>

        <x-slot name="content">
            <ul>
                <li>
                    <h2 class="font-medium text-gray-600 text-sm pb-2 dark:text-gray-400">
                        {{ $service->description}}</h2>
                </li>
                <li>
                    @if($service->price !== null)
                        @if($flexiblePricing)
                            <h2 class="text-gray-500 text-sm">{{ 'Price starts at $'.$service->price }}</h2>
                        @else
                            <h2 class="text-gray-500 text-sm">{{ 'Price: $'.$service->price }}</h2>
                        @endif
                    @endif
                </li>
                <li>
                    <h2 class="text-gray-500 text-sm pb-2 dark:text-gray-200">
                        {{--                         @if($service->estimated_hours <= '1' && $service->estimated_minutes == '0' || $service->estimated_hours <= '1' && $service->estimated_minutes == '00')--}}
                        {{--                             {{'This service takes about '.$service->estimated_hours.' hour to complete' }}--}}
                        {{--                         @elseif($service->estimated_hours >= '1' && $service->estimated_minutes == '0' || $service->estimated_hours >= '1' && $service->estimated_minutes == '00')--}}
                        {{--                             {{ 'This service takes about '.$service->estimated_hours.' hours to complete' }}--}}
                        {{--                         @else--}}
                        {{--                             {{ 'This service takes about '.$service->estimated_hours.':'.$service->estimated_minutes.' hours to complete' }}--}}
                        {{--                         @endif--}}
                        @if($service->estimated_hours !== null && $service->estimated_minutes !== null)
                            {{ 'This service takes about ' }}
                            @php
                                $displayedValues = [];
                                if($service->estimated_hours > 0) {
                                    $displayedValues[] = $service->estimated_hours . ($service->estimated_hours == 1 ? ' hour' : ' hours');
                                }
                                if($service->estimated_minutes > 0) {
                                    $displayedValues[] = $service->estimated_minutes . ' minute' . ($service->estimated_minutes == 1 ? '' : 's');
                                }
                            @endphp

                            @if(count($displayedValues) > 1)
                                {{ implode(' and ', $displayedValues) }}
                            @else
                                {{ $displayedValues[0] }}
                            @endif

                        @elseif($service->estimated_hours !== null)
                            {{ 'This service takes about '.$service->estimated_hours.' hour'.($service->estimated_hours == 1 ? '' : 's') }}
                        @elseif($service->estimated_minutes !== null)
                            {{ 'This service takes about '.$service->estimated_minutes.' minute'.($service->estimated_minutes == 1 ? '' : 's') }}
                        @endif
                    </h2>
                </li>

                <li>
                    <h2 class="text-gray-600 text-sm dark:text-gray-400">{{ $service->extra_description }}</h2>
                </li>
            </ul>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showServicesDescriptionModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            @if($appointmentsVisibility)
                <a href="{{ route('appointments') }}" wire:navigate>
                    <x-secondary-button class="ml-3">
                        <x-icons.book-appointment/>
                        &nbsp{{ __('Book') }}
                    </x-secondary-button>
                </a>
            @endif
            {{--             <a href="{{ route('appointments') }}" wire:navigate>--}}
            {{--                 <x-button class="ml-3">--}}
            {{--                     <x-icons.book-appointment/>--}}
            {{--                     &nbsp{{ __('Book') }}--}}
            {{--                 </x-button>--}}
            {{--             </a>--}}
        </x-slot>
    </x-dialog-modal>
    @foreach($customerServices as $service)
        <div class="mt-5 md:mt-0 md:col-span-1">
            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md }}">
                <ul>
                    <li class="border-b-4 mb-6">
                        <h1 class="font-bold pb-4 text-2xl text-center dark:text-gray-100">{{ $service->name }}</h1>
                    </li>
                    <li>
                        <h2 class="font-medium text-gray-600 text-sm pb-2 dark:text-gray-400">
                            {{ Str::words($service->description, 15) }} <button href="#" wire:click="serviceDescription({{$service->id}})" class="font-semibold text-indigo-600 dark:text-indigo-300">Read more</button></h2>
                    </li>
                    <li>
                        @if($service->price !== null)
                            @if($flexiblePricing)
                                <h2 class="text-gray-500 text-sm">{{ 'Price starts at $'.$service->price }}</h2>
                            @else
                                <h2 class="text-gray-500 text-sm">{{ 'Price: $'.$service->price }}</h2>
                            @endif
                        @endif

                    </li>
                    <li>
                        <h2 class="text-gray-500 text-sm pb-2 dark:text-gray-200">
                            {{--                    @if($service->estimated_hours <= '1' && $service->estimated_minutes == '0' || $service->estimated_hours <= '1' && $service->estimated_minutes == '00')--}}
                            {{--                        {{'This service takes about '.$service->estimated_hours.' hour to complete' }}--}}
                            {{--                    @elseif($service->estimated_hours >= '1' && $service->estimated_minutes == '0' || $service->estimated_hours >= '1' && $service->estimated_minutes == '00')--}}
                            {{--                        {{ 'This service takes about '.$service->estimated_hours.' hours to complete' }}--}}
                            {{--                    @else--}}
                            {{--                        {{ 'This service takes about '.$service->estimated_hours.':'.$service->estimated_minutes.' hours to complete' }}--}}
                            {{--                    @endif--}}
                            @if($service->estimated_hours !== null && $service->estimated_minutes !== null)
                                {{ 'This service takes about ' }}
                                @php
                                    $displayedValues = [];
                                    if($service->estimated_hours > 0) {
                                        $displayedValues[] = $service->estimated_hours . ($service->estimated_hours == 1 ? ' hour' : ' hours');
                                    }
                                    if($service->estimated_minutes > 0) {
                                        $displayedValues[] = $service->estimated_minutes . ' minute' . ($service->estimated_minutes == 1 ? '' : 's');
                                    }
                                @endphp

                                @if(count($displayedValues) > 1)
                                    {{ implode(' and ', $displayedValues) }}
                                @else
                                    {{ $displayedValues[0] }}
                                @endif

                            @elseif($service->estimated_hours !== null)
                                {{ 'This service takes about '.$service->estimated_hours.' hour'.($service->estimated_hours == 1 ? '' : 's') }}
                            @elseif($service->estimated_minutes !== null)
                                {{ 'This service takes about '.$service->estimated_minutes.' minute'.($service->estimated_minutes == 1 ? '' : 's') }}
                            @endif


                        </h2>
                    </li>

                    <li>
                        <h2 class="text-gray-600 text-sm dark:text-gray-400">{{ $service->extra_description }}</h2>
                    </li>
                </ul>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                {{--            <a href="{{ route('appointments') }}" wire:navigate>--}}
                {{--                <x-secondary-button class="ml-3">--}}
                {{--                    <x-icons.book-appointment/>--}}
                {{--                    &nbsp{{ __('Book') }}--}}
                {{--                </x-secondary-button>--}}
                {{--            </a>--}}
                @if($appointmentsVisibility)
                    <a href="{{ route('appointments') }}" wire:navigate>
                        <x-secondary-button class="ml-3">
                            <x-icons.book-appointment/>
                            &nbsp{{ __('Book') }}
                        </x-secondary-button>
                    </a>
                @endif

                <a href="{{ route('gallery') }}" wire:navigate>
                    <x-button class="ml-3" >
                        {{ __('Images') }}
                    </x-button>
                </a>
            </div>
        </div>
    @endforeach

</div>


<div class="">
    @if($service->count() !== 0)
    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 mt-20">
        What we offer
    </h2>
    <div class="w-full mb-4">
        <div class="h-1 mx-auto gradient w-64  opacity-25 my-0 py-0 rounded-t"></div>
    </div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-dialog-modal wire:model="showServicesDescriptionModal">
            <x-slot name="title" class="font-bold pb-4 text-2xl text-black">{{ $service->name }}</x-slot>

            <x-slot name="content">
                <ul>
                    <li>
                        <h2 class="font-medium text-gray-600 text-sm pb-2">
                            {{ $service->description}}</h2>
                    </li>
                    <li>
                        <h2 class="text-gray-500 text-sm">{{ 'This service costs $'.$service->price }}</h2>
                    </li>
                    <li>
                        <h2 class="text-gray-500 text-sm pb-2">
                            @if($service->estimated_hours <= '1' && $service->estimated_minutes == '0' || $service->estimated_hours <= '1' && $service->estimated_minutes == '00')
                                {{'This service takes about '.$service->estimated_hours.' hour to complete' }}
                            @elseif($service->estimated_hours >= '1' && $service->estimated_minutes == '0' || $service->estimated_hours >= '1' && $service->estimated_minutes == '00')
                                {{ 'This service takes about '.$service->estimated_hours.' hours to complete' }}
                            @else
                                {{ 'This service takes about '.$service->estimated_hours.':'.$service->estimated_minutes.' hours to complete' }}
                            @endif
                        </h2>
                    </li>

                    <li>
                        <h2 class="text-gray-600 text-sm">{{ $service->extra_description }}</h2>
                    </li>
                </ul>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showServicesDescriptionModal', false)" class="mr-2"> Cancel
                </x-secondary-button>
                <a href="{{ route('appointments') }}" wire:navigate>
                    <x-button class="ml-3">
                        <x-icons.book-appointment/>
                        &nbsp{{ __('Book') }}
                    </x-button>
                </a>
            </x-slot>
        </x-dialog-modal>
        @forelse($services as $service)
            <div class="mt-5 md:mt-0 md:col-span-1">
                <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md }}">
                    <ul>
                        <li class="border-b-4 mb-6">
                            <h1 class="font-bold pb-4 text-2xl text-center text-black">{{ $service->name }}</h1>
                        </li>
                        <li>
                            <h2 class="font-medium text-gray-600 text-sm pb-2">
                                {{ Str::words($service->description, 15) }} <button href="#" wire:click="showServicesDescription({{$service->id}})" class="font-semibold text-indigo-600">Read more</button></h2>
                        </li>
                        <li>
                            <h2 class="text-gray-500 text-sm">{{ 'This service costs $'.$service->price }}</h2>
                        </li>
                        <li>
                            <h2 class="text-gray-500 text-sm pb-2">
                                @if($service->estimated_hours <= '1' && $service->estimated_minutes == '0' || $service->estimated_hours <= '1' && $service->estimated_minutes == '00')
                                    {{'This service takes about '.$service->estimated_hours.' hour to complete' }}
                                @elseif($service->estimated_hours >= '1' && $service->estimated_minutes == '0' || $service->estimated_hours >= '1' && $service->estimated_minutes == '00')
                                    {{ 'This service takes about '.$service->estimated_hours.' hours to complete' }}
                                @else
                                    {{ 'This service takes about '.$service->estimated_hours.':'.$service->estimated_minutes.' hours to complete' }}
                                @endif
                            </h2>
                        </li>
                    </ul>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <a href="{{ route('appointments') }}" wire:navigate>
                        <x-secondary-button class="ml-3">
                            <x-icons.book-appointment/>
                            &nbsp{{ __('Book') }}
                        </x-secondary-button>
                    </a>
                </div>
            </div>

        @empty
            <div class="flex justify-center">
                No services
            </div>
        @endforelse
    </div>
        <div class="flex justify-center mt-3">
            {{ $services->links() }}
        </div>
    @endif
</div>

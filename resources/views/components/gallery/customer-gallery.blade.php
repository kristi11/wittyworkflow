<div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-dialog-modal wire:model="showGalleryImageModal">
            <x-slot name="title">{{ $gallery->applied_to }}</x-slot>

            <x-slot name="content">
                <ul>
                    <li>
{{--                        <livewire:gallery.gallery-image :gallery="$gallery" lazy="true"/>--}}
                        @if($gallery->path)
                        <img src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Service images" class="mb-4 object-cover rounded-lg">
                        @endif
                    </li>

                    <li>
                        <h2 class="text-gray-500 text-sm dark:text-gray-200">{{ $gallery->description }}</h2>
                    </li>
                </ul>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showGalleryModal', false)" class="mr-2"> Cancel
                </x-secondary-button>
                <a href="{{ route('appointments') }}" wire:navigate>
                    <x-button class="ml-3">
                        <x-icons.book-appointment/>
                        &nbsp{{ __('Book') }}
                    </x-button>
                </a>
            </x-slot>
        </x-dialog-modal>
        @foreach($galleries as $gallery)
            <div class="bg-white md:col-span-1 md:mt-0 mt-5 p-3 rounded-lg shadow-lg dark:bg-gray-800">
                <div class="flex justify-center">
{{--                    <livewire:gallery.gallery-image :gallery="$gallery" lazy="true"/>--}}
                    <img src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Service images" class="mb-4 object-cover rounded-lg max-h-60">
                </div>
                <div class="flex justify-center">
                    <x-button wire:click="expandImage({{ $gallery->id }})">
                    {{ __('Expand') }}
                </x-button>
                <a href="{{ route('appointments') }}" wire:navigate>
                    <x-secondary-button class="ml-3">
                        <x-icons.book-appointment/>
                        &nbsp{{ __('Book') }}
                    </x-secondary-button>
                </a>
                </div>
            </div>
        @endforeach
    </div>

</div>

<div class="">
    @if($galleries->count() > 0)
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Gallery
        </h2>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
    @endif
        <div class="md:grid md:grid-cols-3 md:gap-6">
    <x-dialog-modal wire:model="showGalleryImageModal">
        <x-slot name="title">{{ $gallery->applied_to }}</x-slot>

        <x-slot name="content">
            <ul>
                <li>
                    @if($gallery->path)
                        @if($gallery->path !== 'services.jpg')
                            <img src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Service images" class="mb-4 object-cover rounded-lg">
                        @else
                            <img src="{{ Storage::disk('serviceImages')->url('serviceImages/services.jpg') }}" alt="Service images" class="mb-4 object-cover rounded-lg">
                       @endif
                    @endif
                </li>
                <li>
                    <h2 class="text-gray-500 text-sm">{{ $gallery->description }}</h2>
                </li>
            </ul>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showGalleryImageModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <a href="{{ route('appointments') }}" wire:navigate>
                <x-button class="ml-3">
                    <x-icons.book-appointment/>
                    &nbsp{{ __('Book') }}
                </x-button>
            </a>
        </x-slot>
    </x-dialog-modal>
    @forelse($galleries as $gallery)
        <div class="w-full p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <a href="#" class="flex flex-wrap justify-center no-underline hover:no-underline">
                    {{--                            <livewire:gallery.gallery-image :gallery="$gallery" lazy="true"/>--}}
{{--                    <img src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Service images" class="m-4 object-cover rounded-lg max-h-60">--}}
                    @if($gallery->path)
                        @if($gallery->path == 'services.jpg')
                            <img src="{{ Storage::disk('serviceImages')->url('serviceImages/services.jpg') }}" alt="Service images" class="mb-4 object-cover rounded-lg">

                        @else
                            <img src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Service images" class="mb-4 object-cover rounded-lg">
                        @endif
                    @endif
                </a>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                <div class="flex items-center justify-center">
                    <button wire:click="expandCustomerImage({{ $gallery->id }})" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Expand details
                    </button>
                </div>
            </div>
        </div>
    @empty
    <div class="flex justify-center">
        No images in the gallery
    </div>
    @endforelse
    </div>
    <div class="flex justify-center mt-3 p-2">
        {{ $galleries->links(data : ['scrollTo' => false]) }}
    </div>
</div>

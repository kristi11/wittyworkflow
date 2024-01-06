<div>
    <div class="flex justify-end mr-3">

        <x-button class="mb-5" wire:click="addImage">
            Add image
        </x-button>
    </div>

    <div class="bg-white overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">
        <x-table.table>
            <x-slot name="head">
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Applied to') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Description') }}
                </x-table.table-heading>
                <x-table.table-heading class="px-6 py-6">
                    {{ __('Image') }}
                </x-table.table-heading>
                <x-table.table-heading class="flex justify-center px-6 py-6">
                    {{ __('Actions') }}
                </x-table.table-heading>
            </x-slot>
            <x-slot name="body">
                <x-dialog-modal wire:model="showGalleryImageModal">
                    <x-slot name="title">Service image</x-slot>

                    <x-slot name="content">
                        <div>
                            @if ($gallery->path)
                                <img id="path" src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Gallery Image" class="mb-4 mt-4 rounded-lg shadow-md">
                            @endif
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-secondary-button wire:click="$set('showGalleryImageModal', false)" class="mr-2"> Cancel
                        </x-secondary-button>
                    </x-slot>
                </x-dialog-modal>
                @forelse ($galleries as $gallery)
                    <tr class="bg-white border-b dark:bg-gray-700"
                        wire:loading.class.delay="opacity-50 dark:opacity-95" wire:key="{{ $gallery->id }}">
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ ucwords($gallery->applied_to) }}
                        </td>
                        <td class="py-4 text-gray-900 dark:text-gray-200">
                            {{ Str::words(ucwords($gallery->description),3) }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            <a href="#" wire:click="expandImage({{ $gallery->id }})">
                                @if($gallery->path)
                                    @if($gallery->path !== 'services.jpg')
                                        <img src="{{ Storage::disk('serviceImages')->url($gallery->path) }}" alt="Service images" class="mb-4 object-cover rounded-lg">
                                    @else
                                        <img src="{{ Storage::disk('serviceImages')->url('serviceImages/services.jpg') }}" alt="Service images" class="mb-4 object-cover rounded-lg">
                                    @endif
                                @endif
                            </a>
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            <div class="flex justify-center">
                                <x-secondary-button wire:click="edit({{ $gallery->id }})" class="mr-3">
                                    {{ __('Edit') }}
                                </x-secondary-button>
                                <x-danger-button wire:click="delete({{ $gallery->id }})" wire:confirm="Are you sure you want to delete?">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-700">
                        <td class="px-6 py-4 text-gray-900" colspan="5">
                            <div class="flex justify-center text-gray-400">
                                {{ __('Enter some images for your services') }}
                            </div>
                        </td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table.table>
    </div>
    @include('components.gallery.gallery-form')
</div>

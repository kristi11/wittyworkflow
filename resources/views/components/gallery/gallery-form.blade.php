<form wire:submit="save">
    <x-dialog-modal wire:model="showGalleryModal">
        <x-slot name="title">Service image</x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="applied_to" value="{{ __('Service name') }}" />
                <select id="applied_to"
                        wire:model.blur="applied_to"
                        type="text"
                        class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm dark:bg-gray-900">
                    <option value="" class="font-bold" selected>Select service for this image</option>
                    @foreach($services as $service)
                        <option value="{{ $service->name }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="applied_to" class="mt-2"/>
            </div>
            <!-- Image -->
            <div>
                <x-label for="path" value="{{ __('Image') }}" />
                @if($editing)
                    @if($path)
                        <div class="bg-gray-100 border-l-4 my-4 p-4 rounded-r-md text-green-500 dark:bg-gray-900">
                            Image exists. Refer to previous panel to see it or upload a new one below.
                        </div>
                    @endif
                @endif
                @if($path instanceof \Illuminate\Http\UploadedFile)
                    <img id="path" src="{{ $path->temporaryUrl() }}" alt="Gallery Image" class="mb-4 mt-4 rounded-lg shadow-md">
                @endif
                <x-filepond wire:model="path" name="path" id="path"/>
                <x-input-error for="path" id="path" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <textarea id="description"
                          wire:model.blur="description"
                          type="text"
                          rows="10"
                          class="mt-1 block w-full border-gray-300
                                 focus:border-indigo-300 focus:ring
                                  focus:ring-indigo-200 focus:ring-opacity-50
                                   rounded-md shadow-sm dark:bg-gray-900"
                placeholder="Here you can add anything you would like the customers to know"></textarea>
                <x-input-error for="description" class="mt-2"/>
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showGalleryModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button type="submit">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</form>

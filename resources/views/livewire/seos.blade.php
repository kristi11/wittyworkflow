<div>
    <div>
        <x-form-section submit="save">
            <x-slot name="title">
                SEO
            </x-slot>
            <x-slot name="description">
                {{__('Improve your chances of getting discovered on search engines. If no SEO title is provided the application name will be used. Just as a rule of thumb, the title should be less than 50 characters and for the most part its the name of your business and the description should be less than 160 characters, and normally its a short description of what your business is about. SEO stands for Search Engine Optimization.')}}
            </x-slot>
            <x-slot name="form">
                @if($seos)
                    <div class="col-span-6">
                        <div class="bg-gray-50 p-6 border
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <div>
                                <h1 class="font-semibold text-xl dark:text-gray-100">Title</h1>
                            </div>
                            <div class="mb-6">
                                <h2 class="text-gray-600 dark:text-gray-400">{{ $seos->title !== null && $seos->title !== '' ? $seos->title : 'If no seo title is provided the application name will be used. You can change this any time.' }}</h2>
                            </div>

                            <div>
                                <h1 class="font-semibold text-xl dark:text-gray-100">Description</h1>
                            </div>
                            <div class="mb-6">
                                <h2 class="text-gray-600 dark:text-gray-400">{{ $seos->description !== null && $seos->description !== '' ? $seos->description : 'Enter a description of what your website is about to improve google search' }}</h2>
                            </div>

                            {{--Edit button--}}
                            <div class="flex justify-end">
                                <x-secondary-button wire:click="edit({{ $seos->id }})" class="mr-2">Edit
                                </x-secondary-button>
                                {{--End edit button--}}
                                {{--Edit modal--}}
                                <x-dialog-modal wire:model="showSEOModal">
                                    <x-slot name="title">
                                        Edit SEO details
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-seo-form/>
                                    </x-slot>

                                    <x-slot name="footer">
                                        <x-secondary-button class="mr-2"
                                                            wire:click="$set('showSEOModal', false)">Cancel
                                        </x-secondary-button>
                                        <x-button wire:loading.class="opacity-50" wire:click="save">Save</x-button>
                                    </x-slot>
                                </x-dialog-modal>
                                {{--End edit modal--}}
                                {{--Delete button--}}
                                <x-danger-button wire:click="delete({{ $seos->id }})" wire:confirm="Are you sure you want to delete SEO details?">
                                    delete
                                </x-danger-button>
                                {{--End delete button--}}
                            </div>
                        </div>
                    </div>
                @else
                    <x-seo-form/>
                @endif
            </x-slot>
            @if($seos == null)
                <x-slot name="actions">
                    <x-button wire:loading.class="opacity-50">Save</x-button>
                </x-slot>
            @endif
        </x-form-section>
    </div>

</div>

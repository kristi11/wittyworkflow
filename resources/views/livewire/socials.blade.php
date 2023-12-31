<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Socials') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Add your social networks here') }}
        </x-slot>

        <x-slot name="form">

            @if($socials)
                @if(empty($socials->instagram) && empty($socials->facebook) && empty($socials->twitter) && empty($socials->linkedin))
                    <p class="col-span-6 font-semibold dark:text-gray-100">Your socials list is empty. Click the edit button and add some.</p>
                @else
                    <div class="col-span-6 sm:col-span-4">
                        <h1 class="font-bold mb-8 text-2xl dark:text-gray-100">Your current socials</h1>

                        @if(!empty($socials->instagram))
                            <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-8 text-center dark:text-gray-200" href="{{ 'https://www.instagram.com/'.$socials->instagram }}">
                                <x-svg.instagram-s-v-g/>&nbsp{{ $socials->instagram }}
                            </a>
                        @endif

                        @if(!empty($socials->facebook))
                            <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-8 text-center dark:text-gray-200" href="{{ 'https://www.facebook.com/'.$socials->facebook }}">
                                <x-svg.facebook-s-v-g/>&nbsp{{$socials->facebook }}
                            </a>
                        @endif

                        @if(!empty($socials->twitter))
                            <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-8 text-center dark:text-gray-200" href="{{ 'https://www.twitter.com/'.$socials->twitter }}">
                                <x-svg.twitter-s-v-g/>&nbsp{{$socials->twitter }}
                            </a>
                        @endif

                        @if(!empty($socials->linkedin))
                            <a target="_blank" class="flex font-mono hover:text-indigo-600 items-center mb-8 text-center dark:text-gray-200" href="{{ 'https://www.linkedin.com/in/'.$socials->linkedin }}">
                                <x-svg.linkedin-s-v-g/>&nbsp{{$socials->linkedin }}
                            </a>
                        @endif
                    </div>
                @endif
            @else
                <x-socials-form/>
            @endif

        </x-slot>


        <x-slot name="actions">
            @if(!$socials)
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button wire:loading.attr="disabled">
                    {{ __('Save') }}
            </x-button>
            @else
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                <x-secondary-button wire:click="edit({{$socials->id}})" wire:loading.attr="disabled">
                    {{ __('Edit') }}
                </x-secondary-button>
            @endif
        </x-slot>

    </x-form-section>

    <x-dialog-modal wire:model="showSocialsModal">
        <x-slot name="title">Socials details</x-slot>

        <x-slot name="content">
            <x-socials-form/>
        </x-slot>

        <x-slot name="footer" wire:model="showSocialsModal">
            <x-secondary-button wire:click="$set('showSocialsModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button wire:click="save">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

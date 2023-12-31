<div>
    <div>
        <x-form-section submit="save">
            <x-slot name="title">
                {{ __('Landingpage hero') }}
            </x-slot>

            <x-slot name="description">
                    {!! __('The landingpage hero is the first thing a user sees when they visit the public page of your website. Here you can change the text and image of the landingpage hero. You can also change the background color or chose a gradient background (a two-tone color background transitioning from one color to another) for a smoother viewing experience. You can also enable waves for a more dynamic viewing experience. Check your landingpage hero <a class="font-semibold hover:text-indigo-700 text-indigo-600" target="_blank" href="'.config('app.url').'">here</a>') !!}
            </x-slot>

            <x-slot name="form">

                @if($heroes)
                    <div class="col-span-6 sm:col-span-4">
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Main Quote</p>
                            <p class="dark:text-gray-400">{{ $heroes->mainQuote }}</p>
                        </div>
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Secondary Quote</p>
                            <p class="dark:text-gray-400">{{ $heroes->secondaryQuote }}</p>
                        </div>
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Third Quote</p>
                            <p class="dark:text-gray-400">{{ $heroes->thirdQuote }}</p>
                        </div>
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Gradient degree</p>
                            <p class="dark:text-gray-400">{{ $heroes->gradientDegree.' degree' }}</p>
                        </div>
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Gradient degree start</p>
                            <p class="dark:text-gray-400">{{ $heroes->gradientDegreeStart.' %' }}</p>
                        </div>
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Gradient first color</p>
                            <div class="flex items-center mb-8 p-6 rounded-full text-center w-0" style="background-color: {{$heroes->gradientFirstColor}}">
                            </div>
                        </div>

                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Gradient degree end</p>
                            <p class="dark:text-gray-400">{{ $heroes->gradientDegreeEnd.' %' }}</p>
                        </div>
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Gradient secondary color</p>
                            <div class="flex items-center mb-8 p-6 rounded-full text-center w-0" style="background-color: {{$heroes->gradientSecondColor}}">
                            </div>
                        </div>
                        <div class="text-left mb-8">
                            <p class="font-bold text-lg dark:text-gray-100">Waves</p>
                            <p class="dark:text-gray-400">{{$heroes->waves ? 'Enabled' : 'Disabled' }}</p>
                        </div>
                    </div>
                @else
                    <x-hero.hero-form/>
                @endif

            </x-slot>

            <x-slot name="actions">
                @if(!$heroes)
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
                    <x-secondary-button wire:click="editHero({{$heroes->id}})" wire:loading.attr="disabled">
                        {{ __('Edit') }}
                    </x-secondary-button>
                @endif
            </x-slot>

        </x-form-section>
            <x-hero.hero-form/>
    </div>
</div>

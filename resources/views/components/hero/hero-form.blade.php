<form wire:submit="save">
    <x-dialog-modal wire:model="showHeroModal">
        <x-slot name="title">Landingpage hero modal</x-slot>

        <x-slot name="content">
            <!-- Main quote -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="mainQuote" value="{{ __('Main quote') }}" />
                <p class="text-gray-400  text-xs">{{__('What should the main quote of your business say')}}</p>
                <x-input id="mainQuote" type="text" class="mt-1 block w-full" wire:model.blur="mainQuote"/>
                <x-input-error for="mainQuote" class="mt-2" />
            </div>

            <!-- Secondary quote -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="secondaryQuote" value="{{ __('Secondary quote') }}" />
                <p class="text-gray-400  text-xs">{{__('What should the secondary quote of your business say')}}</p>
                <x-input id="secondaryQuote" type="text" class="mt-1 block w-full" wire:model.blur="secondaryQuote"/>
                <x-input-error for="secondaryQuote" class="mt-2" />
            </div>

            <!-- Third quote -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="thirdQuote" value="{{ __('Third quote') }}" />
                <p class="text-gray-400  text-xs">{{__('What should the third quote of your business say')}}</p>
                <x-input id="thirdQuote" type="text" class="mt-1 block w-full" wire:model.blur="thirdQuote" />
                <x-input-error for="thirdQuote" class="mt-2" />
            </div>

            <!-- Gradient Degree -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="gradientDegree" value="{{ __('Gradient Degree') }}" />
                <p class="text-gray-400  text-xs">{{__('In human terms, CSS gradients are a way to create smooth color transitions on a webpage. Think of them like a gradual change in color that can be used as backgrounds for elements like buttons or headers.A CSS gradient degree refers to the direction in which a gradient transitions from one color to another on a web page. The default in this case is set to 90deg.Change it as you see fit')}}</p>
                <x-input id="gradientDegree" type="number" class="mt-1 block w-full" wire:model.blur="gradientDegree" />
                <x-input-error for="gradientDegree" class="mt-2" />
            </div>

            <!-- Gradient Degree First color -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="gradientFirstColor" value="{{ __('Gradient First color') }}" />
                <p class="text-gray-400  text-xs">{{__('This is the starting point of the gradient. It\'s the color that you want to appear at the beginning of the transition. Imagine it as the color you\'d see at the top or left side of the gradient, depending on the direction of the gradient.')}}</p>
                <x-input id="gradientFirstColor" type="color" class="mt-1 block" wire:model.blur="gradientFirstColor"/>
                <x-input-error for="gradientFirstColor" class="mt-2" />
            </div>

            <!-- Gradient Degree Start -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="gradientDegreeStart" value="{{ __('Gradient Degree Start') }}" />
                <p class="text-gray-400  text-xs">{{__('Imagine you have a straight line, like a ruler. In a first-degree gradient, the colors change along this line. For instance, you might have a button where the color starts as red on the left side and gradually becomes yellow on the right side, creating a smooth transition from one color to another horizontally.')}}</p>
                <x-input id="gradientDegreeStart" type="text" class="mt-1 block w-full" wire:model.blur="gradientDegreeStart"/>
                <x-input-error for="gradientDegreeStart" class="mt-2" />
            </div>

            <!-- Gradient Degree Secondary color -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="gradientSecondColor" value="{{ __('Gradient Degree Secondary color') }}" />
                <p class="text-gray-400  text-xs">{{__('This is the ending point of the gradient. It\'s the color you want to see at the other end of the transition. Think of it as the color that you\'d see at the bottom or right side of the gradient, depending on the direction.')}}</p>
                <x-input id="gradientSecondColor" type="color" class="mt-1 block" wire:model.blur="gradientSecondColor"/>
                <x-input-error for="gradientSecondColor" class="mt-2" />
            </div>

            <!-- Gradient Degree End -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="gradientDegreeEnd" value="{{ __('Gradient Degree End') }}" />
                <p class="text-gray-400  text-xs">{{__('Now, think of a circle or a radial pattern. In a second-degree gradient, the colors radiate from a central point and gradually expand outward. So, you could have a circular button where the center is blue, and it gradually turns green as you move towards the edges. It\'s like a color "sunburst" effect emanating from a central point.')}}</p>
                <x-input id="gradientDegreeEnd" type="text" class="mt-1 block w-full" wire:model.blur="gradientDegreeEnd"/>
                <x-input-error for="gradientDegreeEnd" class="mt-2" />
            </div>

            <!-- Image -->
            <div>
                <x-label for="image" value="{{ __('Image') }}" />
{{--                @if($this->image)--}}
{{--                    <div class="border-l-4 my-4 p-4 text-green-600">--}}
{{--                        Image exists. Refer to previous panel to see it or upload a different one below.--}}
{{--                    </div>--}}
{{--                @endif--}}
                <x-filepond wire:model="image" name="image" id="image"/>
                <x-input-error for="image" id="image" class="mt-2"/>
            </div>

            <!-- Waves -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-label for="waves" value="{{ __('Waves') }}" />
                <p class="text-gray-400 text-xs pb-3">{{ __('Activate this if you\'d like to see a wave pattern at the end of the hero banner') }}</p>
                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm dark:bg-gray-900" id="waves" wire:model.blur="waves">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <x-input-error for="waves" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showHeroModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button type="submit">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</form>

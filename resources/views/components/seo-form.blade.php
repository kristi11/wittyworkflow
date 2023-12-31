<div class="col-span-6">
    <div class="flex col-span-6 sm:col-span-4">
        <div class="w-full">
            <x-label for="title" value="{{ __('Title') }}" class="pt-6"/>
            <p class="text-gray-500 text-xs">{{ __('Max 50 characters') }}</p>
            <x-input wire:model.blur="title" id="title" type="text" class="mt-1 block w-full"
                     placeholder="Ex: John Doe's personal website"
            />
            <x-input-error for="title" class="mt-2"/>
        </div>
    </div>

    <div class="col-span-6 sm:col-span-4">
        <x-label for="description" value="{{ __('Description') }}" class="pt-6 pb-1"/>
        <p class="text-gray-500 text-xs">{{ __('Max 160 characters') }}</p>
        <textarea wire:model.blur="description" name="description" id="description"
                  cols="30" rows="10"
                  class="border w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                  placeholder="Write a short description of what this website is about."></textarea>
        <x-input-error for="description" class="mt-2"/>
    </div>

</div>

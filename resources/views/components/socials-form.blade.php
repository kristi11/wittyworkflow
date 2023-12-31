<!-- Instagram -->
<div class="col-span-6 sm:col-span-4 mb-6">
    <x-label for="instagram" value="{{ __('Instagram') }}" />
    <x-input id="instagram" type="text" class="mt-1 block w-full" wire:model.blur="instagram" autocomplete="instagram" placeholder="Add your instagram username here"/>
    <x-input-error for="instagram" class="mt-2" />
</div>

<!-- Facebook -->
<div class="col-span-6 sm:col-span-4 mb-6">
    <x-label for="facebook" value="{{ __('Facebook') }}" />
    <x-input id="facebook" type="text" class="mt-1 block w-full" wire:model.blur="facebook" autocomplete="facebook"  placeholder="Add your facebook name here"/>
    <x-input-error for="facebook" class="mt-2" />
</div>

<!-- Twitter -->
<div class="col-span-6 sm:col-span-4 mb-6">
    <x-label for="twitter" value="{{ __('Twitter') }}" />
    <x-input id="twitter" type="text" class="mt-1 block w-full" wire:model.blur="twitter" autocomplete="twitter" placeholder="Add your twitter username here"/>
    <x-input-error for="twitter" class="mt-2" />
</div>

<!-- Linkedin -->
<div class="col-span-6 sm:col-span-4 mb-6">
    <x-label for="linkedin" value="{{ __('Linkedin') }}" />
    <x-input id="linkedin" type="text" class="mt-1 block w-full" wire:model.blur="linkedin" autocomplete="linkedin" placeholder="Add your linkedin username here"/>
    <x-input-error for="linkedin" class="mt-2" />
</div>

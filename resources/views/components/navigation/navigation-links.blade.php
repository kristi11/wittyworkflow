<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" wire:navigate>
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link href="{{ url('/chat') }}" wire:navigate>
        {{ __('Chat') }}
    </x-nav-link>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" wire:navigate>
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="flex items-center px-4">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
            @endif

            <div>
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <div class="mt-3 space-y-1">
            <!-- Account Management -->
            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" wire:navigate>
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <div class="border-t border-gray-200"></div>
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Chat') }}
            </div>
            <x-responsive-nav-link href="{{ url('/chat') }}" :active="request()->routeIs('chat')" wire:navigate>
                {{ __('Chat') }}
            </x-responsive-nav-link>

            <div class="border-t border-gray-200"></div>
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Sections') }}
            </div>
            <x-responsive-nav-link href="{{ route('appointments') }}" :active="request()->routeIs('appointments')" wire:navigate>
                {{ __('Appointments') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')" wire:navigate>
                {{ __('Services') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('gallery') }}" :active="request()->routeIs('gallery')" wire:navigate>
                {{ __('Gallery') }}
            </x-responsive-nav-link>

            @can('is_admin')
                <div class="border-t border-gray-200"></div>
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Business info (admin only)') }}
                </div>
                <x-responsive-nav-link href="{{ route('users') }}" :active="request()->routeIs('hero')" wire:navigate>
                    {{ __('Users') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('hero') }}" :active="request()->routeIs('hero')" wire:navigate>
                    {{ __('Hero') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('address') }}" :active="request()->routeIs('address')" wire:navigate>
                    {{ __('Address') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')" wire:navigate>
                    {{ __('Services') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('businessHours') }}" :active="request()->routeIs('businessHours')" wire:navigate>
                    {{ __('Business Hours') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('socials') }}" :active="request()->routeIs('socials')" wire:navigate>
                    {{ __('Socials Networks') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('seo') }}" :active="request()->routeIs('seo')" wire:navigate>
                    {{ __('SEO') }}
                </x-responsive-nav-link>
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')" wire:navigate>
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif
            @endcan

            <div class="border-t border-gray-200"></div>

            <!-- Authentication -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Authentication') }}
            </div>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-responsive-nav-link href="{{ route('logout') }}"
                                       @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>

            @include('components.navigation.responsive-team-management')
        </div>
    </div>
</div>
<script>
    function toggleTheme() {
        let theme = Theme.get() === 'light' ? 'dark' : 'light';
        Theme.set(theme);
        sessionStorage.setItem('current_theme', theme);
    }

    // Load the initial theme from session storage
    document.addEventListener('DOMContentLoaded', function () {
        let theme = sessionStorage.getItem('current_theme') || 'light';
        Theme.set(theme);
    });
</script>

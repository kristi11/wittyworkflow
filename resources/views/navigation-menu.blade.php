<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                @include('components.navigation.navigation-links')
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @include('components.navigation.teams-dropdown')
                @include('components.navigation.settings-dropdown')
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                @include('components.navigation.hamburger')
            </div>
        </div>
    </div>
    @include('components.navigation.responsive-navigation-menu')
</nav>

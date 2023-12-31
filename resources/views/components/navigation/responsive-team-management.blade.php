<!-- Team Management -->
@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())

    @can('is_admin_or_staff_member')
        @if(Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin'))
            <div class="border-t border-gray-200"></div>

            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Team') }}
            </div>

            <!-- Team Settings -->
            <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')" wire:navigate>
                {{ __('Team Settings') }}
            </x-responsive-nav-link>

            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')" wire:navigate>
                    {{ __('Create New Team') }}
                </x-responsive-nav-link>
            @endcan
        @endif
    @endcan

    @can('is_admin_or_staff_member')
        <!-- Team Switcher -->
        @if (Auth::user()->allTeams()->count() > 1)
            <div class="border-t border-gray-200"></div>

            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Switch Teams') }}
            </div>

            @foreach (Auth::user()->allTeams() as $team)
                <x-switchable-team :team="$team" component="responsive-nav-link" wire:navigate/>
            @endforeach
        @endif
    @endcan

@endif

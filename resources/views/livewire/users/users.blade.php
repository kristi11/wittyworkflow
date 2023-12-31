<div>
    <div class="mb-6 md:ml md:w-1/3 ml-2 mr-2 sm:w-full">
        <x-input wire:model.live="search" placeholder="Search users..." class="w-full" id="search"/>
    </div>
    <div class="bg-white overflow-y-auto shadow-md sm:rounded-lg ml-2 mr-2 rounded-md">
        {{--Users table--}}
        <x-table.table>
            <x-slot name="head">
                <x-table.table-heading class="px-6 py-6">
                    Profile photo
                </x-table.table-heading>
                <x-table.table-heading style="white-space: nowrap;"
                                       class="px-6 py-6">
                    Name
                </x-table.table-heading>
                <x-table.table-heading style="white-space: nowrap;"
                                       class="px-6 py-6">
                    Email
                </x-table.table-heading>
                <x-table.table-heading style="white-space: nowrap;"
                                       class="px-6 py-6">
                    Role
                </x-table.table-heading>
                <x-table.table-heading style="white-space: nowrap;"
                                       class="px-6 py-6">
                    Verified
                </x-table.table-heading>
                <x-table.table-heading style="white-space: nowrap;"
                                       class="px-6 py-6">
                    Created
                </x-table.table-heading>
                <x-table.table-heading style="white-space: nowrap;"
                                       class="px-6 py-6">
                    Actions
                </x-table.table-heading>
            </x-slot>
            <x-slot name="body">
                @forelse ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-700"
                        wire:loading.class.delay="opacity-50 dark:opacity-95" wire:key="{{ $user->id }}">
                        <td class="px-6 py-4 text-gray-900">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class=" dark:text-gray-200 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ $user->name }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </td>
                        <td class="py-4 text-gray-900 dark:text-gray-200">
                            {{ strtoupper($user->name) }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            @if($user->role == 'admin')
                                <div class="text-red-800 font-semibold dark:text-red-400">
                                    Administrator
                                </div>
                            @elseif($user->role == 'staff')
                                <div class="text-orange-700 font-semibold dark:text-green-400">
                                    Staff member
                                </div>
                            @else
                                <div class="text-gray-400 font-semibold">
                                    {{ $user->role }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            @if($user->email_verified_at)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                            {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            @if($user->role == 'admin')
                                <div class="text-xs text-red-800 font-semibold dark:text-red-400">
                                    Administrator's role can't be changed
                                </div>
                            @else
                                <x-secondary-button wire:click="edit({{$user->id}})">Change role</x-secondary-button>
                            @endif
                        </td>
                    </tr>
                @empty
                    {{--Message to be displayed if there are no users--}}
                    <x-table.no-users-found/>
                    {{--End message to be displayed if there are no users--}}
                @endforelse
            </x-slot>
        </x-table.table>
        {{--End users table--}}
    </div>
{{--    <x-table.create-edit-modal/>--}}
    @include('components.table.create-edit-modal')
        <div class="mt-4 ml-2 mr-2">
            {{ $users->links() }}
        </div>
</div>

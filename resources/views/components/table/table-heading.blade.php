@props([
    'sortable' => null,
    'direction' => null,
    'multiColumn' => null,
])

<th
    {{ $attributes->merge(['class' => 'scope="col" class="px-6 py-6 dark:bg-gray-800 "'])->only('class') }}
>
    @unless ($sortable)
        <span
            class="flex font-medium items-center text-gray-800 text-left uppercase dark:text-gray-400">{{ $slot }}</span>
    @else
        <button
            {{ $attributes->except('class') }} class="flex font-semibold items-center text-gray-800 text-left uppercase">
            <span>{{ $slot }}</span>

            <span class="relative flex items-center">
                @if ($multiColumn)
                    @if ($direction === 'asc')
                        <x-icons.arrow-up/>
                        <x-icons.arrow-up/>
                    @elseif ($direction === 'desc')
                        <div class="opacity-0 group-hover:opacity-100 absolute">
                            <x-icons.arrow-down/>
                            <x-icons.arrow-down/>
                        </div>
                        <x-icons.arrow-down/>
                    @else
                        <x-icons.arrow-down/>
                    @endif
                @else
                    @if ($direction === 'asc')
                        <x-icons.arrow-up/>
                    @elseif ($direction === 'desc')
                        <x-icons.arrow-down/>
                    @else
                        <x-icons.arrow-up/>
                    @endif
                @endif
            </span>
        </button>
    @endif
</th>

<h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
    Hours
</h2>
<div class="w-full mb-4">
    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
</div>
<div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
    <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <div class="w-full p-8 text-3xl font-bold text-center">When are we open</div>
            <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
            <ul class="w-full text-center text-base font-bold">
                @forelse($hours as $hour)
                    <li class="border-b py-4">
                        {!!
                             ucwords($hour->day) . (ucwords($hour->open ? '<p class="text-green-500">Open</p>' : '<p class="text-red-700">Closed</p>')) . ($hour->open ? (' from ' . '<p class="text-indigo-500 inline">'.\Carbon\Carbon::parse($hour->open_from)->format('g:i A').'</p>' . ' to ' . '<p class="text-indigo-500 inline">'. \Carbon\Carbon::parse($hour->open_until)->format('g:i A').'</p>') : '')
                         !!}
                    </li>
                @empty
                    {{__('This business has not set their business hours yet.')}}
                @endforelse

            </ul>
        </div>
    </div>
</div>

<h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
    Where to find us
</h2>
<div class="w-full mb-4">
    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
</div>
<div class="w-full">
    <div>
        <p class="flex font-semibold justify-center text-2xl text-black">
            {{ strtoupper($address->name) }}
        </p>
        <a class="flex justify-center text-indigo-600 text-md" href="https://www.google.com/maps/search/{{ urlencode($address->street . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip) }}" target="_blank">
            {{$address->street . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip }}
        </a>
        <p class="flex justify-center text-gray-500 text-md">
            {{ $address->phone }}
        </p>
    </div>
    {{--Here you can change the address of your business but instead of address you have to enter latitude and longitude. To get the latitude and longitude of your address just go on google maps, enter your address and when the address is shown on google maps right click it and it will show you the lat long values on the right click menu.--}}
    {{--                <x-maps-google :markers="[['lat' => 40.71357850567475, 'long' => -73.87658413068763, 'title' => 'Here we are']]"--}}
    {{--                               :centerToBoundsCenter="true"--}}
    {{--                               :zoomLevel="18"--}}
    {{--                               class="rounded-2xl shadow-xl m-4"--}}
    {{--                ></x-maps-google>--}}
</div>

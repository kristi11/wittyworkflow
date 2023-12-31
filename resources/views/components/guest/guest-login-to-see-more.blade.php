@auth()
    <div class="flex justify-center">
        <a href="{{ route('gallery') }}" class="text-indigo-600 font-semibold">See more</a>
    </div>
@endauth
@guest()
    <div class="flex justify-center">
        <a href="{{ route('gallery') }}" class="text-indigo-600 font-semibold">Log in </a> <p class="text-black"> &nbspto see more</p>
    </div>
@endguest

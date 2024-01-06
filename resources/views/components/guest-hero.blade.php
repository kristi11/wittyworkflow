<!--Hero-->
<div class="pt-24">
    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">{{ $hero->thirdQuote }}</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
                {{ $hero->mainQuote }}
            </h1>
            <p class="mb-8 text-2xl tracking-loose w-full">
                {{ $hero->secondaryQuote }}
            </p>
{{--            <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">--}}
{{--                <a href="#email">Subscribe to our newsletter</a>--}}
{{--            </button>--}}
        </div>
        <!--Right Col-->
{{--        @if($hero->image != 'hero-1.png')--}}
{{--            <div class="flex justify-evenly md:w-3/5 pb-16 py-6 text-center w-full">--}}
{{--                <livewire:hero-image :hero="$hero" lazy="true"/>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="flex justify-evenly md:w-3/5 pb-16 py-6 text-center w-full">--}}
{{--                <img src="{{ asset('hero-1.png') }}" alt="Business Image" class="mb-4 mt-4 w-1/4 rounded-lg">--}}
{{--                @endif--}}

                @if($hero->image != 'business-hero.jpg')
                    <div class="flex justify-evenly md:w-3/5 pb-16 py-6 text-center w-full">
                        <livewire:hero-image :hero="$hero" lazy="true"/>
                    </div>
                @else
                    <div class="flex justify-evenly md:w-3/5 pb-16 py-6 text-center w-full">
                        <img src="{{ asset('business-hero.jpg') }}" alt="Business Image" class="mb-4 mt-4 w-1/4 rounded-lg">
                    </div>
                @endif
    </div>
</div>
{{--Enable waves only if user has chosen to--}}
@if($hero['waves'] == 1)
    <x-waves/>
@endif

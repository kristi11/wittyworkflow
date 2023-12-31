@if($social)
    @if($social->instagram || $social->facebook || $social->twitter || $social->linkedin)

        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Our Socials
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap justify-center mb-20">
                @if($social->twitter)
                    <a href="{{ 'https://www.twitter.com/'.$social->twitter }}" target="_blank"
                       class="font-semibold mr-2">
                        <x-svg.twitter-s-v-g/>
                    </a>
                @endif
                <div class="text-gray-500 mr-2">
                    @if($social->instagram)
                        <a href="{{ 'https://www.instagram.com/'.$social->instagram }}" target="_blank"
                           class="font-semibold mr-2">
                            <x-svg.instagram-s-v-g/>
                        </a>
                    @endif
                </div>

                <div class="text-gray-500 mr-2">
                    @if($social->facebook)
                        <a href="{{ 'https://www.facebook.com/'.$social->facebook }}" target="_blank"
                           class="font-semibold mr-2">
                            <x-svg.facebook-s-v-g/>
                        </a>
                    @endif
                </div>
                <div class="text-gray-500 mr-2">
                    @if($social->linkedin)
                        <a href="{{ 'https://www.linkedin.com/in/'.$social->linkedin }}" target="_blank"
                           class="font-semibold mr-2">
                            <x-svg.linkedin-s-v-g/>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endif

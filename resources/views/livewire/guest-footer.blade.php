<div>
    <!--Footer-->
    <footer class="bg-white">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6 grid grid-cols-1 md:grid-cols-2">
                <div class="
                        flex
                        col-span-1
                        items-center
                        justify-center
                        md:justify-start
                        border-b-2
                        sm:border-b-2
                        md:border-b-0
                        mb-4
                        sm:mb-4
                        md:mb-0
                        pb-4
                        sm:pb-4
                        md:pb-0
                        text-black
                       ">
                    <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" target="_blank" href="#">
                        {{ config('app.name', 'Everything Hair Salon')}}
                    </a>

                </div>
                <div class="flex items-center justify-self-auto">

                    <div class="flex-1">
                        <p class="uppercase text-gray-500 md:mb-4">Socials</p>
                        <ul class="list-reset mb-6">


                            @if($socials)
                                    @if(!empty($socials->instagram))
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                            <a target="_blank" href="{{ 'https://www.instagram.com/'.$socials->instagram }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Instagram</a>
                                        </li>
                                    @endif

                                    @if(!empty($socials->facebook))
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                            <a target="_blank" href="{{ 'https://www.facebook.com/'.$socials->facebook }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
                                        </li>
                                    @endif

                                    @if(!empty($socials->twitter))
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                            <a target="_blank" href="{{ 'https://www.twitter.com/'.$socials->twitter }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
                                        </li>
                                    @endif

                                    @if(!empty($socials->linkedin))
                                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                            <a target="_blank" href="{{ 'https://www.linkedin.com/in/'.$socials->linkedin }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
                                        </li>
                                    @endif
                            @endif



                                                <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                                    <a target="_blank" href="https://github.com/kristi11" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Github</a>
                                                </li>
                            {{--                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">--}}
                            {{--                        <a target="_blank" href="https://www.linkedin.com/in/kristi-tanellari/" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>--}}
                            {{--                    </li>--}}
                            {{--                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">--}}
                            {{--                        <a target="_blank" href="https://twitter.com/TanellariKristi" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>--}}
                            {{--                    </li>--}}
                        </ul>
                    </div>
                    <div class="flex-1">
                        <div class="col-span-1 flex items-center justify-center md:justify-end text-black">
                            <a target="_blank" href="https://www.digitalocean.com/?refcode=2d2478a20038&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge"><img src="https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%202.svg" alt="DigitalOcean Referral Badge" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
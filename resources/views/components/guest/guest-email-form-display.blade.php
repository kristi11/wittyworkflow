<div class="grid grid-cols-2 md:grid-cols-2">
    <div class="col-span-2 mb-20 md:mb-0">
<h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
    Have a question?
</h2>
<div class="w-full mb-4">
    <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
</div>
<h3 class="my-6 text-3xl leading-tight">
    Feel free to contact us
</h3>
@foreach($admins as $admin)
    <livewire:secure-mailto email="{{$admin->email}}"/>
@endforeach
    </div>

{{--    <div class="visible md:hidden w-full mb-4">--}}
{{--        <div class="visible md:hidden h-1 mx-auto bg-white w-full opacity-25 my-0 py-0 rounded-t"></div>--}}
{{--    </div>--}}

{{--    <div class="col-span-1">--}}
{{--        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">--}}
{{--            Keep in touch--}}
{{--        </h2>--}}
{{--        <div class="w-full mb-4">--}}
{{--            <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>--}}
{{--        </div>--}}
{{--        <h3 class="my-6 text-3xl leading-tight">--}}
{{--            Signup to our newsletter for updates--}}
{{--        </h3>--}}
{{--        <div class="flex justify-center">--}}
{{--            <form method="POST" action="/newsletter">--}}
{{--                @csrf--}}

{{--                    <x-input id="email" name="email" type="email" class="mt-1 block mb-4 w-60 py-1 px-2 text-black" required autocomplete="email" placeholder="Subscribe to newsletter"/>--}}
{{--                    <x-input-error for="email" class="mb-4 text-white"/>--}}

{{--                    <x-button type="submit">--}}
{{--                        {{ __('Subscribe') }}--}}
{{--                    </x-button>--}}

{{--            </form>--}}
{{--            @if(session('success'))--}}
{{--                <div id="successContainer"--}}
{{--                     class="bg-blue-600 bottom-2 fixed flex justify-center mt-2 p-4 right-2 rounded-lg shadow-lg text-white z-50">--}}
{{--                    <div>--}}
{{--                        {{ session('success') }}--}}
{{--                    </div>--}}
{{--                    <button id="dismissButton" class="ml-2 focus:outline-none">--}}
{{--                        <span class="font-bold p-1 text-white">x</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <script>--}}
{{--                    // Function to hide the success message container when the "X" button is clicked--}}
{{--                    function hideSuccessMessage() {--}}
{{--                        var successContainer = document.getElementById('successContainer');--}}
{{--                        if (successContainer) {--}}
{{--                            successContainer.style.display = 'none';--}}
{{--                        }--}}
{{--                    }--}}

{{--                    // Attach a click event listener to the "X" button--}}
{{--                    var dismissButton = document.getElementById('dismissButton');--}}
{{--                    if (dismissButton) {--}}
{{--                        dismissButton.addEventListener('click', function () {--}}
{{--                            hideSuccessMessage();--}}
{{--                        });--}}
{{--                    }--}}
{{--                </script>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

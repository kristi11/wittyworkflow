<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7GKE2SY0G4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-7GKE2SY0G4');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
{{--    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">--}}
{{--    <link rel="manifest" href="{{ asset('/manifest.json') }}">--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet"
    />
    <!-- Styles -->
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
            height: 6px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
{{--    <script src="{{ asset('/sw.js') }}"></script>--}}
{{--    <script>--}}
{{--        if ("serviceWorker" in navigator) {--}}
{{--            // Register a service worker hosted at the root of the--}}
{{--            // site using the default scope.--}}
{{--            navigator.serviceWorker.register("/sw.js").then(--}}
{{--                (registration) => {--}}
{{--                    console.log("Service worker registration succeeded:", registration);--}}
{{--                },--}}
{{--                (error) => {--}}
{{--                    console.error(`Service worker registration failed: ${error}`);--}}
{{--                },--}}
{{--            );--}}
{{--        } else {--}}
{{--            console.error("Service workers are not supported.");--}}
{{--        }--}}
{{--    </script>--}}

</head>
<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

{{--Page notification--}}
<livewire:notification />
{{--End page notification--}}

@stack('modals')

@livewireScripts

<!-- Filepond -->
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
</body>
</html>

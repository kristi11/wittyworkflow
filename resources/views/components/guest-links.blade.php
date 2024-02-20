<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7GKE2SY0G4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-7GKE2SY0G4');
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        {{ isset($seo) && $seo->title !== null && $seo->title !== '' ? $seo->title : config('APP_NAME') }}
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ isset($seo) && $seo->description !== null && $seo->description !== '' ? $seo->description : '' }}" />
    <meta name="keywords" content="" />
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <meta name="author" content="kristi tanellari" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient({{ $hero->gradientDegree.'deg' }}, {{ $hero->gradientFirstColor }} {{ $hero->gradientDegreeStart.'%' }}, {{ $hero->gradientSecondColor }} {{ $hero->gradientDegreeEnd.'%' }});
        }
    </style>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "LocalBusiness",
            "name": "{{ $seo->title }}",
            "description": "{{ $seo->description }}",
            "url": "{{ config('app.url') }}",
            "telephone": "{{ $address->phone }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $address->street }} }}",
                "addressLocality": "{{ $address->city }}",
                "addressRegion": "{{ $address->state }}",
                "postalCode": "{{ $address->zip }}",
            },
        }
    </script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>

</head>

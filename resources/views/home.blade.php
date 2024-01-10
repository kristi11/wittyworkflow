@props(['socials'])
<!DOCTYPE html>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<livewire:guest-header/>
@livewireStyles
<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
<x-banner/>
<livewire:guest-content/>
<livewire:guest-footer :socials="$socials"/>
<x-js-scripts/>
@livewireScripts
</body>

</html>

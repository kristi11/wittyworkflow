<div>
    <div
        wire:ignore id="map"
        style="width:500px;height:400px;"
    >
    </div>
    <script>
        /* Add Inline Google Auth Boostrapper here */

        /* How to initialize the map */
        let map;
        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");
            map = new Map(document.getElementById("map"), {
                zoom: 4,
                center: { lat: @js( $lat ), lng: @js( $lng ) },
                mapId: "DEMO_MAP_ID",
            });
        }

        /* Initialize map when Livewire has loaded */
        document.addEventListener('livewire:init', function () {
            initMap();
        });
    </script>
</div>

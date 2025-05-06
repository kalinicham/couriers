@extends('layouts.dashboard')

@section('main')
    <div id="map" style="height: 80vh; width: 100%; margin-top: 20px;"></div>
@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const couriers = @json($locations);
        const courierMarkers = {};

        let map;

        function initMap() {
            const center = { lat: 48.62397427929, lng: 22.299680738374 }; // Uzhhorod
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: center
            });

            couriers.forEach(courier => {
                const position = { lat: courier.lat, lng: courier.lng };
                const marker = new google.maps.Marker({
                    position,
                    map,
                    title: courier.name ?? `Courier ${courier.id}`,
                    label: `${courier.id}`,
                    icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                });

                courierMarkers[courier.id] = marker;
            });
        }

        window.initMap = initMap;
        window.onload = initMap;

        Pusher.logToConsole = true;

        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            forceTLS: true
        });

        const channel = pusher.subscribe('courier');
        channel.bind('App\\Events\\CourierLocationUpdated', function(data) {
            const marker = courierMarkers[data.id];
            if (marker) {
                const newPosition = {
                    lat: parseFloat(data.lat),
                    lng: parseFloat(data.lng)
                };
                animateMarkerTo(marker, newPosition);
            }
        });

        function animateMarkerTo(marker, newPosition) {
            const duration = 1000;
            const steps = 20;
            const deltaLat = (newPosition.lat - marker.getPosition().lat()) / steps;
            const deltaLng = (newPosition.lng - marker.getPosition().lng()) / steps;

            let i = 0;
            const interval = setInterval(() => {
                const pos = marker.getPosition();
                const lat = pos.lat() + deltaLat;
                const lng = pos.lng() + deltaLng;
                marker.setPosition(new google.maps.LatLng(lat, lng));
                if (++i >= steps) clearInterval(interval);
            }, duration / steps);
        }
    </script>
@endpush


@extends('layouts.dashboard')

@section('main')
    <div id="map" style="height: 400px; width: 100%; margin-top: 20px;"></div>
@endsection

@push('scripts')
    <script>
        window.courierLocations = @json($locations);
    </script>
    @vite('resources/js/initMap.js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
@endpush

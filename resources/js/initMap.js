window.initMap = function () {
    const mapElement = document.getElementById('map');
    const courierLocations = window.courierLocations;

    const map = new google.maps.Map(mapElement, {
        zoom: 10,
        center: { lat: 48.62397427929, lng: 22.299680738374 },
    });

    courierLocations.forEach(courier => {
        new google.maps.Marker({
            position: { lat: courier.lat, lng: courier.lng },
            map: map,
            title: courier.name
        });
    });
};

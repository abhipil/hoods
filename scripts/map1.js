var map;
var bermudaTriangle;
var clickableMap = true;
var myLatLng;
//var flag = true;
function setbounds(arg) {
    bermudaTriangle = new google.maps.Polygon({
        path: arg,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: '#2F0000',
        fillOpacity: 0.35,
        clickable: false
    });
    bermudaTriangle.setMap(map);
}

function initMap() {
    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(40.700621, -74.027377),
        new google.maps.LatLng(40.763450, -73.952361)
    );
    var options = {
        bounds: defaultBounds,
        types: ['geocode'],
        componentRestrictions: {country: "us"}
    };

    if(!myLatLng)
        myLatLng = {lat: 40.73772, lng: -73.9844164};
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 13,
        mapTypeControl: false,
        navigationControl: false,
        streetViewControl: false,
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_BOTTOM
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true
    });

    if(!clickableMap)
        google.maps.event.clearListeners(map, 'click');

}
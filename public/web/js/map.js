function myMap() {
    var mapCanvas = document.getElementById("map_kantor");
    var myCenter = new google.maps.LatLng(-0.490679, 117.1492309);
    var mapOptions = {
        center: myCenter,
        zoom: 17
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({
        position: myCenter,
    });
    marker.setMap(map);
}
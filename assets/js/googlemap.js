$(document).ready(function() {
  initMap();

  function initMap() {
    var myLatLng = {
      lat: 50.060930,
      lng: 21.953305
    };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: myLatLng, 
      zoomControl: true,
      scaleControl: true,
      scrollwheel: false,
      disableDoubleClickZoom: true
    });
    var image = 'http://respan.big07.pl/images/marker.png';
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
    });


    google.maps.event.addListener(map, 'click', function(event) {
      this.setOptions({
        scrollwheel: true
      });
    });
  }
});

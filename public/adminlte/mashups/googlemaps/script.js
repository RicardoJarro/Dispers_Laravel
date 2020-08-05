function iniciarMap(){
    var coord = {lat:-2.8979225 ,lng: -79.0183606};
    var coord2 = {lat:-2.8934629 ,lng: -79.0128501};
    var coord3 = {lat:-2.8184983 ,lng: -78.8616879};

    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });

    var marker2 = new google.maps.Marker({
      position: coord2,
      map: map
    });

    var marker2 = new google.maps.Marker({
      position: coord3,
      map: map
    });
 
}
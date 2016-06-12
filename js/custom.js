jQuery(document).ready(function($){
    var infowindow;

    (function(){

        var myLatlng = new google.maps.LatLng(3.4105844,-76.7232089);
        var mapOptions = {
            zoom: 4,
            center: myLatlng
        }

        var map = new google.maps.Map(document.getElementById("wpsm-map"), mapOptions);

        if(places.length > 0){
            $(places).each(function(index, el){

                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(el.latitude), lng: parseFloat(el.longitude)},
                    map: map,
                    title: el.title
                });

                marker.addListener('click', function(){
                    if(infowindow){
                        infowindow.close();
                    }

                    infowindow = new google.maps.InfoWindow({
                        content: el.content
                    });

                    infowindow.open(map, marker);
                    
                });

                marker.setMap(map);
            });
        }

    })();

});






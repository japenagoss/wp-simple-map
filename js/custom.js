jQuery(document).ready(function($){

    //console.log(places);

    
  
    (function(){

        var myLatlng = new google.maps.LatLng(3.4105844,-76.7232089);
        var mapOptions = {
            zoom: 4,
            center: myLatlng
        }

        var map = new google.maps.Map(document.getElementById("wpsm-map"), mapOptions);

        if(places.length > 0){
            $(places).each(function(index, el){

                console.log(parseFloat(el.latitude)+" / "+parseFloat(el.longitude));

                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(el.latitude), lng: parseFloat(el.longitude)},
                    map: map,
                    title: el.title
                });

                marker.setMap(map);
            });
        }

    })();

});






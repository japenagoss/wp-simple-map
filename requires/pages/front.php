<div id="map"></div>

<style type="text/css">
  	#map { height: 300px; }
</style>
 <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMwk7zQzrzEEnisp8j3ShtUzP0BvUSacw&callback=initMap">
 </script>

<script type="text/javascript">
	var map;
	function initMap() {
	  map = new google.maps.Map(document.getElementById('map'), {
	    center: {lat: -34.397, lng: 150.644},
	    zoom: 8
	  });
	}
</script>

<div id='map' style='height:400px;width:100%;'></div>
<script>
	function initMap() {
		var map;
		var def_lat="<?php echo $def_lat;?>";
		var def_long="<?php echo $def_long;?>";
    //var src = srcz;
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: <?php echo $zoom;?>,
      center: new google.maps.LatLng(def_lat, def_long),
      styles: [
        {
		      elementType: "geometry",
		      stylers: [{ color: "#f5f5f5" }],
		    },
		    {
		      elementType: "labels.icon",
		      stylers: [{ visibility: "off" }],
		    },
		    {
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#616161" }],
		    },
		    {
		      elementType: "labels.text.stroke",
		      stylers: [{ color: "#f5f5f5" }],
		    },
		    {
		      featureType: "administrative.land_parcel",
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#bdbdbd" }],
		    },
		    {
		      featureType: "poi",
		      elementType: "geometry",
		      stylers: [{ color: "#eeeeee" }],
		    },
		    {
		      featureType: "poi",
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#757575" }],
		    },
		    {
		      featureType: "poi.park",
		      elementType: "geometry",
		      stylers: [{ color: "#e5e5e5" }],
		    },
		    {
		      featureType: "poi.park",
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#9e9e9e" }],
		    },
		    {
		      featureType: "road",
		      elementType: "geometry",
		      stylers: [{ color: "#ffffff" }],
		    },
		    {
		      featureType: "road.arterial",
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#757575" }],
		    },
		    {
		      featureType: "road.highway",
		      elementType: "geometry",
		      stylers: [{ color: "#dadada" }],
		    },
		    {
		      featureType: "road.highway",
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#616161" }],
		    },
		    {
		      featureType: "road.local",
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#9e9e9e" }],
		    },
		    {
		      featureType: "transit.line",
		      elementType: "geometry",
		      stylers: [{ color: "#e5e5e5" }],
		    },
		    {
		      featureType: "transit.station",
		      elementType: "geometry",
		      stylers: [{ color: "#eeeeee" }],
		    },
		    {
		      featureType: "water",
		      elementType: "geometry",
		      stylers: [{ color: "#c9c9c9" }],
		    },
		    {
		      featureType: "water",
		      elementType: "labels.text.fill",
		      stylers: [{ color: "#9e9e9e" }],
		    },
      ],
    });
    
    setMarkers(map);
  }
	
	function loadKmlLayer(src, map) {
    var kmlLayer = new google.maps.KmlLayer(src, {
      suppressInfoWindows: true,
      preserveViewport: false,
      map: map
    });
  }
  
	var ma = [
    <?php echo $ma;?>
  ];

  function setMarkers(map) {
    <?php echo $icon;?>
    
    var shape = {
      coords: [1, 1, 1, 20, 18, 200, 180, 10],
      type: 'poly'
    };
    var infowindow = new google.maps.InfoWindow();
    for (var i = 0; i < ma.length; i++) {
      var atr = ma[i];
      var marker = new google.maps.Marker({position: {lat: atr[1], lng: atr[2]}, map: map, icon: image1, shape: shape, title: atr[0],zIndex: atr[3]});
      var content = atr[4];
      //var infowindow = new google.maps.InfoWindow();
			/*var infowindow = new google.maps.InfoWindow({
        content: atr[4],
        maxWidth: 200
      });*/

			google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
			        return function() {
			           infowindow.setContent(content);
			           infowindow.setOptions({maxWidth:300}); 
			           infowindow.open(map,marker);
			           //maxWidth: 200;
			        };
			})(marker,content,infowindow));
    }
  }
</script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBeEPj1UtxUnb5N39BEKbX2-GrcBTlW1sY&callback=initMap'></script>
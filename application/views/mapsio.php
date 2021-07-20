<link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA&callback=initMap" type="text/javascript"></script>


<body onLoad="initialize()">
    <div id="map_canvas" style="width: 500px; height: 400px;">map div</div>
</body>

<script type="text/javascript">
    var marker;
    var map;

    //lokasi koordinat pada Google Map
    var malang = new google.maps.LatLng(-7.982398, 112.630892);

    function initialize() {
        var mapOptions = {
            zoom: 17,
            mapTypeId: google.maps.MapTypeId.SATELLITE,
            center: malang
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        //posisi balon
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: malang
        });
        google.maps.event.addListener(marker, 'click', toggleBounce);
    }

    function toggleBounce() {
        if (marker.getAnimation() != null)
            marker.setAnimation(null);
        else
            marker.setAnimation(google.maps.Animation.BOUNCE);
    }
</script>
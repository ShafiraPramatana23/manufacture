<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <div id="map" style="width: 100%; height: 500px"></div>
    </div>
</section>


<script type='text/javascript'>
    var rsLayer = new L.LayerGroup();
    var dokterLayer = new L.LayerGroup();

    var rsico = L.icon({
		iconUrl: 'assets/assets/img/rs.png',
        iconSize: [20, 20], // size of the icon
        shadowSize: [10, 14], // size of the shadow
        iconAnchor: [22, 64], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 12], // the same for the shadow
        popupAnchor: [-3, -16] // point from which the popup should open relative to the iconAnchor
    });

    <?php
    foreach ($dtRS as $row) {
        echo " var rsMarker = new L.Marker.Text(new L.LatLng(" . $row["y"] . ' , ' . $row["x"] . "), '" . $row['nama_rs'] . "',{icon: rsico}).bindPopup('<a href=\"content/dtl_rs.php?dtl_rs=" . $row["id_rs"] . "\"target=\"_blank\">" . $row['nama_rs'] . "<br><center><img width=\"80px;\" src=\"assets/assets/img/rs.png\"></center>');";
        echo ' rsLayer.addLayer(rsMarker); ';
    }
    ?>

    var googleRoadmap = new L.Google('ROADMAP');
    var cloudmade = new L.TileLayer('http://{s}.tile.cloudmade.com/4c09f91134dc40008537e4bbdf6b606e/22677/256/{z}/{x}/{y}.png');
    var mpn = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    var qst = new L.TileLayer('http://otile1.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png');
    var googleSatellite = new L.Google('SATELLITE');
    var googleHybrid = new L.Google('HYBRID');
    var bingMap = new L.BingLayer('AqTGBsziZHIJYYxgivLBf0hVdrAk9mWO5cQcb8Yux8sW5M8c8opEC2lZqKR1ZZXf');

    var map = new L.Map(document.getElementById("map"), {
        center: new L.LatLng(-7.981894, 112.626503),
        zoom: 13,
        layers: [googleRoadmap, rsLayer, dokterLayer]
    });

    map.addControl(new L.Control.Scale());
    map.addControl(new L.Control.Layers({
        'Cloudmade': cloudmade,
        'Mapnik': mpn,
        'MapQuest': qst,
        'Google Roadmap': googleRoadmap,
        'Google Satellite': googleSatellite,
        'Google Hybrid': googleHybrid,
        'BING': bingMap
    }, {
        'Rumah Sakit': rsLayer,
        'Dokter': dokterLayer
    }));

    map.on('click', onMapClick);

    var popup = new L.Popup();

    function onMapClick(e) {
        var latlngStr = '(' + e.latlng.lat + ', ' + e.latlng.lng + ')';

        popup.setLatLng(e.latlng);
        popup.setContent("Koordinat Anda " + latlngStr);

        map.openPopup(popup);
    }
</script>


<!-- <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA&callback=initMap" type="text/javascript"></script>
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

<section class="page-section portfolio" id="portfolio">
    <div class="container">

        <body onload="initialize()">
            <div id="map_canvas" style="width: 600px; height: 500px;">malang</div>
        </body>
    </div>
</section>


<!-- <body onLoad="initialize()">
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
</script> -->
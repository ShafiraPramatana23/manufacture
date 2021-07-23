<div class="row h-100">
    <div class="col-md-7 filter-section">
        <section class="page-section mb-0" id="filter">
            <div class="container">
                <div class="card-header">
                    <h4><?php echo $dtManuf[0]['name_manufacture']; ?></h4>
                </div>
                <div class="text-center">
                    <?php if ($dtManuf[0]['filename'] != '-') { ?>
                        <img class="img-fluid" style="max-width: 30%; max-height: 180px; margin: 5%" src="<?= base_url() ?>assets/assets/img/gallery/<?= $dtManuf[0]['filename'] ?>" alt="..." />
                    <?php } ?>
                </div>
                <br>
                <div class="row ms-3">
                    <div class="col-md-8">
                        <div class="row">
                            <p class="mb-0"><b>Kategori</b></p>
                            <p class="text-primary mt-0"><?php echo $dtManuf[0]['name_category']; ?></p>
                        </div>
                        <div class="row">
                            <p class="mb-0"><b>Email</b></p>
                            <p class="text-primary mt-0"><?php echo $dtManuf[0]['email']; ?></p>
                        </div>
                        <div class="row">
                            <p class="mb-0"><b>Nomor Telepon</b></p>
                            <p class="text-primary mt-0"><?php echo $dtManuf[0]['phone_number']; ?></p>
                        </div>
                        <div class="row">
                            <p class="mb-0"><b>Alamat</b></p>
                            <p class="text-primary mt-0"><?php echo $dtManuf[0]['address']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <p class="mb-0"><b>Popularitas</b></p>
                            <p class="text-primary mt-0"><?php echo $dtManuf[0]['rating']; ?></p>
                        </div>
                        <div class="row">
                            <p class="mb-0"><b>Standar Gaji</b></p>
                            <p class="text-primary mt-0"><?php echo "Rp " . number_format($dtManuf[0]['salary']); ?></p>
                        </div>
                        <div class="row">
                            <p class="mb-0"><b>Jumlah Karyawan</b></p>
                            <p class="text-primary mt-0"><?php echo $dtManuf[0]['employee']; ?></p>
                        </div>
                        <div class="row">
                            <p class="mb-0"><b>Jarak Dari Pusat Kota</b></p>
                            <p class="text-primary mt-0"><?php echo $dtManuf[0]['distance']; ?> km</p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="lat" value="<?php echo $dtManuf[0]['latitude']; ?>">
            <input type="hidden" id="long" value="<?php echo $dtManuf[0]['longitude']; ?>">
        </section>
    </div>
    <div class="col-md-5">
        <section class="page-section h-100 bg-light text-primary mb-0" id="about">
            <div class="container">
                <div id="map" style="width: 100%; height: 500px; margin-top:30px"></div>
            </div>
        </section>
    </div>
</div>

<script type='text/javascript'>
    var googleRoadmap = new L.Google('ROADMAP');
    var cloudmade = new L.TileLayer('http://{s}.tile.cloudmade.com/4c09f91134dc40008537e4bbdf6b606e/22677/256/{z}/{x}/{y}.png');
    var mpn = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    var qst = new L.TileLayer('http://otile1.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png');
    var googleSatellite = new L.Google('SATELLITE');
    var googleHybrid = new L.Google('HYBRID');
    var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    var googleTraffic = L.tileLayer('https://{s}.google.com/vt/lyrs=m@221097413,traffic&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        minZoom: 2,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    });
    var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2xlbnRpbmdyIiwiYSI6ImNrcTFhMmEwYzA4MGYydXFzdzRocnVxZm4ifQ.2BaSyLr8v05mNtGEumIDQQ';
    var grayscale = L.tileLayer(mbUrl, {
        id: 'mapbox/light-v9',
        attribution: ''
    });
    var streets = L.tileLayer(mbUrl, {
        id: 'mapbox/streets-v11',
        attribution: ''
    });
    var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: ''
    });

    var lat = $("#lat").val();
    var long = $("#long").val();

    var map = new L.Map(document.getElementById("map"), {
        center: new L.LatLng(lat, long),
        zoom: 13,
        layers: [googleRoadmap]
    });

    map.addControl(new L.Control.Scale());
    map.addControl(new L.Control.Layers({
        'Cloudmade': cloudmade,
        'Mapnik': mpn,
        'MapQuest': qst,
        'Google Roadmap': googleRoadmap,
        'Google Satellite': googleSatellite,
        'Google Hybrid': googleHybrid,
        'Google Terrain': googleTerrain,
        'Google Traffic': googleTraffic,
        'Mapbox Grayscale': grayscale,
        'Mapbox Streets': streets,
        'OpenStreetMap': osm
    }));

    var myLocIco = L.icon({
        iconUrl: '<?= base_url() ?>assets/assets/img/marker.svg',
        iconSize: [50, 50],
        iconAnchor: [25, 35],
    });
    L.marker([lat, long], {
        icon: myLocIco
    }).addTo(map).bindPopup("Lokasi " + "<?= $dtManuf[0]['name_manufacture'] ?>");
</script>
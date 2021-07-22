<div class="row h-100">
    <div class="col-md-7 filter-section">
        <section class="page-section mb-0" id="filter">
            <div class="container">
                <div class="card-header">
                    <h4><?php echo $dtManuf[0]['name_manufacture']; ?></h4>
                </div>
                <div class="text-center">
                    <img class="img-fluid" style="max-width: 30%; max-height: 30%; margin: 5%" src="<?= base_url() ?>assets/assets/img/portfolio/game.png" alt="..." />
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
            <input type="hidden" id="lat" value="<?php echo $dtManuf[0]['latitude'];?>">
            <input type="hidden" id="long" value="<?php echo $dtManuf[0]['longitude'];?>">
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
    var bingMap = new L.BingLayer('AqTGBsziZHIJYYxgivLBf0hVdrAk9mWO5cQcb8Yux8sW5M8c8opEC2lZqKR1ZZXf');
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
        'BING': bingMap
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
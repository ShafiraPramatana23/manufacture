<div class="row h-100">
    <div class="col-md-7 filter-section">
        <section class="page-section mb-0" id="filter">
            <div class="container">
                <div class="card-header">
                    <h4>Nama Pabrik</h4>
                </div>
                <div class="text-center">
                    <img class="img-fluid" style="width: 50%; height: 50%; margin: 5%" src="<?= base_url() ?>assets/assets/img/portfolio/game.png" alt="..." />
                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col">
                            <p>Alamat :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Kategori :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Popularitas :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>No Telp :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Email :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Standar Gaji :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Jumlah Karyawan :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Jarak dari Pusat Kota :</p>
                        </div>
                        <div class="col" style="text-align: end;">
                            <p>-</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-5">
        <section class="page-section bg-white text-primary mb-0" id="about">
            <div class="container">
                <div id="map" style="width: 100%; height: 500px"></div>
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

    var map = new L.Map(document.getElementById("map"), {
        center: new L.LatLng(-7.981894, 112.626503),
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
    L.marker([-7.981894, 112.626503], {
        icon: myLocIco
    }).addTo(map).bindPopup("Lokasi Anda");
</script>
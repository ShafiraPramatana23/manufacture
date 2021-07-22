<div class="row h-100">
    <div class="col-md-3 filter-section">
        <section class="page-section mb-0" id="filter">
            <form action="<?php echo base_url('index.php/main/detail'); ?>" method="post">
                <div class="container">
                    <!-- <h5 class="text-center">FILTER</h5> -->
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Pabrik :</label>
                            <select class="form-control form-control-sm" name="kategori" id="exampleFormControlSelect1">
                                <option value="0">Semua</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <!-- <?php
                                        $i = 0;
                                        foreach ($data_kategori as $data_kategori[]) { ?>
                                    <option value="<?= $data_kategori[$i]['Id'] ?>"><?= $data_kategori[$i]['Jobs_TypeName'] ?></option>
                                <?php $i++;
                                        } ?> -->
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kota Pabrik :</label>
                            <select class="form-control form-control-sm" name="kota" id="exampleFormControlSelect1">
                                <option value="0">Semua</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Popularitas :</label>
                            <select class="form-control form-control-sm" name="popularitas" id="exampleFormControlSelect1">
                                <option value="0">Semua</option>
                                <option>Bintang 5</option>
                                <option>Bintang 4 ke atas</option>
                                <option>Bintang 3 ke atas</option>
                                <option>Bintang 2 ke atas</option>
                                <option>Bintang 1 ke atas</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jumlah Karyawan :</label>
                            <select class="form-control form-control-sm" name="jml_karyawan" id="exampleFormControlSelect1">
                                <option value="0">Semua</option>
                                <option>< 50</option>
                                <option>< 100</option>
                                <option>< 1000</option>
                                <option>> 2000</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <label>Jarak dari Pusat Kota :</label>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="min_jarak" placeholder="Min">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="max_jarak" placeholder="Max">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <label>Rentang Gaji :</label>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="min_gaji" placeholder="Min">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" name="max_gaji" placeholder="Max">
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-dark btn-sm w-100">Setel Ulang   <i class="fas fa-sync"></i></button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary w-100 btn-sm">Terapkan   <i class="fas fa-search"></i></button>
                        </div>
                    </div>
            </form>
        </section>
    </div>
    <div class="col-md-9">
        <section class="page-section bg-white text-primary mb-0" id="about">
            <div class="container">
                <!-- <h2>INI MAPS</h2> -->
                <div id="map" style="width: 100%; height: 500px"></div>
                <div class="row">
                    <div class="col legend-section">
                        <p><b>Legend</b></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script type='text/javascript'>
    var rsLayer = new L.LayerGroup();
    var dokterLayer = new L.LayerGroup();

    var rsico = L.icon({
        iconUrl: '<?=base_url()?>assets/assets/img/rs.png',
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

    var myLocIco = L.icon({
        iconUrl: '<?=base_url()?>assets/assets/img/marker.svg',
        iconSize: [50, 50],
        iconAnchor: [25, 35],
      });
    L.marker([-7.981894, 112.626503], {icon: myLocIco}).addTo(map).bindPopup("Lokasi Anda");

    map.on('click', onMapClick);

    var popup = new L.Popup();

    function onMapClick(e) {
        var latlngStr = '(' + e.latlng.lat + ', ' + e.latlng.lng + ')';

        popup.setLatLng(e.latlng);
        popup.setContent("Koordinat Anda " + latlngStr);

        map.openPopup(popup);
    }
</script>
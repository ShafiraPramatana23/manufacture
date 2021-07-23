<div class="row h-100">
    <div class="col-md-3 filter-section">
        <section class="page-section mb-0" id="filter">
            <form id="filterForm">
                <div class="container">
                    <!-- <h5 class="text-center">FILTER</h5> -->
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Pabrik :</label>
                            <select class="form-control form-control-sm" name="category" id="category">
                                <option value="0">Semua</option>
                                <?php
                                $i = 0;
                                foreach ($dtCat as $dtCat[]) { ?>
                                    <option value="<?= $dtCat[$i]['id_category'] ?>"><?= $dtCat[$i]['name_category'] ?></option>
                                <?php
                                    $i++;
                                } ?>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kota Pabrik :</label>
                            <select class="form-control form-control-sm" name="city" id="city">
                                <option value="0">Semua</option>
                                <?php
                                $i = 0;
                                foreach ($dtCt as $dtCt[]) { ?>
                                    <option value="<?= $dtCt[$i]['id_city'] ?>"><?= $dtCt[$i]['name_city'] ?></option>
                                <?php
                                    $i++;
                                } ?>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Popularitas :</label>
                            <select class="form-control form-control-sm" name="popularity" id="popularity">
                                <option value="0">Semua</option>
                                <option value="5">Bintang 5</option>
                                <option value="4">Bintang 4 ke atas</option>
                                <option value="3">Bintang 3 ke atas</option>
                                <option value="2">Bintang 2 ke atas</option>
                                <option value="1">Bintang 1 ke atas</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jumlah Karyawan :</label>
                            <select class="form-control form-control-sm" name="employee" id="employee">
                                <option value="0">Semua</option>
                                <option value="50">
                                    < 50</option>
                                <option value="100">
                                    < 100</option>
                                <option value="1000">
                                    < 1000</option>
                                <option value="2000">> 2000</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <label>Jarak dari Pusat Kota :</label>
                        <div class="col">
                            <input type="number" min="0" class="form-control form-control-sm" name="distanceMin" id="distanceMin" placeholder="Min">
                        </div>
                        <div class="col">
                            <input type="number" min="0" class="form-control form-control-sm" name="distanceMax" id="distanceMax" placeholder="Max">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <label>Rentang Gaji :</label>
                        <div class="col">
                            <input type="number" min="0" class="form-control form-control-sm" name="salaryMin" id="salaryMin" placeholder="Min">
                        </div>
                        <div class="col">
                            <input type="number" min="0" class="form-control form-control-sm" name="salaryMax" id="salaryMax" placeholder="Max">
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col">
                            <button type="button" onclick="resetMaps()" class="btn btn-dark btn-sm w-100">Setel Ulang <i class="fas fa-sync"></i></button>
                        </div>
                        <div class="col">
                            <button type="button" onclick="getDataMaps()" id="buttonFilter" class="btn btn-primary w-100 btn-sm">Terapkan <i class="fas fa-search"></i></button>
                        </div>
                    </div>
            </form>
        </section>
    </div>
    <div class="col-md-9">
        <section class="page-section bg-white text-primary mb-0" id="about">
            <div class="container">
                <!-- <h2>INI MAPS</h2> -->
                <div id="map">
                    <div id="myMap"></div>
                </div>
                <!-- <div id="weathermap"></div> -->
                <div class="row">
                    <div class="col legend-section ps-5">
                        <p class="mb-1"><b>Legend</b></p>
                        <div class="row">
                            <div class="col-md-2">
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/furniture.svg") ?>" alt="..." width="20" /> <span class="text-legend">Furniture</span></p>
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/plastik.svg") ?>" alt="..." width="20" /> <span class="text-legend">Karet & Plastik</span></p>
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/teknologi.svg") ?>" alt="..." width="20" /> <span class="text-legend">Teknologi</span></p>
                            </div>
                            <div class="col-md-2">
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/konstruksi.svg") ?>" alt="..." width="20" /> <span class="text-legend">Kontruksi</span></p>
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/makanan.svg") ?>" alt="..." width="20" /> <span class="text-legend">Makanan & Minuman</span></p>
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/mesin.svg") ?>" alt="..." width="20" /> <span class="text-legend">Mesin & Otomotif</span></p>
                            </div>
                            <div class="col-md-2">
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/kimia.svg") ?>" alt="..." width="20" /> <span class="text-legend">Obat & Bahan Kimia</span></p>
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/fashion.svg") ?>" alt="..." width="20" /> <span class="text-legend">Pakaian</span></p>
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/package.svg") ?>" alt="..." width="20" /> <span class="text-legend">Pengemasan & Kertas</span></p>
                            </div>
                            <div class="col-md-2">
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/peralatan.svg") ?>" alt="..." width="20" /> <span class="text-legend">Peralatan</span></p>
                                <p class="mb-0"><img src="<?php echo base_url("assets/assets/img/icon/pertanian.svg") ?>" alt="..." width="20" /> <span class="text-legend">Pertanian</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function() {
        getDataMaps();
    });

    function resetMaps(){
        $("#category").val(0);
        $("#city").val(0);
        $("#popularity").val(0);
        $("#employee").val(0);
        $("#distanceMin").val(''); 
        $("#distanceMax").val('');
        $("#salaryMin").val(''); 
        $("#salaryMax").val('');

        getDataMaps();
    }

    var dataMaps = [];
    var mapLayer = [];

    var furnitureLayer = new L.LayerGroup();
    var plastikLayer = new L.LayerGroup();
    var konstruksiLayer = new L.LayerGroup();
    var foodLayer = new L.LayerGroup();
    var mesinLayer = new L.LayerGroup();
    var kimiaLayer = new L.LayerGroup();
    var pakaianLayer = new L.LayerGroup();
    var kertasLayer = new L.LayerGroup();
    var toolsLayer = new L.LayerGroup();
    var taniLayer = new L.LayerGroup();
    var teknoLayer = new L.LayerGroup();

    var furnitureIco = defineIcon('furniture')
    var plastikIco = defineIcon('plastik')
    var konstruksiIco = defineIcon('konstruksi')
    var foodIco = defineIcon('makanan')
    var mesinIco = defineIcon('mesin')
    var kimiaIco = defineIcon('kimia')
    var pakaianIco = defineIcon('fashion')
    var kertasIco = defineIcon('package')
    var toolsIco = defineIcon('peralatan')
    var taniIco = defineIcon('pertanian')
    var teknoIco = defineIcon('teknologi')

    var icoMarker = [furnitureIco, plastikIco, konstruksiIco, foodIco, mesinIco, kimiaIco, pakaianIco, kertasIco, toolsIco, taniIco, teknoIco];

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

    function defineIcon(ic) {
        return L.icon({
            iconUrl: '<?= base_url() ?>assets/assets/img/icon/' + ic + '.svg',
            iconSize: [35, 35], // size of the icon
            shadowSize: [10, 14], // size of the shadow
            iconAnchor: [22, 24], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 12], // the same for the shadow
            popupAnchor: [-3, -16] // point from which the popup should open relative to the iconAnchor
        });
    }

    function getDataMaps() {
        let formData = $("#filterForm").serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('index.php/main/filterData') ?>",
            data: formData,
            dataType: 'JSON',
            cache: false,
            processData: false,
            success: function(res) {
                mapLayer = [googleRoadmap];
                furnitureLayer.clearLayers();
                plastikLayer.clearLayers();
                konstruksiLayer.clearLayers();
                foodLayer.clearLayers();
                mesinLayer.clearLayers();
                kimiaLayer.clearLayers();
                pakaianLayer.clearLayers();
                kertasLayer.clearLayers();
                toolsLayer.clearLayers();
                taniLayer.clearLayers();
                teknoLayer.clearLayers();
                showMaps(res);
            }
        });
    }

    function showMaps(res) {
        res.forEach((item, index) => {
            console.log(item);
            var id = item.id_manufacture
            var popupLink = '<a href="detail/' + id + '">Lihat Detail</a>';
            var marker = new L.Marker.Text(new L.LatLng(item.latitude, item.longitude), item.name_manufacture, {
                icon: icoMarker[item.id_category - 1],
                title: item.name_manufacture,
                alt: item.name_manufacture
            }).bindPopup(popupLink);

            if (item.id_category == 1) {
                furnitureLayer.addLayer(marker)
            } else if (item.id_category == 2) {
                plastikLayer.addLayer(marker)
            } else if (item.id_category == 3) {
                konstruksiLayer.addLayer(marker)
            } else if (item.id_category == 4) {
                foodLayer.addLayer(marker)
            } else if (item.id_category == 5) {
                mesinLayer.addLayer(marker)
            } else if (item.id_category == 6) {
                kimiaLayer.addLayer(marker)
            } else if (item.id_category == 7) {
                pakaianLayer.addLayer(marker)
            } else if (item.id_category == 8) {
                kertasLayer.addLayer(marker)
            } else if (item.id_category == 9) {
                toolsLayer.addLayer(marker)
            } else if (item.id_category == 10) {
                taniLayer.addLayer(marker)
            } else if (item.id_category == 11) {
                teknoLayer.addLayer(marker)
            }
        })

        var container = L.DomUtil.get('myMap');
        if (container != null) {
            container._leaflet_id = null;
        }

        mapLayer = [googleRoadmap, furnitureLayer, plastikLayer, konstruksiLayer, foodLayer, mesinLayer, kimiaLayer, pakaianLayer, kertasLayer, toolsLayer, taniLayer, teknoLayer];

        $('#map').html('<div id="myMap" style="width: 100%; height: 450px"></div>');
        var map = new L.Map('myMap', {
            center: new L.LatLng(-7.981894, 112.626503),
            zoom: 13,
            layers: mapLayer
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
        }, {
            'Furniture': furnitureLayer,
            'Karet & Plastik': plastikLayer,
            'Kontruksi': konstruksiLayer,
            'Makanan & Minuman': foodLayer,
            'Mesin & Otomotif': mesinLayer,
            'Obat & Bahan Kimia': kimiaLayer,
            'Pakaian': pakaianLayer,
            'Pengemasan & Kertas': kertasLayer,
            'Peralatan': toolsLayer,
            'Pertanian': taniLayer,
            'Teknologi': teknoLayer
        }));

        var myLocIco = L.icon({
            iconUrl: '<?= base_url() ?>assets/assets/img/marker.svg',
            iconSize: [50, 50],
            iconAnchor: [25, 35],
        });
        L.marker([-7.981894, 112.626503], {
            icon: myLocIco
        }).addTo(map).bindPopup("Lokasi Anda");
    }

    // map.on('click', onMapClick);

    // var popup = new L.Popup();

    // function onMapClick(e) {
    //     var latlngStr = '(' + e.latlng.lat + ', ' + e.latlng.lng + ')';

    //     popup.setLatLng(e.latlng);
    //     popup.setContent("Koordinat Anda " + latlngStr);

    //     map.openPopup(popup);
    // }
</script>
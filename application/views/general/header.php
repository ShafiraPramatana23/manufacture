<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WEBGIS - MANUFACTURE</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url("assets/favicon.ico") ?>" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url("assets/css/stylesModiff.css") ?>" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA&callback=initMap" type="text/javascript"></script> -->

    <script src="<?php echo base_url("assets/leaflet/dist/leaflet.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/Control.Scale.js") ?>"></script>
    <script src="<?php echo base_url("assets/pancontrol/L.Control.Pan.js") ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCorDFKZdfkhBNahkVrfy7IPqEry0BL4cc&callback=initMap"></script>
    <script src="<?php echo base_url("assets/js/Google.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/Bing.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/Marker.Text.js") ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url("assets/leaflet/dist/leaflet.css") ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/pancontrol/L.Control.Pan.css") ?>" />
</head>

<body class="h-100" id="page-top">
    <!-- Navigation-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top navbar-shrink" id="mainNav">
            <!-- <div class="container"> -->
            <a class="navbar-brand ms-3" href="<?php echo base_url('index.php/main'); ?>">
                <img src="<?php echo base_url("assets/assets/img/factory.svg") ?>" alt="..." width="40" />
                E-ManufactureJatim
            </a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                
                    <li class="nav-item mx-0 mx-lg-1">
                        <?php if ($this->uri->segment(1) == 'main' && $this->uri->segment(2) == null) { ?>
                            <a class="nav-link navs-active py-3 px-0 px-lg-3 rounded" href="<?php echo base_url('index.php/main'); ?>">Home 
                            </a>
                        <?php } else { ?>
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo base_url('index.php/main'); ?>">Home
                            </a>
                        <?php } ?>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <?php if ($this->uri->segment(2) == 'maps' || $this->uri->segment(2) == 'detail') { ?>
                            <a class="nav-link navs-active py-3 px-0 px-lg-3 rounded" href="<?php echo base_url('index.php/main/maps'); ?>">Maps</a>
                        <?php } else { ?>
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo base_url('index.php/main/maps'); ?>">Maps
                            </a>
                        <?php } ?>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                    <?php if ($this->uri->segment(2) == 'about') { ?>
                            <a class="nav-link navs-active py-3 px-0 px-lg-3 rounded" href="<?php echo base_url('index.php/main/about'); ?>">About</a>
                        <?php } else { ?>
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo base_url('index.php/main/about'); ?>">About</a>
                        <?php } ?>
                        
                    </li>
                </ul>
            </div>
            <!-- </div> -->
        </nav>
    </div>
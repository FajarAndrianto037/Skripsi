<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BBM - Belajar Bahasa Madura</title>

    <!-- Slide CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="apple-touch-icon" href="image/sakera.png">
    <link rel="shortcut icon" href="image/sakera.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="style/vendor/aos/aos.css" rel="stylesheet">
    <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="style/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="style/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="style/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="style/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="style/css/style.css" rel="stylesheet">

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>

</head>

<body>

    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="">
        <!-- Header-->
        <header id="header" class="fixed-top d-flex align-items-center header">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <h1><a href="halaman_belajar.php"><span>Belajar Kata</span></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                </div>

                <nav id="navbar" class="navbar-item">
                    <ul>
                        <li class="dropdown"><a href="#"><span>Pemula 1</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="huruf.php">Huruf & Angka</a></li>
                                <li><a href="suku-kata.php">Suku Kata</a></li>
                                <li><a href="kata.php">Kata</a></li>
                                <li><a href="#">Bendahara Kata</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"><span>Pemula 2</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">Kata Khusus</a></li>
                                <li><a href="kalimat-dasar.php">Kalimat</a></li>
                                <li><a href="kamus.php">Terjemah</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link scrollto" href="#team">Rangkuman Belajar</a></li>
                        <li class="dropdown"><a href="#"><span>Hi, <?php echo $_SESSION['nama']; ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Setting</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->
        <!-- /#header -->
        <!-- Content -->
        <br><br><br><br>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div style="height:430px;" class="col-lg-12">
                    <div class="presentation" style="    position: absolute;height: 100%;width: 100%;    left: 0px;    top: 0px;    display: block;    overflow: hidden;background: #ffffff; /* Mengatur warna latar belakang menjadi putih */">
                        <!-- Defining the main presentation -->
                        <div id="presentation-counter">Proses...</div>

                        <div class="slides">
                            <!-- Defining slides -->
                            <div class="slide" id="slide1">
                                <!-- Defining single slide -->
                                <section class="middle">
                                    <h2 style="color:#31708f">
                                        <strong>Kata adalah gabungan dari <br> suku kata yang memiliki arti.</strong>
                                    </h2>
                                    <h3>Tekan <span id="left-init-key" class="key">&rarr;</span> di Keyboard <br> untuk
                                        Melanjutkan.</h3>
                                </section>
                            </div>

                            <?php
                            require_once("koneksi.php");
                            require_once("fsa.php");
                            ?>

                            <div class="slide" id="kata1">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'a%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-success" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-success" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="kata2">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'b%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-info" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-info" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata3">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'c%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata4">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'd%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata5">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'e%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata6">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'f%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-info" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-info" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata7">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'g%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata8">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'h%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-danger" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata9">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'i%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-success" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah)) {
                                                            ?>
                                                                <button type="button" class="btn btn-success" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata10">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'j%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-info" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata11">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'k%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah)) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata12">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'l%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-danger" onClick="play('<?php echo $h['madura']; ?>')"><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < count($pecah)) {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" onClick="play('<?php echo $pecah[$i]; ?>')"><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata13">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "SELECT `madura`,`indonesia` FROM `kamus` WHERE `madura` LIKE 'm%' ORDER BY RAND() LIMIT 5;");
                                                while ($h = mysqli_fetch_array($q)) {
                                                ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-success" onClick="play('<?php echo $h['madura']; ?>')"><?php echo $h['madura']; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h['madura']);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < count($pecah)) {
                                                            ?>
                                                                <button type="button" class="btn btn-success" onClick="play('<?php echo $pecah[$i]; ?>')"><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h['indonesia']; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata14">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'n%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-info" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata15">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'o%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata16">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'p%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata17">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'r%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-success" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-success" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata18">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 's%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-info" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata19">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 't%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata20">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'u%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata21">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'v%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-success" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-success" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata22">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'w%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-info" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata23">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'y%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-warning" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                            <div class="slide" id="kata24">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Kata</th>
                                                    <th style="text-align:center">Suku Kata</th>
                                                    <th style="text-align:center">Terjemahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `madura`,`indonesia` from `kamus` where `madura` like 'z%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $input_kata = proses_fsa($h[0]);
                                                            $pecah = explode('-', $input_kata);
                                                            $i = 0;
                                                            while ($i < sizeof($pecah) - 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" onClick=play("<?php echo $pecah[$i]; ?>")><?php echo $pecah[$i]; ?></button>
                                                            <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <h5><?php echo $h[1]; ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak
                                            Kata</button>
                                </section>
                            </div>

                        </div>
                    </div>

                    <div id="hidden-note" class="invisible" style="display: none;">
                    </div> <!-- hidden note -->

                    <aside id="help" class="sidebar invisible" style="display: hidden;">
                        <!-- Defining sidebar help -->
                        <table>
                            <caption>Bantuan</caption>
                            <tr>
                                <th>Pindah selanjutnya/kembali</th>
                                <td>&larr;&nbsp;&rarr;</td>
                            </tr>
                            <tr>
                                <th>Pindah selanjutnya</th>
                                <td>spacebar</td>
                            </tr>
                        </table>
                    </aside>

                </div>
            </div>
            <!-- /.row -->

            <div style="margin-top:15px;" class="col-lg-4">
                <script type="text/javascript">
                    function play(file) {
                        document.getElementById('terjemahan').innerHTML = "<font color='red'><blink>Proses..." + file +
                            "</blink></font>";
                        $('#terjemahan').load('suara.php', 'b=1&kalimat=' + file);
                        //alert(file);
                    }
                </script>
                <p id="terjemahan" style="margin-bottom: 0px;"></p>
            </div>

            <script type="text/javascript">
                function cekSlide(posHal) {
                    //alert(posHal);
                    if (posHal == 1) {
                        $("#nav-prev").hide("slow");
                    } else
                    if (posHal == 25) {
                        $("#nav-next").hide("slow");
                    } else {
                        $("#nav-prev").show("slow");
                        $("#nav-next").show("slow");
                    }
                }
            </script>
            <div align="center" style="margin-top:30px;" class="col-lg-4">
                <button title="Previous" id="nav-prev" class="fa fa-arrow-left" style="display:none"></button>
                <button title="Jump to slide" id="slide-no">1</button>
                <button title="Next" id="nav-next" class="fa fa-arrow-right"></button>
            </div>
            <div align="center" class="col-lg-4">
                <a href="quiz/quiz-bkata/halaman-bkata.php" class="btn btn-lg btn-primary" role="button">Kuis Kata</a>
            </div>
        </div>
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <br><br><br>
    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Fajar Andrainto</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->
    </div>
    <!-- /#wrapper -->
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

    <!-- jQuery Slide -->
    <script type="text/javascript" src="js/script.js"></script>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!-- Vendor JS Files -->
    <script src="style/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="style/vendor/aos/aos.js"></script>
    <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="style/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="style/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="style/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="style/js/main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</body>

</html>
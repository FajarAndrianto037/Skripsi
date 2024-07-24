<?php
session_start();
include "koneksi.php";

// Ambil id_user dari session
$id_user = $_SESSION['id_user'];

// Periksa apakah ada sesi id_user yang diset
if (!isset($_SESSION['id_user'])) {
    // Jika tidak ada, arahkan kembali ke halaman login atau halaman lainnya
    header("location: login.php");
    exit; // Hentikan eksekusi skrip
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Abhâsa Madhure</title>

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

        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        footer {
            background: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 15px;
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
                    <h1><a href="halaman_belajar.php"><span>Belajar Huruf</span></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                </div>

                <nav id="navbar" class="navbar-item">
                    <ul>
                        <li class="dropdown"><a href="#"><span>Pemula 1</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="huruf-angka.php">Huruf & Angka</a></li>
                                <li><a href="suku-kata.php">Suku Kata</a></li>
                                <li><a href="kata.php">Kata</a></li>
                                <li><a href="bendahara-kata.php">Bendahara Kata</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href=""><span>Pemula 2</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="halaman-kata-khusus.php">Kata Khusus</a></li>
                                <li><a href="halaman-kalimat.php">Kalimat</a></li>
                                <li><a href="kamus.php">Terjemah</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link scrollto" href="rangkuman-belajar.php">Rangkuman Belajar</a></li>
                        <li class="dropdown"><a href=""><span>Hi, <?php echo $_SESSION['nama']; ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="profile.php">Profile</a></li>
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
            <div class="container">
                <br><br>
                <div class="col-lg-12" style="height:430px;">
                    <div class="presentation" style="    position: absolute;height: 100%;width: 100%;    left: 0px;    top: 0px;    display: block;    overflow: hidden;background: #ffffff; /* Mengatur warna latar belakang menjadi putih */">
                        <!-- Defining the main presentation -->
                        <div id="presentation-counter">Proses...</div>

                        <div class="slides">
                            <!-- Defining slides -->
                            <div class="slide" id="slide1">
                                <!-- Defining single slide -->
                                <section class="middle">
                                    <h2 style="color:#31708f">
                                        <strong>Bahasa Madura Mengenal <br> 7 Huruf Vokal dan <br> 27 Huruf
                                            Konsonan</strong>
                                    </h2>
                                    <h3>Tekan <span id="left-init-key" class="key">&rarr;</span> di Keyboard <br> untuk
                                        Melanjutkan.</h3>
                                </section>
                            </div>

                            <div class="slide" id="vokal1">
                                <section class="middle">
                                    <p style="color:#5cb85c; font-size:20em;">Aa</p>
                                </section>
                            </div>

                            <div class="slide" id="vokal2">
                                <section class="middle">
                                    <p style="color:#5bc0de; font-size:20em;"> Ââ</p>
                                </section>
                            </div>

                            <div class="slide" id="vokal3">
                                <section class="middle">
                                    <p style="color:#f0ad4e; font-size:20em;"> Ee</p>
                                </section>
                            </div>

                            <div class="slide" id="vokal4">
                                <section class="middle">
                                    <p style="color:#d9534f; font-size:20em;">Èè</p>
                                </section>
                            </div>

                            <div class="slide" id="vokal5">
                                <section class="middle">
                                    <p style="color:#5cb85c; font-size:20em;">Ii</p>
                                </section>
                            </div>

                            <div class="slide" id="vokal6">
                                <section class="middle">
                                    <p style="color:#5bc0de; font-size:20em;">Oo</p>
                                </section>
                            </div>

                            <div class="slide" id="vokal7">
                                <section class="middle">
                                    <p style="color:#f0ad4e; font-size:20em;">Uu</p>
                                </section>
                            </div>

                            <div class="slide" id="konsonan">
                                <section class="middle">
                                    <h2 style="color:#31708f"><strong>Huruf Konsonan <br> Bahasa Madura</strong></h2>
                                    <h3>Tekan <span id="left-init-key" class="key">&rarr;</span> di Keyboard <br> untuk
                                        Melanjutkan.</h3>
                                </section>
                            </div>

                            <div class="slide" id="konsonan1">
                                <section class="middle">
                                    <table class="table table-bordered table-hover" style="text-align:center;">
                                        <tbody style="font-size:4em;">
                                            <tr style="color:#d9534f">
                                                <td>b</td>
                                                <td>bh</td>
                                                <td>c</td>
                                                <td>d</td>
                                                <td>dh</td>
                                            </tr>
                                            <tr style="color:#5cb85c">
                                                <td>f</td>
                                                <td>g</td>
                                                <td>gh</td>
                                                <td>h</td>
                                                <td>j</td>
                                            </tr>
                                            <tr style="color:#5bc0de">
                                                <td>jh</td>
                                                <td>k</td>
                                                <td>l</td>
                                                <td>m</td>
                                                <td>n</td>
                                            </tr>
                                    </table>
                                </section>
                            </div>

                            <div class="slide" id="konsonan2">
                                <section class="middle">
                                    <table class="table table-bordered table-hover" style="text-align:center;">
                                        <tbody style="font-size:4em;">
                                            <tr style="color:#f0ad4e">
                                                <td>ng</td>
                                                <td>ny</td>
                                                <td>p</td>
                                                <td>q</td>
                                                <td>r</td>
                                            </tr>
                                            <tr style="color:#d9534f">
                                                <td>s</td>
                                                <td>t</td>
                                                <td>v</td>
                                                <td>w</td>
                                                <td>x</td>
                                            </tr>
                                            <tr style="color:#428bca">
                                                <td>y</td>
                                                <td>z</td>
                                            </tr>
                                    </table>
                                </section>
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
                <br><br>
                <div style="margin-top:15px;" class="col-lg-4">
                    <script type="text/javascript">
                        function cekSlide(posHal) {
                            //alert(posHal);
                            if (posHal == 1) {
                                $("#nav-prev").hide("slow");
                            } else
                            if (posHal == 11) {
                                $("#nav-next").hide("slow");
                            } else {
                                $("#nav-prev").show("slow");
                                $("#nav-next").show("slow");
                            }
                        }

                        // fungsi untuk memainkan audio
                        function playHuruf(posHal) {
                            // mengambil id hasilAudio
                            document.getElementById('hasilAudio');
                            if (posHal == 'vokal1') {
                                $('#hasilAudio').load('suara.php', 'kalimat=a'); // load = halaman.php
                            } else if (posHal == 'vokal2') {
                                $('#hasilAudio').load('suara.php', 'kalimat=â');
                            } else if (posHal == 'vokal3') {
                                $('#hasilAudio').load('suara.php', 'kalimat=e');
                            } else if (posHal == 'vokal4') {
                                $('#hasilAudio').load('suara.php', 'kalimat=è');
                            } else if (posHal == 'vokal5') {
                                $('#hasilAudio').load('suara.php', 'kalimat=i');
                            } else if (posHal == 'vokal6') {
                                $('#hasilAudio').load('suara.php', 'kalimat=o');
                            } else if (posHal == 'vokal7') {
                                $('#hasilAudio').load('suara.php', 'kalimat=u');
                            } else {
                                // kalau tidak ketemu halaman kosong
                                document.getElementById('hasilAudio').innerHTML = "";
                            }
                            //alert(file);
                        }
                    </script>
                    <!-- Menampilkan hasil dari hasil audio-->
                    <p id="hasilAudio" style="margin-bottom: 0px;"></p>
                </div>

                <div align="center" style="margin-top:30px;" class="col-lg-4">
                    <button title="Previous" id="nav-prev" class="fa fa-arrow-left" style="display:none"></button>
                    <button title="Jump to slide" id="slide-no">1</button>
                    <button title="Next" id="nav-next" class="fa fa-arrow-right"></button>
                </div>
                <div align="center" class="col-lg-4">
                    <a href="angka.php" class="btn btn-lg btn-primary" role="button">Next Angka</a>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <!-- /.content -->
        <div class="clearfix"></div>
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
        <!-- /.site-footer -->
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

    <!--Local Stuff-->
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
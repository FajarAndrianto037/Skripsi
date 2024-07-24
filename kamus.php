<?php
session_start();
include "koneksi.php";

$cek_id = $_SESSION['id_user'];
// Query untuk mengecek apakah pengguna sudah terdaftar di tabel rombel_belajar
$query_join = "SELECT * FROM rombel_belajar WHERE id_user = '$cek_id'";
$result_join = mysqli_query($mysqli, $query_join);

if (mysqli_num_rows($result_join) == 0) {
    echo "<script type='text/javascript'>
		alert('Anda belum tergabung dalam kelas belajar');
		document.location='halaman_belajar.php';
		</script>";
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

        #input::placeholder {
            font-size: 1.3em;
            /* Sesuaikan ukuran font sesuai kebutuhan */
        }
    </style>

</head>

<body>

    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="">
        <!-- Header-->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <h1><a href="halaman_belajar.php"><span>Ruang <?php echo $_SESSION['level']; ?></span></a></h1>
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
                        <li class="dropdown"><a href="#"><span>Hi, <?php echo $_SESSION['nama']; ?></span> <i class="bi bi-chevron-down"></i></a>
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
        <br><br><br><br><br>
        <!-- Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
                <script>
                    $(document).ready(function() {

                        $('#input').keyup(function() { //saat ngetik langsung terjemah
                            translate();
                        });

                        $('#bahasa').change(function() { //saat bahasa diubah langsung terjemahkan
                            translate();
                        });

                        $('#tingkat').change(function() { //saat tingkat diubah langsung terjemahkan
                            translate();
                        });

                    });

                    function translate() {
                        var kal = document.getElementById('input').value;
                        var bahasa = document.getElementById('bahasa').value;
                        var tingkat = document.getElementById('tingkat').value;

                        document.getElementById('terjemahan').innerHTML =
                            "<font color='red'><blink>Sedang Menerjemahkan...</blink></font>";

                        if (bahasa != '1') {
                            $('#terjemahan').load('madura-indonesia.php', 'input=' + kal);
                        } else {
                            $('#terjemahan').load('indonesia-madura.php', 'input=' + kal + '&tingkat=' + tingkat);
                        }
                    }
                </script>

                <br><br><br>
                <div style="text-align: center;">
                    <div class="kuishp" id="kotak1" style="display: inline-block; margin-left: 10px; text-align: center;">
                        <button id="bahasa" value="1" onclick="toggleContent('kotak1', 'kotak2')" style="border: none; width: 100px; ">Indonesia</button>
                    </div>
                    <div class="swap" id="kotak1" style="display: inline-block; text-align: center;">
                        <button id="bahasa" value="1" onclick="toggleContent('kotak1', 'kotak2')" style="border: none; background-color: #ffffff;"><i class="fa fa-exchange"></i></button>
                    </div>
                    <div id="kotak2" style="display: inline-block; text-align: center;">
                        <button id="bahasa" value="2" onclick="toggleContent('kotak2', 'kotak1')" style="border: none; width: 100px;" disabled>Madura</button>
                    </div>
                    <div class="form-group" style="display: inline-block; width: 7px; text-align: center;">
                        <select name="tingkat" id="tingkat" class="custom-select" style="border: none; font-weight: bold;">
                            <optgroup label="Tingkatan">
                                <?php if ($_POST['tingkat'] == 1 || $_POST['tingkat'] == "") { ?>
                                    <option value="1" selected="selected">Enje'-Iyah</option>
                                    <option value="2">Engghi-Enten</option>
                                    <option value="3">Engghi-Bhunten</option>
                                <?php } elseif ($_POST['tingkat'] == 2) { ?>
                                    <option value="1">Enje'-Iyeh</option>
                                    <option value="2" selected="selected">Engghi-Enten</option>
                                    <option value="3">Engghi-Bhunten</option>
                                <?php } else { ?>
                                    <option value="1">Enje'-Iyeh</option>
                                    <option value="2">Engghi-Enten</option>
                                    <option value="3" selected="selected">Engghi-Bhunten</option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <form action="" method="post" onSubmit="return false">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <!-- <h4>Masukkan Kalimat</h4> -->
                            <textarea name="input" id="input" class="form-control" style=" height:200px;" rows="6" placeholder="Tekan Tombol Spasi Setelah Input Kata" style="font-weight: bold;"><?php if (isset($_POST['input'])) echo stripslashes($_POST['input']); ?></textarea>
                            <br>
                            <button type="button" class="btn btn-warning btn-lg" onClick="karakter_e()">Karakter
                                &egrave;</button>
                            <button type="button" class="btn btn-success btn-lg" onClick="karakter_a()">Karakter
                                &acirc;</button>
                        </div>

                        <script>
                            function karakter_e() {
                                teks = document.getElementById("input").value
                                document.getElementById("input").value = teks + "è"
                                document.getElementById("input").focus()
                                return false
                            }

                            function karakter_a() {
                                teks = document.getElementById("input").value
                                document.getElementById("input").value = teks + "â"
                                document.getElementById("input").focus()
                                return false
                            }
                        </script>
                    </div>
                </form>
                <!-- /.row -->

                <div class="col-lg-6 text-left">
                    <div class="form-group">
                        <!-- <h4>Hasil Terjemahan</h4> -->

                        <div class="panel panel-default" style=" height:200px;">
                            <div class="panel-body">
                                <p id="terjemahan">...::Belum Ada Inputan::....</p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function fungsiKotak1() {
                        // Logika yang akan dijalankan saat tombol pada kotak 1 ditekan
                        console.log("Tombol di kotak 1 ditekan");
                    }

                    function fungsiKotak2() {
                        // Logika yang akan dijalankan saat tombol pada kotak 2 ditekan
                        console.log("Tombol di kotak 2 ditekan");
                    }

                    function toggleContent(idToToggle, idToReset) {
                        var kotakToToggle = document.getElementById(idToToggle);
                        var buttonToToggle = kotakToToggle.querySelector("button");

                        var kotakToReset = document.getElementById(idToReset);
                        var buttonToReset = kotakToReset.querySelector("button");

                        if (buttonToToggle.value === "1") {
                            buttonToToggle.value = "2";
                            buttonToToggle.textContent = "Madura";

                            buttonToReset.value = "1";
                            buttonToReset.textContent = "Indonesia";

                            // Menjalankan fungsiKotak1 saat tombol pada kotak 1 ditekan
                            fungsiKotak1();

                            // Disable the select option in kotak 1
                            document.getElementById("tingkat").disabled = true;
                        } else {
                            buttonToToggle.value = "1";
                            buttonToToggle.textContent = "Indonesia";

                            buttonToReset.value = "2";
                            buttonToReset.textContent = "Madura";

                            // Menjalankan fungsiKotak2 saat tombol pada kotak 2 ditekan
                            fungsiKotak2();

                            // Enable the select option in kotak 1
                            document.getElementById("tingkat").disabled = false;
                        }
                    }
                </script>

            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <br><br><br><br><br>
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
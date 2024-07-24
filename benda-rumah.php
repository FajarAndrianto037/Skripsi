<?php
session_start();
include "koneksi.php";

// Periksa apakah ada sesi id_user yang diset
if (!isset($_SESSION['id_user'])) {
    // Jika tidak ada, arahkan kembali ke halaman login atau halaman lainnya
    header("location: login.php");
    exit; // Hentikan eksekusi skrip
}

// Ambil id_user dari session
$id_user = $_SESSION['id_user'];

// Query untuk mengambil nilai kuis_skt dan kuis_huruf dari tabel rombel_belajar
$query = "SELECT kuis_skt, kuis_huruf FROM rombel_belajar WHERE id_user = '$id_user'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Ambil data hasil query
    $row = mysqli_fetch_assoc($result);

    // Periksa nilai kuis_skt dan kuis_huruf
    if ($row['kuis_skt'] < 80 || $row['kuis_huruf'] < 80) {
        // Jika salah satu nilai kurang dari 80, tampilkan pesan dan redirect ke halaman lain
        echo '<script>alert("Anda tidak memiliki akses, nilai kuis suku kata atau huruf kurang dari 80 !");</script>';
        echo '<script>window.location.href = "halaman_belajar.php";</script>';
        exit; // Hentikan eksekusi skrip
    }
} else {
    // Jika terjadi kesalahan dalam eksekusi query, tampilkan pesan atau lakukan tindakan lain
    echo "Terjadi kesalahan dalam mengambil data kelas.";
    exit; // Hentikan eksekusi skrip
}

// Jika nilai kuis_skt dan kuis_huruf >= 80, maka beri akses ke halaman suku-kata.php

// Sesuaikan dengan halaman suku-kata.php
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
    </style>

</head>

<body>

    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="">
        <!-- Header-->
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <h1><a href="halaman_belajar.php"><span>Kelas <?php echo $_SESSION['level']; ?></span></a></h1>
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
        <!-- /#header -->
        <!-- Content -->
        <br><br><br><br><br><br>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div style="height:430px;" class="col-lg-12">
                    <div class="presentation" style="    position: absolute;height: 100%;width: 100%;    left: 0px;    top: 0px;    display: block;    overflow: hidden;background: #ffffff; /* Mengatur warna latar belakang menjadi putih */">
                        <!-- Defining the main presentation -->
                        <div id="presentation-counter">Proses...</div>
                        <div class="slides">
                            <!-- Defining slides -->

                            <?php
                            require_once("koneksi.php");
                            require_once("fsa.php");

                            // Tentukan jumlah data yang ingin ditampilkan per halaman
                            $per_page = 5;

                            // Tentukan halaman saat ini
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }

                            // Hitung offset untuk query
                            $offset = ($page - 1) * $per_page;

                            // Query untuk mengambil data dengan pagination
                            $query = "SELECT `madura`, `indonesia` FROM `kamus` WHERE keterangan='benda-rumah' LIMIT $per_page OFFSET $offset";
                            $result = mysqli_query($mysqli, $query);

                            ?>
                            <br>
                            <div class="buttons-container">
                                <a href="anggota-keluarga.php"><button type="button" class="btn btn-lg btn-danger">Anggota Keluarga</button></a>
                                <a href="benda-rumah.php"><button type="button" class="btn btn-lg btn-danger">Benda Dirumah</button></a>
                                <a href="anggota-badan.php"><button type="button" class="btn btn-lg btn-danger">Anggota Badan</button></a>
                            </div>
                            <table class="table table-bordered table-hover table-striped custom-table" style="text-align:center; width: 75%;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Kata</th>
                                        <th style="text-align:center">Suku Kata</th>
                                        <th style="text-align:center">Terjemahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($h = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><button type="button" class="btn btn-warning btn-lg" onClick=play("<?php echo $h['madura']; ?>")><?php echo $h['madura']; ?></button></td>
                                            <td>
                                                <?php
                                                $input_kata = proses_fsa($h['madura']);
                                                $pecah = explode('-', $input_kata);
                                                $i = 0;
                                                while ($i < sizeof($pecah) - 1) {
                                                    $kata = trim($pecah[$i]); // Menghilangkan spasi di awal dan akhir kata
                                                    if (!empty($kata)) { // Memastikan kata tidak kosong setelah trim
                                                ?>
                                                        <button type="button" class="btn btn-warning btn-lg" onClick=play("<?php echo $kata; ?>")><?php echo $kata; ?></button>
                                                <?php
                                                    }
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

                            <!-- Pagination links using Bootstrap -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php
                                    // Hitung jumlah total halaman
                                    $total_query = "SELECT COUNT(*) as total FROM `kamus` WHERE keterangan='benda-rumah'";
                                    $total_result = mysqli_query($mysqli, $total_query);
                                    $total_data = mysqli_fetch_assoc($total_result)['total'];
                                    $total_pages = ceil($total_data / $per_page);

                                    // Tampilkan link halaman
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                                    }
                                    ?>
                                </ul>
                            </nav>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div style="margin-top:5px;" class="col-lg-4">
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
    <script>
        let offset = 0;
        document.getElementById('nextButton').addEventListener('click', function() {
            offset += 5; // Assuming you fetch 5 records at a time
            fetchNextSet(offset);
        });

        function fetchNextSet(offset) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `fetch_next_set.php?offset=${offset}`, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.querySelector('#coba tbody').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</body>

</html>
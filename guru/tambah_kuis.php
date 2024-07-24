<?php
session_start();
include "../koneksi.php";

// Periksa apakah ada sesi id_user yang diset
if (!isset($_SESSION['id_user'])) {
    // Jika tidak ada, arahkan kembali ke halaman login atau halaman lainnya
    header("location: login.php");
    exit; // Hentikan eksekusi skrip
}
if ($_SESSION['level'] != 'guru') {
    // Jika tidak ada, arahkan kembali ke halaman login atau halaman lainnya
    header("location: ../login.php");
    exit; // Hentikan eksekusi skrip
}

if (isset($_POST['tambah'])) {
    $id_user = $_SESSION['id_user'];
    $jenis_kuis = $_POST['jenis_kuis'];
    $jenis = ''; // definisikan dulu variabel $jenis

    // Tentukan nilai $jenis berdasarkan jenis_kuis
    if ($jenis_kuis == 'huruf-angka') {
        $jenis = 'huruf-angka';
    } elseif ($jenis_kuis == 'suku-kata') {
        $jenis = 'suku-kata';
    } elseif ($jenis_kuis == 'kata') {
        $jenis = 'kata';
    } elseif ($jenis_kuis == 'bendahara-kata') {
        $jenis = 'bendahara-kata';
    } elseif ($jenis_kuis == 'kata-khusus') {
        $jenis = 'kata-khusus';
    } elseif ($jenis_kuis == 'kalimat') {
        $jenis = 'kalimat';
    }

    // Mengambil nomor qno terakhir dari tabel valid_kuis sesuai jenis_kuis
    $query = "SELECT qno FROM valid_kuis WHERE jenis_kuis = '$jenis' ORDER BY qno DESC LIMIT 1";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) == 0) {
        $qno = 22;
    } else {
        $row = mysqli_fetch_assoc($result);
        $qno = $row['qno'] + 1;
    }

    $question = $_POST['question'];
    $jwb1 = $_POST['jwb1'];
    $jwb2 = $_POST['jwb2'];
    $jwb3 = $_POST['jwb3'];
    $jwb4 = $_POST['jwb4'];
    $kunci_jawaban = $_POST['kunci_jawaban'];
    $proses = 'proses validasi';

    // Query untuk memasukkan data ke tabel valid_kuis
    $query = "INSERT INTO valid_kuis VALUES ('', '$id_user', '$qno', '$question', '$jwb1', '$jwb2', '$jwb3', '$jwb4', '$kunci_jawaban', '$jenis_kuis', '$proses')";

    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "<script type='text/javascript'>
            alert('Data akan di cek oleh admin, tunggu proses validasi');
            document.location = 'data_kamus.php#kuis';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Data Gagal Ditambah: " . mysqli_error($mysqli) . "');
            document.location = 'data_kamus.php#kuis';
        </script>";
    }
}
?>





<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Abhâsa Madhure</title>

    <link rel="apple-touch-icon" href="../image/sakera.png">
    <link rel="shortcut icon" href="../image/sakera.png">

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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor CSS Files -->
    <link href="../style/vendor/aos/aos.css" rel="stylesheet">
    <link href="../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../style/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../style/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../style/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../style/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../style/css/style.css" rel="stylesheet">
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
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="halaman_guru.php"><span>Ruang <?php echo $_SESSION['level']; ?></span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav id="navbar" class="navbar-item">
                <ul>
                    <li class="dropdown"><a href="halaman_guru.php"><span>Data Master</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#rombel">Data Rombel</a></li>
                            <li><a href="#anggota">Data Anggota Rombel</a></li>
                            <li><a href="#nilai">Data Nilai</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="data_kamus.php"><span>Data Kamus</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="data_kamus.php#sukukata">Suku Kata</a></li>
                            <li><a href="data_kamus.php#kata">Kata</a></li>
                            <li><a href="data_kamus.php#kalimat">Kalimat</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Hi, <?php echo $_SESSION['nama']; ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <br><br><br>
    <main id="main">
        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Tambah Data</h2>
                    <p>Kalimat</p>
                </div>
                <form method="POST" action="">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="exampleInputkode1" class="form-label">Pertanyaan :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="question" name="question" class="form-control" required="">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning btn-block" onclick="addCharacter('question', 'è')">Karakter &egrave;</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-block" onclick="addCharacter('question', 'â')">Karakter &acirc;</button>
                        </div>
                    </div><br>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="jwb1" class="form-label">Jawaban A :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="jwb1" name="jwb1" class="form-control" required="">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning btn-block" onclick="addCharacter('jwb1', 'è')">Karakter &egrave;</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-block" onclick="addCharacter('jwb1', 'â')">Karakter &acirc;</button>
                        </div>
                    </div><br>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="jwb2" class="form-label">Jawaban B :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="jwb2" name="jwb2" class="form-control" required="">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning btn-block" onclick="addCharacter('jwb2', 'è')">Karakter &egrave;</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-block" onclick="addCharacter('jwb2', 'â')">Karakter &acirc;</button>
                        </div>
                    </div><br>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="jwb3" class="form-label">Jawaban C :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="jwb3" name="jwb3" class="form-control" required="">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning btn-block" onclick="addCharacter('jwb3', 'è')">Karakter &egrave;</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-block" onclick="addCharacter('jwb3', 'â')">Karakter &acirc;</button>
                        </div>
                    </div><br>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="jwb4" class="form-label">Jawaban D :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="jwb4" name="jwb4" class="form-control" required="">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning btn-block" onclick="addCharacter('jwb4', 'è')">Karakter &egrave;</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-block" onclick="addCharacter('jwb4', 'â')">Karakter &acirc;</button>
                        </div>
                    </div><br>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="jwb4" class="form-label">Kunci Jawaban :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="kunci_jawaban" name="kunci_jawaban" class="form-control" required="">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning btn-block" onclick="addCharacter('kunci_jawaban', 'è')">Karakter &egrave;</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-block" onclick="addCharacter('kunci_jawaban', 'â')">Karakter &acirc;</button>
                        </div>
                    </div><br>
                    <div class="mb-3">
                        <label for="jenis_kuis" class="form-label">Jenis Kuis</label>
                        <select name="jenis_kuis" class="form-control" id="jenis_kuis" required="">
                            <option value="">Pilih</option>
                            <option value="huruf-angka">Huruf Angka</option>
                            <option value="suku-kata">Suku Kata</option>
                            <option value="kata">Kata</option>
                            <option value="bendahara-kata">Bendahara Kata</option>
                            <option value="kata-khusus">Kata Khusus</option>
                            <option value="kalimat">Kalimat</option>
                        </select>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
                    <script>
                        function addCharacter(elementId, character) {
                            var input = document.getElementById(elementId);
                            var currentValue = input.value;
                            input.value = currentValue + character;
                            input.focus();
                        }
                    </script>
                </form>

            </div>
        </section><!-- End Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
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
    <script src="../style/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../style/vendor/aos/aos.js"></script>
    <script src="../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../style/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../style/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../style/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../style/js/main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</body>

</html>
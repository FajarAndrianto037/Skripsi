<?php
session_start();
include "../koneksi.php";
?>
<?php
// Ambil id_user dan level dari sesi
$id_user = $_SESSION['id_user'];

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
                            <li><a href="#sukukata">Suku Kata</a></li>
                            <li><a href="#kata">Kata</a></li>
                            <li><a href="#kalimat">Kalimat</a></li>
                            <li><a href="#kuis">Kuis</a></li>
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
                    <p>Kelas Siswa</p>
                </div>
                <?php
                if (isset($_POST['edit'])) {
                    // Ambil data dari formulir
                    $id_kelas = $_POST['kelas_id'];
                    $set_nilai = $_POST['set_nilai'];

                    // Lakukan query untuk mengubah data kelas
                    $query =  mysqli_query($mysqli, "UPDATE `kelas` SET `set_nilai` = '$set_nilai' WHERE `kelas_id` = '$id_kelas'");
                    if ($query) {
                ?>
                        <script type="text/javascript">
                            alert('Nilai berhasil dirubah');
                            document.location = 'halaman_guru.php';
                        </script>
                <?php
                    } else {
                        // Redirect ke halaman utama dengan pesan gagal
                        header("location: set_nilai.php");
                        exit;
                    }
                }

                // Ambil id_kelas dari parameter URL
                $id_kelas = $_GET['kelas_id'];

                // Lakukan query untuk mendapatkan data kelas berdasarkan id_kelas
                $query_kelas = mysqli_query($mysqli, "SELECT * FROM `kelas` WHERE `kelas_id` = '$id_kelas'");
                if (!$query_kelas) {
                    // Tampilkan pesan kesalahan jika query tidak berhasil dieksekusi
                    die("Query untuk mendapatkan data kelas gagal.");
                }

                // Ambil data kelas
                $data_kelas = mysqli_fetch_assoc($query_kelas);

                // Periksa apakah data kelas ditemukan
                if (!$data_kelas) {
                    // Tampilkan pesan kesalahan jika data kelas tidak ditemukan
                    die("Data kelas dengan ID tersebut tidak ditemukan.");
                }
                ?>

                <!-- Form edit data kelas -->
                <form method="POST" action="">
                    <input type="hidden" name="kelas_id" value="<?php echo $data_kelas['kelas_id']; ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Set Nilai</label>
                        <input type="text" name="set_nilai" class="form-control" required="" aria-describedby="emailHelp" value="<?php echo $data_kelas['set_nilai']; ?>">
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary">Submit</button>
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
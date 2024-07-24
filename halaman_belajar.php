<?php
session_start();
include "koneksi.php";
?>
<?php
// Ambil id_user dan level dari sesi
$id_user = $_SESSION['id_user'];
$level_user = $_SESSION['level'];
$kelas_id = "10"; // Sesuaikan dengan ID kelas yang relevan

// Periksa apakah level user adalah 'umum'
if ($level_user == 'umum') {
  // Periksa apakah user sudah ada di dalam rombel_belajar
  $query_check = "SELECT * FROM `rombel_belajar` WHERE `id_user` = '$id_user' AND `kelas_id` = '$kelas_id'";
  $result_check = mysqli_query($mysqli, $query_check);

  // User belum ada dalam rombel_belajar, maka tambahkan
  $pengerjaan = "0";
  $kuis_huruf = 0;
  $kuis_skt = 0;
  $kuis_kata = 0;
  $kuis_bkata = 0;
  $kuis_pemula1 = 0;
  $kuis_khusus = 0;
  $kuis_kalimat = 0;
  $kuis_pemula2 = 0;
  $kuis_akhir = 0;

  if ((mysqli_num_rows($result_check) < 1) && ($level_user == 'umum')) {

    $query_insert = "INSERT INTO `rombel_belajar` VALUES ('', '$kelas_id', '$id_user', '$pengerjaan', '$kuis_huruf', '$kuis_skt', '$kuis_kata', '$kuis_bkata', '$kuis_pemula1', '$kuis_khusus', '$kuis_kalimat', '$kuis_pemula2', '$kuis_akhir')";
    $result_insert = mysqli_query($mysqli, $query_insert);
  }
}

// Periksa apakah ada sesi id_user yang diset
if (!isset($_SESSION['id_user'])) {
  // Jika tidak ada, arahkan kembali ke halaman login atau halaman lainnya
  header("location: login.php");
  exit; // Hentikan eksekusi skrip
}

$cek_id_user = $_SESSION['id_user'];
// Query untuk mengecek apakah pengguna sudah terdaftar di tabel rombel_belajar
$query_join = "SELECT * FROM rombel_belajar WHERE id_user = '$cek_id_user'";
$result_join = $mysqli->query($query_join);

if ($result_join->num_rows > 0) {
  // Ambil kelas_id dari hasil query
  $row_set = $result_join->fetch_assoc();
  $cek_kelas_id = $row_set['kelas_id'];

  // Query untuk mengambil nilai akhir berdasarkan kelas_id
  $query_set = "SELECT set_nilai FROM kelas WHERE kelas_id = $cek_kelas_id";
  $nilai_result = $mysqli->query($query_set);

  if ($nilai_result) {
    // Pastikan query berhasil dieksekusi
    if ($nilai_result->num_rows > 0) {
      // Ambil nilai akhir
      $nilai_row = $nilai_result->fetch_assoc();
      $nilai_akhir = $nilai_row['set_nilai'];

      // Simpan nilai akhir dalam sesi
      $_SESSION['set_nilai'] = $nilai_akhir;
    }
  } else {
    echo "Error: " . $mysqli->error; // Tampilkan pesan error jika query gagal
  }
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
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
          <h1><a href="halaman_belajar.php"><span>Ruang <?php echo $_SESSION['level']; ?> </span></a></h1>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero">
      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
      </svg>

    </section><!-- End Hero -->
    <!-- /#header -->
    <!-- Content -->
    <div class="">
      <!-- Animated -->
      <section id="features" class="features">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2>Abhâsa Madhure</h2><br>
            <p>Pembelajaran Bahasa Madura</p>
          </div>
          <?php

          $cek_id = $_SESSION['id_user'];
          // Query untuk mengecek apakah pengguna sudah terdaftar di tabel rombel_belajar
          $query_join = "SELECT * FROM rombel_belajar WHERE id_user = '$cek_id'";
          $result_join = mysqli_query($mysqli, $query_join);

          // Periksa apakah pengguna sudah terdaftar di tabel rombel_belajar
          if ($_SESSION['level'] == 'siswa' && mysqli_num_rows($result_join) == 0) {
            // Jika sudah, maka tombol "Gabung Kelas" akan dinonaktifkan
            $type = "submit";
          } else if ($_SESSION['level'] = 'siswa') {
            // Jika sudah, maka tombol "Gabung Kelas" akan dinonaktifkan
            $type = "hidden";
          } else {
            $type = "hidden";
          }

          ?>
          <a href="gabung_kelas.php"><input type="<?php echo $type ?>" class="btn btn-primary" value="gabung kelas"></a>
          <br><br>
          <h3>Pembelajaran Pemula 1</h3><br>
          <div class="row" data-aos="fade-left">
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="huruf-angka.php">Huruf & Angka</a></h3>
              </div>
              <?php
              // Ambil id_user dari session
              $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query = "SELECT kuis_huruf FROM rombel_belajar WHERE id_user = '$id_user'";
              $result = mysqli_query($mysqli, $query);

              // Periksa apakah query berhasil dieksekusi
              if ($result) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $kuis_huruf = $row['kuis_huruf'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_huruf . '</div>';
                } else {
                  $kuis_huruf = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_huruf . '</div>';
                }
              } else {
                $kuis_huruf = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_huruf . '</div>';
              }

              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_huruf; ?>%;" aria-valuenow="<?php echo $kuis_huruf; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="suku-kata.php">Suku Kata</a></h3>
              </div>
              <?php

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_skt = "SELECT kuis_skt FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_skt = mysqli_query($mysqli, $query_skt);

              // Periksa apakah query berhasil dieksekusi
              if ($result_skt) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_skt) > 0) {
                  $row_skt = mysqli_fetch_assoc($result_skt);
                  $kuis_skt = $row_skt['kuis_skt'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_skt . '</div>';
                } else {
                  $kuis_skt = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_skt . '</div>';
                }
              } else {
                $kuis_skt = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_skt . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_skt; ?>%;" aria-valuenow="<?php echo $kuis_skt; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="kata.php">Belajar Kata</a></h3>
              </div>
              <?php

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_kata = "SELECT kuis_kata FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_kata = mysqli_query($mysqli, $query_kata);

              // Periksa apakah query berhasil dieksekusi
              if ($result_kata) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_kata) > 0) {
                  $row_kata = mysqli_fetch_assoc($result_kata);
                  $kuis_kata = $row_kata['kuis_kata'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_kata . '</div>';
                } else {
                  $kuis_kata = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_kata . '</div>';
                }
              } else {
                $kuis_kata = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_kata . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_kata; ?>%;" aria-valuenow="<?php echo $kuis_kata; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="bendahara-kata.php">Bendahara Kata</a></h3>
              </div>
              <?php
              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_bkata = "SELECT kuis_bkata FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_bkata = mysqli_query($mysqli, $query_bkata);

              // Periksa apakah query berhasil dieksekusi
              if ($result_bkata) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_bkata) > 0) {
                  $row_bkata = mysqli_fetch_assoc($result_bkata);
                  $kuis_bkata = $row_bkata['kuis_bkata'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_bkata . '</div>';
                } else {
                  $kuis_bkata = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_bkata . '</div>';
                }
              } else {
                $kuis_bkata = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_bkata . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_bkata; ?>%;" aria-valuenow="<?php echo $kuis_bkata; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="quiz/quiz-pemula1/halaman-pemula1.php">Kuis Pemula 1</a></h3>
              </div>
              <?php

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_pemula1 = "SELECT kuis_pemula1 FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_pemula1 = mysqli_query($mysqli, $query_pemula1);

              // Periksa apakah query berhasil dieksekusi
              if ($result_pemula1) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_pemula1) > 0) {
                  $row_pemula1 = mysqli_fetch_assoc($result_pemula1);
                  $kuis_pemula1 = $row_pemula1['kuis_pemula1'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_pemula1 . '</div>';
                } else {
                  $kuis_pemula1 = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_pemula1 . '</div>';
                }
              } else {
                $kuis_pemula1 = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_pemula1 . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_pemula1; ?>%;" aria-valuenow="<?php echo $kuis_pemula1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
          </div>
          <br><br>
          <h3>Pembelajaran Pemula 2</h3><br>
          <div class="row" data-aos="fade-left">
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="halaman-kata-khusus.php">Kata Khusus</a></h3>
              </div>
              <?php

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_khusus = "SELECT kuis_khusus FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_khusus = mysqli_query($mysqli, $query_khusus);

              // Periksa apakah query berhasil dieksekusi
              if ($result_khusus) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_khusus) > 0) {
                  $row_khusus = mysqli_fetch_assoc($result_khusus);
                  $kuis_khusus = $row_khusus['kuis_khusus'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_khusus . '</div>';
                } else {
                  $kuis_khusus = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_khusus . '</div>';
                }
              } else {
                $kuis_khusus = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_khusus . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_khusus; ?>%;" aria-valuenow="<?php echo $kuis_khusus; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="halaman-kalimat.php">Kalimat</a></h3>
              </div>
              <?php

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_kalimat = "SELECT kuis_kalimat FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_kalimat = mysqli_query($mysqli, $query_kalimat);

              // Periksa apakah query berhasil dieksekusi
              if ($result_kalimat) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_kalimat) > 0) {
                  $row_kalimat = mysqli_fetch_assoc($result_kalimat);
                  $kuis_kalimat = $row_kalimat['kuis_kalimat'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_kalimat . '</div>';
                } else {
                  $kuis_kalimat = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_kalimat . '</div>';
                }
              } else {
                $kuis_kalimat = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_kalimat . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_kalimat; ?>%;" aria-valuenow="<?php echo $kuis_kalimat; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                <h3><a href="kamus.php">Terjemah Bahasa</a></h3>
              </div>
              <div class="por-txt">Tidak Ada Kuis : 0</div>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 0%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="quiz/quiz-pemula2/halaman-pemula2.php">Kuis Pemula 2</a></h3>
              </div>
              <?php

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_pemula2 = "SELECT kuis_pemula2 FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_pemula2 = mysqli_query($mysqli, $query_pemula2);

              // Periksa apakah query berhasil dieksekusi
              if ($result_pemula2) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_pemula2) > 0) {
                  $row_pemula2 = mysqli_fetch_assoc($result_pemula2);
                  $kuis_pemula2 = $row_pemula2['kuis_pemula2'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_pemula2 . '</div>';
                } else {
                  $kuis_pemula2 = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_pemula2 . '</div>';
                }
              } else {
                $kuis_pemula2 = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_pemula2 . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_pemula2; ?>%;" aria-valuenow="<?php echo $kuis_pemula2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="ri-calendar-todo-line" style="color: #ffbb2c;"></i>
                <h3><a href="quiz/quiz-akhir/halaman-akhir.php">Kuis Penilaian Akhir</a></h3>
              </div>
              <?php

              // Query untuk mengambil nilai kuis_huruf dari tabel kelas
              $query_akhir = "SELECT kuis_akhir FROM rombel_belajar WHERE id_user = '$id_user'";
              $result_akhir = mysqli_query($mysqli, $query_akhir);

              // Periksa apakah query berhasil dieksekusi
              if ($result_akhir) {
                // Ambil hasil dari query
                if (mysqli_num_rows($result_akhir) > 0) {
                  $row_akhir = mysqli_fetch_assoc($result_akhir);
                  $kuis_akhir = $row_akhir['kuis_akhir'];
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_akhir . '</div>';
                } else {
                  $kuis_akhir = 0; // Jika tidak ada hasil dari query
                  echo '<div class="por-txt">Score Kuis : ' . $kuis_akhir . '</div>';
                }
              } else {
                $kuis_akhir = 0; // Jika query gagal dieksekusi
                echo '<div class="por-txt">Score Kuis : ' . $kuis_akhir . '</div>';
              }
              ?>
              <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo $kuis_akhir; ?>%;" aria-valuenow="<?php echo $kuis_akhir; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <br><br>
            </div>
          </div>
        </div>
      </section><!-- End Features Section -->

      <!-- ======= Details Section ======= -->
    <!-- .animated -->
  </div>
  <!-- /.content -->
  <div class="clearfix"></div>
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
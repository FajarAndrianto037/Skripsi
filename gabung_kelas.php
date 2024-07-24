<?php
session_start();
include 'koneksi.php';
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Abhâsa Madhure</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="style/img/sakera.png" rel="icon">
  <link href="style/img/sakera.png" rel="sakera">

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

  <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukkan Kode Kelas</title>
    <!-- Tambahkan stylesheet modal Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>

  <body>
    <!-- The Modal -->
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
          <h1><a href="halaman_belajar.php"><span>Ruang Siswa</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="style/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar-item">
          <ul>
            <li class="dropdown"><a href="#"><span>Pemula 1</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="pemula-1/huruf_angka.php#huruf_angka">Huruf & Angka</a></li>
                <li><a href="#">Suku Kata</a></li>
                <li><a href="#">Kata</a></li>
                <li><a href="#">Bendahara Kata</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Pemula 2</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Kata Khusus</a></li>
                <li><a href="#">Kalimat</a></li>
                <li><a href="#">Terjemah</a></li>
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

    <main id="main">
      <?php

      // Fungsi untuk menambahkan siswa ke dalam rombel
      function tambahkanSiswaKeRombel($mysqli, $kelas_id, $id_user)
      {
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
        $query = "INSERT INTO `rombel_belajar` VALUES ('','$kelas_id', '$id_user','$pengerjaan', '$kuis_huruf', '$kuis_skt', '$kuis_kata', '$kuis_bkata', '$kuis_pemula1', '$kuis_khusus', '$kuis_kalimat', '$kuis_pemula2', '$kuis_akhir')"; // Koreksi pengaturan nilai kolom
        $result = mysqli_query($mysqli, $query);
        return $result;
      }

      // Fungsi untuk memeriksa kode kelas
      function periksaKodeKelas($mysqli, $kode_kelas)
      {
        $query = "SELECT * FROM kelas WHERE kode = '$kode_kelas'"; // Koreksi penulisan nama kolom
        $result = mysqli_query($mysqli, $query);
        return $result;
      }

      // Cek jika form disubmit
      if (isset($_POST['simpan'])) {
        include "koneksi.php"; // Sertakan file koneksi database

        $kode_kelas = $_POST['kode_kelas'];
        $id_user = $_SESSION['id_user'];

        // Periksa kode kelas
        $result_kelas = periksaKodeKelas($mysqli, $kode_kelas);

        if ($result_kelas) { // Periksa jika query berhasil dieksekusi
          if (mysqli_num_rows($result_kelas) > 0) { // Periksa jika ada hasil dari query
            $row_kelas = mysqli_fetch_assoc($result_kelas);
            if (isset($row_kelas['kelas_id'])) { // Periksa apakah 'kelas_id' ada dalam hasil query
              $kelas_id = $row_kelas['kelas_id']; // Ambil kelas_id dari hasil query

              // Tambahkan siswa ke dalam rombel
              $result_tambah = tambahkanSiswaKeRombel($mysqli, $kelas_id, $id_user);

              if ($result_tambah) {
                echo "<script type='text/javascript'>
                    alert('Anda berhasil bergabung ke kelas');
                    document.location='halaman_belajar.php';
                    </script>";
              } else {
                echo "<script type='text/javascript'>
                    alert('Gagal Tambah Siswa');
                    </script>";
              }
            } else {
              echo "Kode kelas tidak valid.";
            }
          } else {
            echo "Kode kelas tidak valid.";
          }
        } else {
          // Tangani kesalahan eksekusi query
          echo "Error: " . mysqli_error($mysqli);
        }

        mysqli_close($mysqli); // Tutup koneksi setelah selesai
      }
      ?>
      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2>Abhâsa Madhure</h2>
            <p>Gabung Kelas</p>
          </div>
          <form method="POST" action="">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Kode Kelas</label>
              <input type="text" name="kode_kelas" class="form-control" id="" required="" aria-describedby="emailHelp">
            </div>
            <input type="submit" name="simpan" class="btn btn-primary" value="submit">
          </form>
        </div>
      </section><!-- End Features Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team">
        <div class="container">

        </div>
      </section><!-- End Team Section -->

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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

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
    <script>
      // Fungsi untuk menampilkan modal saat halaman dimuat
      function tampilkanModal() {
        $('#myModal').modal('show');
      }

      // Panggil fungsi saat halaman dimuat
      $(document).ready(function() {
        tampilkanModal();
      });
    </script>


  </body>

  </html>
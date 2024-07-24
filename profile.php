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

  <style>
    body {
      background: #eee;
    }

    .card {
      border: none;

      position: relative;
      overflow: hidden;
      border-radius: 8px;
      cursor: pointer;
    }

    .card:before {

      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background-color: #E1BEE7;
      transform: scaleY(1);
      transition: all 0.5s;
      transform-origin: bottom
    }

    .card:after {

      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background-color: #d9a711;
      transform: scaleY(0);
      transition: all 0.5s;
      transform-origin: bottom
    }

    .card:hover::after {
      transform: scaleY(1);
    }


    .fonts {
      font-size: 11px;
    }

    .social-list {
      display: flex;
      list-style: none;
      justify-content: center;
      padding: 0;
    }

    .social-list li {
      padding: 10px;
      color: #d9a711;
      font-size: 19px;
    }


    .buttons button:nth-child(1) {
      border: 1px solid #d9a711 !important;
      color: #000000;
      height: 40px;
    }

    .buttons button:nth-child(1):hover {
      border: 1px solid #d9a711 !important;
      color: #fff;
      height: 40px;
      background-color: #d9a711;
    }

    .buttons button:nth-child(2) {
      border: 1px solid #d9a711 !important;
      background-color: #d9a711;
      color: #fff;
      height: 40px;
    }
  </style>

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
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
          <h1><a href="halaman_belajar.php"><span>Ruang <?php echo $_SESSION['level']; ?></span></a></h1>
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

    <main id="main">
      <section>
        <div class="container mt-5">

          <div class="row d-flex justify-content-center">

            <div class="col-md-7">

              <div class="card p-3 py-4">
                <?php
                if ($_SESSION['level'] == 'siswa') {
                  $image = 'image/siswa.png';
                  $text = 'Selamat datang, terima kasih Anda telah menggunakan sistem pembelajaran permulaan bahasa Madura yang dibuat oleh Fajar Andrianto. Silakan nikmati fitur pembelajaran dan gunakan aplikasi ini sebagai media pembelajaran.';
                  $level = 'Siswa';
                } elseif ($_SESSION['level'] == 'guru') {
                  $image = 'image/guru.png';
                  $text = 'Selamat datang, terima kasih. Untuk guru, ada beberapa fitur untuk memperbaiki sistem. Gunakan aplikasi ini sebagai media pembelajaran di sekolah.';
                  $level = 'Guru';
                } elseif ($_SESSION['level'] == 'umum') {
                  $image = 'image/umum.png';
                  $text = 'Selamat datang, terima kasih Anda telah menggunakan sistem pembelajaran permulaan bahasa Madura yang dibuat oleh Fajar Andrianto. Sistem ini bisa Anda gunakan sebagai ilmu pengetahuan, terutama tentang bahasa Madura.';
                  $level = 'Umum';
                }
                ?>
                <div class="text-center">
                  <img src="<?php echo $image; ?>" width="100" class="rounded-circle">
                </div>
                <div class="text-center mt-3">
                  <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $_SESSION['nama']; ?></span>
                  <br><br>
                  <h7>Anda Login Sebagai</h7>
                  <br>
                  <h6 class="mt-2 mb-0"><?php echo $level; ?></h6>
                  <div class="px-4 mt-1">
                    <p class="fonts"><?php echo $text; ?></p>
                  </div>
                  <br><br>
                  <div class="buttons">
                    <a href="logout.php"><button class="btn btn-outline-primary px-4">Keluar</button></a>
                    <a href="edit_user.php?edit=<?php echo $_SESSION['id_user']; ?>"><button class="btn btn-warning px-4 ms-3">Edit Profil</button></a>
                  </div>
                </div>
              </div>


            </div>

          </div>

        </div>
      </section>


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
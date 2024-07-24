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
  <link href="style/vendor/bootstrap/css/quiz.css" rel="stylesheet" />
  <!-- Link CDN Quiz-->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

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

    <!-- ======= Features Section ======= -->
    <br><br><br>
         <section class="page-section" id="contact">
            <div class="container" id="quiz">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Soal Penilaian Akhir</h2>
                <div class="container-quiz mt-sm-5 my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>Q. which option best describes your job role?</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">Small Business Owner or Employee
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Nonprofit Owner or Employee
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Journalist or Activist
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Other
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="d-flex align-items-center pt-3">
                <div id="prev">
                    <button class="btn btn-primary">Previous</button>
                </div>
                <div class="ml-auto mr-sm-5">
                    <button class="btn btn-success">Next</button>
                </div>
            </div>
        </div>
            </div>
        </section>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Abhâsa Madhure</h3>
              <p class="pb-3"><em>Sistem pembelajaran permulaan bahasa Madura yang mudah di pahami.</em></p>
              <p>
                Devloper <br>
                Fajar Andrianto<br><br>
                <strong>Nomor:</strong> +62 8573-2526-157<br>
                <strong>Email:</strong> fajarandrianto56@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4> Menu Aplikasi</h4>
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">Tentang Aplikasi</a></li>
              <li><a class="nav-link scrollto" href="#features">Pembelajaran</a></li>
              <li><a class="nav-link scrollto" href="#details">Petunjuk Pembelajaran</a></li>
              <li><a class="nav-link scrollto" href="#contact">Sing In</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Jasa Website</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Profile</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Sekolah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Organiasai</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Desa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Berita</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Qoutes</h4>
            <p>"Sebaik-baiknya manusia dia yang bermanfaat bagi orang lain"</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Fajar Andrainto</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
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
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  <script>
  // Fungsi untuk menampilkan modal saat halaman dimuat
  function tampilkanModal() {
    $('#myModal').modal('show');
  }

  // Panggil fungsi saat halaman dimuat
  $(document).ready(function(){
    tampilkanModal();
  });
</script>


</body>

</html>
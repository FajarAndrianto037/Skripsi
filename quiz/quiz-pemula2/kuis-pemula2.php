<?php
session_start();
include "../../koneksi.php";
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
  <link href="../../style/img/sakera.png" rel="icon">
  <link href="../../style/img/sakera.png" rel="sakera">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="../../style/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../style/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../style/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../style/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../style/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../style/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../style/css/style.css" rel="stylesheet">
  <link href="../../style/vendor/bootstrap/css/quiz.css" rel="stylesheet" />
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
    <?php
    include 'header.php';
    ?>
    <!-- End Header -->

    <main id="main">
      <?php

      if (isset($_SESSION['rombel_id'])) {

        if (isset($_GET['n']) && is_numeric($_GET['n'])) {
          $qno = $_GET['n'];
          // Perbarui nomor soal di session
          $_SESSION['quiz'] = $qno;
        } else {
          // Jika nomor soal tidak valid, arahkan ke nomor soal terakhir yang disimpan di session
          header('location: kuis-pemula2.php?n=' . $_SESSION['quiz']);
          exit; // Hentikan eksekusi skrip setelah redirect
        }
        // Kategori kuis yang akan dipilih secara acak
        $kategori_kuis = array('kata-khusus', 'kalimat');

        // Gabungkan kategori kuis ke dalam format yang sesuai untuk query
        $kategori_string = "'" . implode("','", $kategori_kuis) . "'";

        if ($_SESSION['quiz'] == 1) {
          $_SESSION['qid_list'] = [];
          // $qid_list = $_SESSION['qid_list'];
        }
        if (!empty($_SESSION['qid_list'])) {
          $qid_list_str = implode(',', array_map('intval', $_SESSION['qid_list']));
          // var_dump(($qid_list_str));
          // $query = "SELECT * FROM questions WHERE id NOT IN ($qid_list_str) LIMIT 1";
          $query = "SELECT * FROM kuis_pembelajaran WHERE jenis_kuis IN ($kategori_string) AND qid NOT IN ($qid_list_str) ORDER BY RAND() LIMIT 1";
        } else {
          // Jika qid_list kosong, ambil soal acak
          $query = "SELECT * FROM kuis_pembelajaran WHERE jenis_kuis IN ($kategori_string) ORDER BY RAND() LIMIT 1";
        }
        // $qid_list_str = implode(',', array_map('intval', $qid_list));


        $run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        if (mysqli_num_rows($run) > 0) {
          $row = mysqli_fetch_array($run);
          $qid = $row['qid'];
          $question = $row['question'];
          $jwb1 = $row['jwb1'];
          $jwb2 = $row['jwb2'];
          $jwb3 = $row['jwb3'];
          $jwb4 = $row['jwb4'];
          $jawaban = $row['kunci_jawaban'];
          // Menghitung jumlah total soal berdasarkan jenis 'pemula2-angka'
          $total_pemula2_angka = "SELECT * FROM kuis_pembelajaran WHERE jenis_kuis IN ($kategori_string)";
          $run_pemula2_angka = mysqli_query($mysqli, $total_pemula2_angka) or die(mysqli_error($mysqli));
          $total_pemula2_angka_qn = mysqli_num_rows($run_pemula2_angka);
        } else {
          echo "<script> alert('Something went wrong');
    window.location.href = 'home.php'; </script> ";
          exit; // Hentikan eksekusi skrip jika terjadi kesalahan
        }
      } else {
        echo "<script> alert('Error');
    window.location.href = 'home.php'; </script> ";
        exit; // Hentikan eksekusi skrip jika session rombel_id tidak ada
      }
      ?>


      <!-- Bagian HTML -->
      <br><br><br>
      <section class="page-section" id="contact">
        <div class="container d-flex justify-content-center align-items-center vh-50" id="quiz">
          <div class="question p-5  w-100">
            <p>Question <?php echo $qno; ?> of 20</p>
            <b>
              <h4 class="question w-100"><?php echo $qno, '. ', $question; ?></h4>
            </b>
            <br>
            <div class="mb-4">
              <form method="post" action="proses-pemula2.php">
                <div class="question">
                  <div class="" id="options">
                    <label class="options"><?php echo $jwb1; ?>
                      <input name="choice" type="radio" value="a" required="">
                      <span class="checkmark"></span>
                    </label>
                    <label class="options"><?php echo $jwb2; ?>
                      <input name="choice" type="radio" value="b" required="">
                      <span class="checkmark"></span>
                    </label>
                    <label class="options"><?php echo $jwb3; ?>
                      <input name="choice" type="radio" value="c" required="">
                      <span class="checkmark"></span>
                    </label>
                    <label class="options"><?php echo $jwb4; ?>
                      <input name="choice" type="radio" value="d" required="">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                  <!-- Tambahkan logika untuk tombol Previous -->
                  <div class="ml-auto mr-sm-5">
                    <button class="btn btn-success" id="submit" type="submit">Simpan</button>
                  </div>
                </div>
                <input type="hidden" name="qid" value="<?php echo $qid; ?>">
              </form>
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
    <script src="../../style/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../../style/vendor/aos/aos.js"></script>
    <script src="../../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../style/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../style/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../style/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../style/js/main.js"></script>
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
      $(document).ready(function() {
        tampilkanModal();
      });
    </script>
  </body>

  </html>
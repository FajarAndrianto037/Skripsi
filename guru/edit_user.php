<?php
session_start();
include '../koneksi.php';
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
  <link rel="apple-touch-icon" href="../image/sakera.png">
  <link rel="shortcut icon" href="../image/sakera.png">

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
          <h1><a href="halaman_guru.php"><span>Ruang Siswa</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="../style/img/logo.png" alt="" class="img-fluid"></a>-->
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
                <li><a href="data_kamus.php#kuis">Kuis</a></li>
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

    <!-- ======= Hero Section ======= -->

    <main id="main">


      <!-- ======= Team Section ======= -->
      <section id="team" class="team">
        <div class="container">
          <div class="card-body">
            <br>
            <?php
            // Periksa apakah ada data yang dikirimkan melalui POST
            if (isset($_POST['simpan'])) {
              $id = $_GET['edit']; // Ambil ID user dari URL
              $nama = $_POST['nama'];
              $username = $_POST['username'];
              $password = $_POST['password'];
              $level = $_POST['level'];

              // Lakukan pembaruan data
              $query_edit = mysqli_query($mysqli, "UPDATE `user` SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id'");
              if ($query_edit) {
            ?>
                <script type="text/javascript">
                  alert('Data berhasil diedit');
                  window.location = 'halaman_belajar.php'; // Redirect ke halaman index setelah berhasil diedit
                </script>
              <?php
              } else {
                echo "Error: " . mysqli_error($mysqli); // Tampilkan pesan error MySQL
              }
            }

            // Periksa apakah ada parameter edit yang diterima melalui GET
            if (isset($_GET['edit'])) {
              $id = $_GET['edit'];

              // Ambil data user yang akan diedit dari database
              $query = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user='$id'");
              $data = mysqli_fetch_assoc($query);
              ?>
              <form method="post">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>" id="nama">
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>" id="username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" value="<?php echo $data['password'] ?>" id="password">
                </div>
                <div class="mb-3">
                  <label for="level" class="form-label">Level</label>
                  <select name="level" class="form-control" id="level">
                    <option value="admin" <?php if ($data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="guru" <?php if ($data['level'] == 'guru') echo 'selected'; ?>>Guru</option>
                    <option value="siswa" <?php if ($data['level'] == 'siswa') echo 'selected'; ?>>Siswa</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" name="simpan" class="btn btn-primary">Edit</button>
                </div>
              </form>
            <?php } ?>
          </div> <!-- /.card -->
        </div> <!-- /.container -->
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
    <script src="../style/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../style/vendor/aos/aos.js"></script>
    <script src="../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../style/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../style/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../style/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../style/js/main.js"></script>
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
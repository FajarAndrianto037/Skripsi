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
<!DOCTYPE html>
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

  <!-- Include Bootstrap CSS and Font Awesome for icons -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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

  <!-- /#left-panel -->
  <!-- Right Panel -->
  <div id="right-panel" class="">
    <!-- Header-->
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
                <li><a href="data_kamus.php#kuis">Kuis</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Hi, <?php echo $_SESSION['nama']; ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="halaman_arsip.php">Arsip</a></li>
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->
    <!-- Content -->
    <div class="">
      <!-- Animated -->
      <br><br><br><br>
      <section>
        <div class="container">
          <div class="row" data-aos="fade-left">
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-secondary">
                <div class="card-body pb-0">
                  <div class="dropdown float-right">
                    <i class="fa fa-profile"></i>
                  </div>
                  <?php
                  // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                  $query_kelas = "SELECT kelas, sekolah, kode FROM kelas WHERE id_user = '$id_user'";
                  $result_kelas = mysqli_query($mysqli, $query_kelas);

                  // Inisialisasi nilai default
                  $nama_kelas = 'tidak punya kelas';
                  $nama_sekolah = 'belum terdaftar';
                  $kode_class = 'belum buat kelas';

                  // Periksa apakah query berhasil dan mengembalikan data
                  if ($result_kelas && mysqli_num_rows($result_kelas) > 0) {
                    $row_kelas = mysqli_fetch_assoc($result_kelas);
                    $nama_kelas = $row_kelas['kelas'];
                    $nama_sekolah = $row_kelas['sekolah'];
                    $kode_class = $row_kelas['kode'];
                  }
                  ?>

                  <h4 class="mb-0">
                    <span class="count">Kelas Anda</span>
                  </h4>
                  <p class="text-light"><?php echo $nama_kelas; ?></p>
                  <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-secondary">
                <div class="card-body pb-0">
                  <div class="dropdown float-right">
                    <i class="fa fa-profile"></i>
                  </div>
                  <h4 class="mb-0">
                    <span class="count">Jumlah Siswa</span>
                  </h4>
                  <?php

                  // Inisialisasi nilai default
                  $total_baris = 0;

                  // Pastikan kelas_id di-set di dalam sesi
                  if (isset($_SESSION['kelas_id'])) {
                    $kelas_cek = $_SESSION['kelas_id'];

                    // Query untuk menghitung jumlah baris
                    $total_baris_query = "SELECT COUNT(*) AS total3 FROM rombel_belajar WHERE kelas_id = $kelas_cek";

                    // Eksekusi query
                    $result = mysqli_query($mysqli, $total_baris_query);

                    // Periksa apakah query berhasil
                    if ($result) {
                      // Ambil hasil query
                      $row = mysqli_fetch_assoc($result);
                      $total_baris = $row['total3'];
                    }
                  }
                  ?>

                  <p class="text-light">Total Siswa: <?php echo $total_baris; ?></p>
                  <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-secondary">
                <div class="card-body pb-0">
                  <div class="dropdown float-right">
                    <i class="fa fa-profile"></i>
                  </div>
                  <h4 class="mb-0">
                    <span class="count">Sekolah</span>
                  </h4>
                  <p class="text-light"><?php echo $nama_sekolah; ?></p>
                  <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-secondary">
                <div class="card-body pb-0">
                  <div class="dropdown float-right">
                    <i class="fa fa-profile"></i>
                  </div>
                  <h4 class="mb-0">
                    <span class="count">Kode Kelas</span>
                  </h4>
                  <p class="text-light"><?php echo $kode_class; ?></p>
                  <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ======= Details Section ======= -->
      <section id="rombel" class="rombel">
        <div class="container">



          <div class="section-title" data-aos="fade-up">
            <h2>Abhâsa Madhure</h2><br>
            <p>Data Rombel Kelas</p>
          </div>
          <?php
          // Query untuk mendapatkan data halaman saat ini
          $query = "SELECT * FROM kelas WHERE id_user = '$id_user' ";
          $query .= " ORDER BY kelas_id DESC";
          $result = mysqli_query($mysqli, $query);
          $result_cek = mysqli_query($mysqli, $query);
          $total_rows = mysqli_num_rows($result_cek);
          if ($result_cek) {
            // Mengambil data hasil query
            $row = $result_cek->fetch_assoc();

            // Periksa apakah user memiliki kelas
            if (!empty($row['kelas_id'])) {
              // Jika user memiliki kelas, simpan kelas_id ke dalam sesi
              $_SESSION['kelas_id'] = $row['kelas_id'];
              $_SESSION['kelas'] = $row['kelas'];
              $kelas_cek = $_SESSION['kelas_id'];
            }
          }

          if (!$result) {
            die("Query Error: " . mysqli_error($mysqli));
          }

          // Nomor urutan untuk baris saat ini
          $nomor = $total_rows;
          ?>

          <!-- Form Pencarian dan Tombol Tambah -->
          <div class="d-flex justify-content-between align-items-center mb-3">
            <?php

            $cek_id = $_SESSION['id_user'];
            // Query untuk mengecek apakah pengguna sudah terdaftar di tabel rombel_belajar
            $query_join = "SELECT * FROM kelas WHERE id_user = '$cek_id'";
            $result_join = mysqli_query($mysqli, $query_join);

            // Periksa apakah pengguna sudah terdaftar di tabel rombel_belajar
            if (mysqli_num_rows($result_join) == 0) {
              // Jika sudah, maka tombol "Gabung Kelas" akan dinonaktifkan
              $type = "submit";
            } else {
              $type = "hidden";
            }

            ?>
            <a href="tambah_kelas.php"><input type="<?php echo $type ?>" class="btn btn-success" value="Buat Kelas"></a>
          </div>

          <table id="bootstrap-data-table-export" class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Sekolah</th>
                <th scope="col">Kode Kelas</th>
                <th scope="col">Set Nilai</th>
                <th scope="col" class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_GET['arsip'])) {
                // Sanitize the input to prevent SQL injection
                $id_arsip = mysqli_real_escape_string($mysqli, $_GET['arsip']);

                // Query to select the class data
                $query_valid = "SELECT * FROM `kelas` WHERE `kelas_id` = '$id_arsip'";
                $result_valid = mysqli_query($mysqli, $query_valid);

                if ($result_valid && mysqli_num_rows($result_valid) > 0) {
                  $data_valid = mysqli_fetch_assoc($result_valid);
                  $id_kel = $data_valid['kelas_id'];
                  $id_use = $data_valid['id_user'];
                  $kelas = $data_valid['kelas'];
                  $sekolah = $data_valid['sekolah'];
                  $kode_kelas = $data_valid['kode'];
                  $set_nilai = $data_valid['set_nilai'];

                  // Query to insert data into arsip table
                  $query_insert = "INSERT INTO `arsip_kelas` VALUES ('$id_kel', '$id_use', '$kelas', '$kode_kelas', '$sekolah', '$set_nilai')";
                  $insert_success = mysqli_query($mysqli, $query_insert);

                  if ($insert_success) {
                    // Query to select the class data from rombel_belajar
                    $query_arsip = "SELECT * FROM `rombel_belajar` WHERE `kelas_id` = '$id_arsip'";
                    $result_arsip = mysqli_query($mysqli, $query_arsip);

                    if ($result_arsip && mysqli_num_rows($result_arsip) > 0) {
                      while ($data_arsip = mysqli_fetch_assoc($result_arsip)) {
                        $id_kel = $data_arsip['kelas_id'];
                        $id_us = $data_arsip['id_user'];
                        $pengerjaan = $data_arsip['pengerjaan'];
                        $kuis_huruf = $data_arsip['kuis_huruf'];
                        $kuis_skt = $data_arsip['kuis_skt'];
                        $kuis_kata = $data_arsip['kuis_kata'];
                        $kuis_bkata = $data_arsip['kuis_bkata'];
                        $kuis_pemula1 = $data_arsip['kuis_pemula1'];
                        $kuis_khusus = $data_arsip['kuis_khusus'];
                        $kuis_kalimat = $data_arsip['kuis_kalimat'];
                        $kuis_pemula2 = $data_arsip['kuis_pemula2'];
                        $kuis_akhir = $data_arsip['kuis_akhir'];

                        // Query to insert data into arsip_rombel table
                        $query_ar = "INSERT INTO `arsip_rombel` VALUES ('', '$id_kel', '$id_us', '$pengerjaan', '$kuis_huruf', '$kuis_skt', '$kuis_kata', '$kuis_bkata', '$kuis_pemula1', '$kuis_khusus', '$kuis_kalimat', '$kuis_pemula2', '$kuis_akhir')";
                        mysqli_query($mysqli, $query_ar);
                      }
                      // Query to delete data from rombel_belajar table
                      $query_del = "DELETE FROM `rombel_belajar` WHERE `kelas_id` = '$id_arsip'";
                      $delete_success = mysqli_query($mysqli, $query_del);

                      if ($delete_success) {
                        // Query to delete data from kelas table after deleting rombel_belajar
                        $query_delete = "DELETE FROM `kelas` WHERE `kelas_id` = '$id_arsip'";
                        $delete_success = mysqli_query($mysqli, $query_delete);

                        if ($delete_success) {
                          echo "<script type='text/javascript'>
                            alert('Berhasil diarsipkan');
                            document.location='halaman_guru.php';
                            </script>";
                        } else {
                          echo "<script type='text/javascript'>
                            alert('Gagal menghapus data dari tabel kelas');
                            document.location='halaman_guru.php';
                            </script>";
                        }
                      } else {
                        echo "<script type='text/javascript'>
                        alert('Gagal menghapus data dari tabel rombel_belajar');
                        document.location='halaman_guru.php';
                        </script>";
                      }
                    }
                  } else {
                    echo "<script type='text/javascript'>
                alert('Gagal memasukkan data ke tabel arsip');
                document.location='halaman_guru.php';
                </script>";
                  }
                } else {
                  echo "<script type='text/javascript'>
            alert('Data tidak ditemukan');
            document.location='halaman_guru.php';
            </script>";
                }
              }
              ?>
              <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo htmlspecialchars($data['kelas']); ?></td>
                  <td><?php echo htmlspecialchars($data['sekolah']); ?></td>
                  <td><?php echo htmlspecialchars($data['kode']); ?></td>
                  <td><?php echo htmlspecialchars($data['set_nilai']); ?></td>
                  <td class="text-center">
                    <a href="set_nilai.php?kelas_id=<?php echo htmlspecialchars($data['kelas_id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i> Ubah Nilai</a>
                    <a href="?arsip=<?php echo htmlspecialchars($data['kelas_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin mengarsipkan kelas?')"><i class="fas fa-trash"></i> Arsipkan</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </section>
      <?php
      // Periksa apakah user memiliki kelas
      if (!empty($row['kelas_id'])) {
      ?>
        <section id="anggota" class="anggota">
          <div class="container">
            <div class="section-title" data-aos="fade-up">
              <h2>Abhâsa Madhure</h2><br>
              <p>Data Anggota Rombel</p>
            </div>
            <?php
            // Assuming $mysqli is your MySQLi connection object

            // Set jumlah baris per halaman
            $limit3 = 5;

            // Dapatkan nomor halaman saat ini dari parameter URL, default ke 1 jika tidak ada
            $page3 = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            // Dapatkan kata kunci pencarian dari parameter URL, default ke kosong jika tidak ada
            $search3 = isset($_GET['search3']) ? $_GET['search3'] : '';

            // Hitung offset untuk query SQL
            $offset3 = ($page3 - 1) * $limit3;

            // Query to count total rows in 'rombel_belajar' table
            $total_rows_query3 = "SELECT COUNT(*) AS total3
          FROM rombel_belajar
          JOIN user ON rombel_belajar.id_user = user.id_user
          JOIN kelas ON rombel_belajar.kelas_id = kelas.kelas_id
          WHERE rombel_belajar.kelas_id = $kelas_cek";
            if ($search3) {
              $total_rows_query3 .= " AND (user.nama LIKE '%$search3%' OR kelas.kelas LIKE '%$search3%' )";
            }
            // Execute the query for counting total rows
            $total_rows_result3 = mysqli_query($mysqli, $total_rows_query3);

            // Check if the query execution was successful
            if (!$total_rows_result3) {
              $_SESSION['baris'] = 0;
              die("Query Error: " . mysqli_error($mysqli));
            }

            // Fetch the total number of rows from the result set
            $total_rows3 = mysqli_fetch_assoc($total_rows_result3)['total3'];
            $_SESSION['baris'] = $total_rows3;
            // Hitung jumlah total halaman
            $total_pages3 = ceil($total_rows3 / $limit3);

            // Query untuk mendapatkan data halaman saat ini
            $query3 = "SELECT rombel_belajar.*, user.nama, kelas.kelas
          FROM rombel_belajar
          JOIN user ON rombel_belajar.id_user = user.id_user 
          JOIN kelas ON rombel_belajar.kelas_id = kelas.kelas_id
          WHERE rombel_belajar.kelas_id = $kelas_cek";
            if ($search3) {
              $query3 .= " AND (user.nama LIKE '%$search3%' OR kelas.kelas LIKE '%$search3%')";
            }

            $query3 .= " ORDER BY rombel_id DESC LIMIT $offset3, $limit3";
            $result3 = mysqli_query($mysqli, $query3);

            // Nomor urutan untuk baris saat ini
            $nomor3 = $offset3 + 1;
            ?>

            <!-- Form Pencarian dan Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <a href="tambah_siswa.php" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
              <form class="form-inline my-2 my-lg-0" method="GET" action="#anggota">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search3" value="<?php echo htmlspecialchars($search3); ?>">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Search</button>
                <?php if ($search3) : ?>
                  <a href="?" class="btn btn-outline-danger my-2 my-sm-0 ml-2"><i class="fas fa-times"></i> Exit</a>
                <?php endif; ?>
              </form>
            </div>

            <table id="bootstrap-data-table-export" class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Kelas</th>
                  <th scope="col" class="text-center">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['delete'])) {
                  $id = $_GET['delete'];
                  $querydelete = mysqli_query($mysqli, "DELETE FROM rombel_belajar WHERE rombel_id='$id'");

                  if ($querydelete) {
                    echo "<script type='text/javascript'>
                    alert('berhasil dihapus');
                    document.location='halaman_guru.php';
                    </script>";
                  }
                }
                while ($data3 = mysqli_fetch_assoc($result3)) :


                ?>
                  <tr>
                    <td><?php echo $nomor3; ?></td>
                    <td><?php echo htmlspecialchars($data3['nama']); ?></td>
                    <td><?php echo htmlspecialchars($data3['kelas']); ?></td>
                    <td class="text-center">
                      <a href="?delete=<?php echo $data3['rombel_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                <?php $nomor3++;
                endwhile; ?>
              </tbody>
            </table>

            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php if ($page3 > 1) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page3 - 1; ?>&search3=<?php echo htmlspecialchars($search3); ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php
                // Batas maksimal halaman yang ingin ditampilkan di bawah tabel
                $maxPages3 = 10;

                // Menentukan halaman awal dan akhir yang ingin ditampilkan
                $startPage3 = max(1, $page3 - floor($maxPages3 / 2));
                $endPage3 = min($total_pages3, $startPage3 + $maxPages3 - 1);

                // Membuat link untuk setiap halaman
                for ($i = $startPage3; $i <= $endPage3; $i++) :
                ?>
                  <li class="page-item <?php if ($i == $page3) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>&search3=<?php echo htmlspecialchars($search3); ?>#anggota"><?php echo $i; ?></a>
                  </li>
                <?php endfor; ?>

                <?php if ($page3 < $total_pages3) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page3 + 1; ?>&search3=<?php echo htmlspecialchars($search3); ?>#anggota" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
        </section>

        <section id="nilai" class="nilai">
          <div class="container">
            <div class="section-title" data-aos="fade-up">
              <h2>Abhâsa Madhure</h2><br>
              <p>Data Nilai</p>
            </div>
            <?php
            // Assuming $mysqli is your MySQLi connection object

            // Set jumlah baris per halaman
            $limit2 = 5;

            // Dapatkan nomor halaman saat ini dari parameter URL, default ke 1 jika tidak ada
            $page2 = isset($_GET['page']) ? $_GET['page'] : 1;

            // Dapatkan kata kunci pencarian dari parameter URL, default ke kosong jika tidak ada
            $search2 = isset($_GET['search2']) ? $_GET['search2'] : '';

            // Hitung offset untuk query SQL
            $offset2 = ($page2 - 1) * $limit2;

            // Query to count total rows in 'rombel_belajar' table
            $total_rows_query2 = "SELECT COUNT(*) AS total2
                    FROM rombel_belajar
                    JOIN user ON rombel_belajar.id_user = user.id_user WHERE rombel_belajar.kelas_id = $kelas_cek";
            if ($search2) {
              $total_rows_query2 .= " AND user.nama LIKE '%$search2%' OR rombel_belajar.kuis_huruf LIKE '%$search2%' OR rombel_belajar.kuis_skt LIKE '%$search2%' OR rombel_belajar.kuis_kata LIKE '%$search2%'";
            }
            // Execute the query for counting total rows
            $total_rows_result2 = mysqli_query($mysqli, $total_rows_query2);

            // Check if the query execution was successful
            if (!$total_rows_result2) {
              die("Query Error: " . mysqli_error($mysqli));
            }

            // Fetch the total number of rows from the result set
            $total_rows2 = mysqli_fetch_assoc($total_rows_result2)['total2'];

            // Hitung jumlah total halaman
            $total_pages2 = ceil($total_rows2 / $limit2);

            // Query untuk mendapatkan data halaman saat ini
            $query2 = "SELECT rombel_belajar.*, user.nama
          FROM rombel_belajar
          JOIN user ON rombel_belajar.id_user = user.id_user
          WHERE rombel_belajar.kelas_id = $kelas_cek";
            if ($search2) {
              $query2 .= " AND (user.nama LIKE '%$search2%' OR rombel_belajar.kuis_huruf LIKE '%$search2%' OR rombel_belajar.kuis_skt LIKE '%$search2%' OR rombel_belajar.kuis_kata LIKE '%$search2%')";
            }

            $query2 .= " ORDER BY rombel_id DESC LIMIT $offset2, $limit2";
            $result2 = mysqli_query($mysqli, $query2);
            if (!$result2) {
              die("Query Error: " . mysqli_error($mysqli));
            }

            // Nomor urutan untuk baris saat ini
            $nomor2 = 1;
            ?>

            <!-- Form Pencarian dan Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <a href=""><input type="hidden" class="btn btn-success" value="Cek Nilai"></a>
              <form class="form-inline my-2 my-lg-0" method="GET" action="#nilai">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search2" value="<?php echo htmlspecialchars($search2); ?>">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Search</button>
                <?php if ($search2) : ?>
                  <a href="?" class="btn btn-outline-danger my-2 my-sm-0 ml-2"><i class="fas fa-times"></i> Exit</a>
                <?php endif; ?>
              </form>
            </div>
            <table id="bootstrap-data-table-export" class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Siswa</th>
                  <th scope="col">Huruf</th>
                  <th scope="col">Suku Kata</th>
                  <th scope="col">Kata</th>
                  <th scope="col">Bendahara Kata</th>
                  <th scope="col">Pemula 1</th>
                  <th scope="col">Khusus</th>
                  <th scope="col">Kalimat</th>
                  <th scope="col">Pemula 2</th>
                  <th scope="col">Penilaian Akhir</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($data2 = mysqli_fetch_assoc($result2)) { ?>
                  <tr>
                    <td><?php echo $nomor2; ?></td>
                    <td><?php echo $data2['nama']; ?></td>
                    <td><?php echo $data2['kuis_huruf']; ?></td>
                    <td><?php echo $data2['kuis_skt']; ?></td>
                    <td><?php echo $data2['kuis_kata']; ?></td>
                    <td><?php echo $data2['kuis_bkata']; ?></td>
                    <td><?php echo $data2['kuis_pemula1']; ?></td>
                    <td><?php echo $data2['kuis_khusus']; ?></td>
                    <td><?php echo $data2['kuis_kalimat']; ?></td>
                    <td><?php echo $data2['kuis_pemula2']; ?></td>
                    <td><?php echo $data2['kuis_akhir']; ?></td>
                  </tr>
                <?php $nomor2++;
                } ?>
              </tbody>
            </table>

            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php if ($page2 > 1) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page2 - 1; ?>&search2=<?php echo htmlspecialchars($search2); ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php
                // Batas maksimal halaman yang ingin ditampilkan di bawah tabel
                $maxPages2 = 10;

                // Menentukan halaman awal dan akhir yang ingin ditampilkan
                $startPage2 = max(1, $page2 - floor($maxPages2 / 2));
                $endPage2 = min($total_pages2, $startPage2 + $maxPages2 - 1);

                // Membuat link untuk setiap halaman
                for ($i = $startPage2; $i <= $endPage2; $i++) :
                ?>
                  <li class="page-item <?php if ($i == $page2) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>&search2=<?php echo htmlspecialchars($search2); ?>"><?php echo $i; ?></a>
                  </li>
                <?php endfor; ?>

                <?php if ($page2 < $total_pages2) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page2 + 1; ?>&search2=<?php echo htmlspecialchars($search2); ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
        </section>

      <?php } ?>
      <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <br><br><br><br><br>
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
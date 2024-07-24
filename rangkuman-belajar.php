<?php
session_start();
include "koneksi.php";

// Periksa apakah ada sesi id_user yang diset
if (!isset($_SESSION['id_user'])) {
    // Jika tidak ada, arahkan kembali ke halaman login atau halaman lainnya
    header("location: login.php");
    exit; // Hentikan eksekusi skrip
}

$cek_id = $_SESSION['id_user'];
// Query untuk mengecek apakah pengguna sudah terdaftar di tabel rombel_belajar
$query_join = "SELECT * FROM rombel_belajar WHERE id_user = '$cek_id'";
$result_join = mysqli_query($mysqli, $query_join);

if (mysqli_num_rows($result_join) == 0) {
    echo "<script type='text/javascript'>
		alert('Anda belum tergabung dalam kelas belajar');
		document.location='halaman_belajar.php';
		</script>";
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
                    <h1><a href="halaman_belajar.php"><span>Ruang Siswa</span></a></h1>
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
                        <li class="dropdown"><a href=""><span>Hi, <?php echo $_SESSION['nama']; ?></span> <i class="bi bi-chevron-down"></i></a>
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
        <div class="row justify-content-center mt-4 pt-3">
            <div class="col-xl-10">
                <ul class="timeline mb-0">
                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Materi</h5>
                        </div>
                        <?php

                        // Ambil id_user dari session
                        $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query = "SELECT kuis_huruf FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result = mysqli_query($mysqli, $query);
                        $row = mysqli_fetch_assoc($result);
                        $kuis_huruf = $row['kuis_huruf'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_huruf = $row['kuis_huruf']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_huruf == 0) {
                                        $tampil_huruf = "Pelajari materi huruf dan angka, kerjakan materi kuis sebagai penilaian pembelajaran pada bab ini!";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_huruf < 60) {
                                        $tampil_huruf = "Nilai anda masih dibawah kriteria ketuntasan, silahkan pelajari materi dan kerjakan kuis secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_huruf = "Selamat anda telah berhasil dalam materi huruf dan angka, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_huruf ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Huruf & Angka</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_huruf ?></p>
                                        <a href="huruf-angka.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Materi</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_skt = "SELECT kuis_skt FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_skt = mysqli_query($mysqli, $query_skt);
                        $row_skt = mysqli_fetch_assoc($result_skt);
                        $kuis_skt = $row_skt['kuis_skt'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_skt = $row_skt['kuis_skt']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_skt == 0) {
                                        $tampil_skt = "Pelajari materi suku kata, kerjakan materi kuis sebagai penilaian pembelajaran pada bab ini!";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_skt < 60) {
                                        $tampil_skt = "Nilai anda masih dibawah kriteria ketuntasan, silahkan pelajari materi dan kerjakan kuis secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_skt = "Selamat anda telah berhasil dalam materi suku kata, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_skt ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Suku Kata</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_skt ?></p>
                                        <a href="suku-kata.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Materi</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_kata = "SELECT kuis_kata FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_kata = mysqli_query($mysqli, $query_kata);
                        $row_kata = mysqli_fetch_assoc($result_kata);
                        $kuis_kata = $row_kata['kuis_kata'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_kata = $row_kata['kuis_kata']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_kata == 0) {
                                        $tampil_kata = "Pelajari materi kata, kerjakan materi kuis sebagai penilaian pembelajaran pada bab ini!";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_kata < 60) {
                                        $tampil_kata = "Nilai anda masih dibawah kriteria ketuntasan, silahkan pelajari materi dan kerjakan kuis secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_kata = "Selamat anda telah berhasil dalam materi kata, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_kata ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Kata</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_kata ?></p>
                                        <a href="kata.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Materi</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_bkata = "SELECT kuis_bkata FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_bkata = mysqli_query($mysqli, $query_bkata);
                        $row_bkata = mysqli_fetch_assoc($result_bkata);
                        $kuis_bkata = $row_bkata['kuis_bkata'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_bkata = $row_bkata['kuis_bkata']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_bkata == 0) {
                                        $tampil_bkata = "Pelajari materi bendahara kata, kerjakan materi kuis sebagai penilaian pembelajaran pada bab ini!";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_bkata < 60) {
                                        $tampil_bkata = "Nilai anda masih dibawah kriteria ketuntasan, silahkan pelajari materi dan kerjakan kuis secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_bkata = "Selamat anda telah berhasil dalam materi bendahara kata, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_bkata ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Bendahara Kata</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_bkata ?></p>
                                        <a href="bendahara-kata.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Quiz Pemula 1</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_pemula1 = "SELECT kuis_pemula1 FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_pemula1 = mysqli_query($mysqli, $query_pemula1);
                        $row_pemula1 = mysqli_fetch_assoc($result_pemula1);
                        $kuis_pemula1 = $row_pemula1['kuis_pemula1'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_pemula1 = $row_pemula1['kuis_pemula1']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_pemula1 == 0) {
                                        $tampil_pemula1 = "Kerjakan kuis pemula 1, pelajari materi huruf, suku kata dan kata untuk mengerjakan kuis pemula 1";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_pemula1 < 60) {
                                        $tampil_pemula1 = "Nilai anda masih dibawah kriteria ketuntasan, silahkan kerjakan kuis pemula 1 secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_pemula1 = "Selamat anda telah berhasil dalam mengerjakan kuis pemula 1, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_pemula1 ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Pemula 1</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_pemula1 ?></p>
                                        <a href="quiz/quiz-pemula1/halaman-pemula1.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Materi</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_khusus = "SELECT kuis_khusus FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_khusus = mysqli_query($mysqli, $query_khusus);
                        $row_khusus = mysqli_fetch_assoc($result_khusus);
                        $kuis_khusus = $row_khusus['kuis_khusus'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_khusus = $row_khusus['kuis_khusus']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_khusus == 0) {
                                        $tampil_khusus = "Pelajari materi kata khusus, kerjakan materi kuis sebagai penilaian pembelajaran pada bab ini!";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_khusus < 60) {
                                        $tampil_khusus = "Nilai anda masih dibawah kriteria ketuntasan, silahkan pelajari materi dan kerjakan kuis secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_khusus = "Selamat anda telah berhasil dalam materi bendahara kata, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_khusus ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Kata Khusus</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_khusus ?></p>
                                        <a href="halaman-kata-khusus.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Materi</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_kalimat = "SELECT kuis_kalimat FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_kalimat = mysqli_query($mysqli, $query_kalimat);
                        $row_kalimat = mysqli_fetch_assoc($result_kalimat);
                        $kuis_kalimat = $row_kalimat['kuis_kalimat'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_kalimat = $row_kalimat['kuis_kalimat']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_kalimat == 0) {
                                        $tampil_kalimat = "Pelajari materi kalimat, kerjakan materi kuis sebagai penilaian pembelajaran pada bab ini!";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_kalimat < 60) {
                                        $tampil_kalimat = "Nilai anda masih dibawah kriteria ketuntasan, silahkan pelajari materi dan kerjakan kuis secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_kalimat = "Selamat anda telah berhasil dalam materi kalimat, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_kalimat ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Kalimat</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_kalimat ?></p>
                                        <a href="halaman-kalimat.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Quiz Pemula 2</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_pemula2 = "SELECT kuis_pemula2 FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_pemula2 = mysqli_query($mysqli, $query_pemula2);
                        $row_pemula2 = mysqli_fetch_assoc($result_pemula2);
                        $kuis_pemula2 = $row_pemula2['kuis_pemula2'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_pemula2 = $row_pemula2['kuis_pemula2']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_pemula2 == 0) {
                                        $tampil_pemula2 = "Kerjakan kuis pemula 2, pelajari materi huruf, suku kata dan kata untuk mengerjakan kuis pemula 1";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_pemula2 < 60) {
                                        $tampil_pemula2 = "Nilai anda masih dibawah kriteria ketuntasan, silahkan kerjakan kuis pemula 2 secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_pemula2 = "Selamat anda telah berhasil dalam mengerjakan kuis pemula 2, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_pemula2 ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Pemula 2</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_pemula2 ?></p>
                                        <a href="quiz/quiz-pemula2/halaman-pemula2.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="date bg-light">
                            <h5 class="text-uppercase mb-0 fs-16">Quiz Penilaian Akhir</h5>
                        </div>
                        <?php

                        // Query untuk mengambil nilai kuis_huruf dari tabel kelas
                        $query_akhir = "SELECT kuis_akhir FROM rombel_belajar WHERE id_user = '$id_user'";
                        $result_akhir = mysqli_query($mysqli, $query_akhir);
                        $row_akhir = mysqli_fetch_assoc($result_akhir);
                        $kuis_akhir = $row_akhir['kuis_akhir'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="event-content">
                                    <?php
                                    $pesan_akhir = $row_akhir['kuis_akhir']; // Mengambil nilai kuis_huruf dari array $row

                                    // Cek kondisi berdasarkan nilai kuis_huruf
                                    if ($pesan_akhir == 0) {
                                        $tampil_akhir = "Kerjakan kuis penilaian akhir, pelajari materi huruf, suku kata dan kata untuk mengerjakan kuis pemula 1";
                                        $card_class = 'bg-secondary';
                                    } elseif ($pesan_akhir < 60) {
                                        $tampil_akhir = "Nilai anda masih dibawah kriteria ketuntasan, silahkan kerjakan kuis penilaian akhir secara teliti!.";
                                        $card_class = 'bg-danger';
                                    } else {
                                        $tampil_akhir = "Selamat anda telah berhasil dalam mengerjakan kuis penilaian akhir, silahkan lanjut ke pembalajaran selanjutya!";
                                        $card_class = 'bg-primary';
                                    }
                                    ?>
                                    <div class="timeline-date <?php echo $card_class; ?> text-center rounded float-end">
                                        <div class="card text-white <?php echo $card_class; ?> mb-2" style="max-width: 10rem;">
                                            <div class="card-header">Nilai Kuis</div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $kuis_akhir ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-text">
                                        <h3 class="fs-17">Penilaian Akhir</h3>
                                        <p class="mb-0 mt-2 pt-1 text-muted"><?php echo $tampil_akhir ?></p>
                                        <a href="quiz/quiz-akhir/halaman-akhir.php"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mt-4">View Materi
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
            </div>
        </div>
        <!-- /#header -->
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
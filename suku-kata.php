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

// Ambil id_user dari session
$id_user = $_SESSION['id_user'];

// Query untuk mengambil nilai kuis_huruf dari tabel kelas
$query = "SELECT kuis_huruf FROM rombel_belajar WHERE id_user = '$id_user'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Ambil data hasil query
    $row = mysqli_fetch_assoc($result);

    // Periksa nilai kuis_huruf
    if ($row['kuis_huruf'] < $_SESSION['set_nilai']) {
        // Jika nilai kuis_huruf < 80, tampilkan pesan dan redirect ke halaman lain
        echo '<script>alert("Anda tidak memiliki akses, nilai kuis sebelumnya kurang  ' . $_SESSION['set_nilai'] . '!");</script>';
        echo '<script>window.location.href = "halaman_belajar.php";</script>';
        exit; // Hentikan eksekusi skrip
    }
} else {
    // Jika terjadi kesalahan dalam eksekusi query, tampilkan pesan atau lakukan tindakan lain
    echo "Terjadi kesalahan dalam mengambil data kelas.";
    exit; // Hentikan eksekusi skrip
}

// Jika nilai kuis_huruf >= 80, maka beri akses ke halaman suku-kata.php

// Sesuaikan dengan halaman suku-kata.php
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

    <!-- Slide CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <h1><a href="halaman_belajar.php"><span>Ruang <?php echo $_SESSION['level']; ?></span></a></h1>
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
        <!-- /#header -->
        <!-- Content -->
        <br><br><br>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div style="height:430px;" class="col-lg-12">
                    <div class="presentation" style="    position: absolute;height: 100%;width: 100%;    left: 0px;    top: 0px;    display: block;    overflow: hidden;background: #ffffff; /* Mengatur warna latar belakang menjadi putih */">
                        <!-- Defining the main presentation -->
                        <div id="presentation-counter">Proses...</div>

                        <div class="slides">
                            <!-- Defining slides -->
                            <div class="slide" id="slide1">
                                <!-- Defining single slide -->
                                <section class="middle">
                                    <h2 style="color:#31708f">
                                        <strong>Suku kata adalah huruf <br> atau gabungan huruf <br> yang bisa
                                            dibunyikan.</strong>
                                    </h2>
                                    <h3>Tekan <span id="left-init-key" class="key">&rarr;</span> di Keyboard <br> untuk
                                        Melanjutkan.</h3>
                                </section>
                            </div>

                            <?php
                            //semacam impor fike 1 kali
                            require_once("koneksi.php");
                            ?>

                            <div class="slide" id="sukukata1">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="width: 100%; max-width: 100%;">
                                            <tbody id="halamansatu">
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'a%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <!--<a href="#sukukata1"><button type="button" class="btn btn-lg btn-primary" onClick="window.location.reload()">Acak Suku Kata</button></a> -->
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukataVk">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like '" . "â" . "%' order by rand() limit 5;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-primary" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata2">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $angka = 1;
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'b%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata3">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'c%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata4">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'd%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata5">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'e%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukataVk2">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like '" . "è" . "%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-primary" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-primary" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata6">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'f%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata7">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'g%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata8">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'h%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata9">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'i%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata10">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'j%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata12">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'k%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata13">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'l%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata14">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'm%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata15">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'n%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata16">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'o%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata17">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'p%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata18">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'r%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata19">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 's%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata20">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 't%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata21">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'u%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata22">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'v%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-success" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata23">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'w%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-info" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata24">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'y%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-warning" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="sukukata25">
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table id="hp" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($mysqli, "select `skt` from `suku_kata` where `skt` like 'z%' order by rand() limit 10;");
                                                while ($h = mysqli_fetch_array($q)) { ?>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo $h[0]; ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                        <?php $h = mysqli_fetch_array($q); ?>
                                                        <td><button type="button" class="btn btn-lg btn-danger" onClick=play("<?php echo htmlspecialchars($h[0]); ?>")><?php echo $h[0]; ?></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" onClick="window.location.reload()">Acak Suku Kata</button>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div id="hidden-note" class="invisible" style="display: none;">
                        </div> <!-- hidden note -->

                        <aside id="help" class="sidebar invisible" style="display: hidden;">
                            <!-- Defining sidebar help -->
                            <table> id="hp"
                                <caption>Bantuan</caption>
                                <tr>
                                    <th>Pindah selanjutnya/kembali</th>
                                    <td>&larr;&nbsp;&rarr;</td>
                                </tr>
                                <tr>
                                    <th>Pindah selanjutnya</th>
                                    <td>spacebar</td>
                                </tr>
                            </table>
                        </aside>

                    </div>
                </div>
                <!-- /.row -->

                <div style="margin-top:15px;" class="col-lg-4">
                    <script type="text/javascript">
                        // fungsi untuk memainkan audio
                        function play(file) {
                            // mengambil id hasilAudio
                            document.getElementById('hasilAudio').innerHTML = "<font color='red'><blink>Proses..." + file +
                                "</blink></font>";
                            $('#hasilAudio').load('suara.php', 'kalimat=' + file);
                            //alert(file);
                        }

                        function cekSlide(posHal) {
                            //alert(posHal);
                            if (posHal == 1) {
                                $("#nav-prev").hide("slow");
                            } else
                            if (posHal == 27) {
                                $("#nav-next").hide("slow");
                            } else {
                                $("#nav-prev").show("slow");
                                $("#nav-next").show("slow");
                            }
                        }
                    </script>
                    <!-- Menampilkan hasil dari hasil audio-->
                    <p id="hasilAudio" style="margin-bottom: 0px;"></p>
                </div>

                <div align="center" style="margin-top:30px;" class="col-lg-4">
                    <button title="Previous" id="nav-prev" class="fa fa-arrow-left" style="display:none"></button>
                    <button title="Jump to slide" id="slide-no">1</button>
                    <button title="Next" id="nav-next" class="fa fa-arrow-right"></button>
                </div>
                <div align="center" class="col-lg-4">
                    <a href="quiz/quiz-skt/halaman-skt.php" class="btn btn-lg btn-primary" role="button">Kuis Suku Kata</a>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
         <br><br><br>
        <<footer id="footer">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Fajar Andrainto</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            </footer><!-- End Footer -->
            <!-- /.site-footer -->
    </div>
    <!-- /#wrapper -->


    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

    <!-- jQuery Slide -->
    <script type="text/javascript" src="js/script.js"></script>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
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
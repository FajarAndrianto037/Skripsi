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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

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
    <div>
        <aside id="left-panel" class="left-panel" style="color: white;background-color: black;">
            <nav class="navbar navbar-expand-sm navbar-default" style="color: white;background-color: black;">
                <div id="main-menu" class="main-menu collapse navbar-collapse"
                    style="color: white;background-color: black;">
                    <ul class="nav navbar-nav">
                        <li class="menu-title" style="color: white;">Belajar Bahasa Madura</li>
                        <li class="active" style="color: white;background-color: black;">
                            <a href="index.php" style="color: white; "><i class="menu-icon ti-home"
                                    style="color: white;"></i>Menu Utama </a>
                        </li>
                        <li>
                            <a href="huruf.php" style="color: white;"> <i class="menu-icon ti-file"
                                    style="color: white;"></i>Pengenalan Huruf </a>
                        </li>
                        <li>
                            <a href="suku-kata.php" style="color: white;"> <i class="menu-icon ti-files"
                                    style="color: white;"></i>Pengenalan Suku Kata </a>
                        </li>
                        <li>
                            <a href="kata.php" style="color: white;"> <i class="menu-icon ti-book"
                                    style="color: white;"></i>Pengenalan Kata </a>
                        </li>
                        <li>
                            <a href="kata-khusus.php" style="color: white;"> <i class="menu-icon ti-notepad"
                                    style="color: white;"></i>Kata Khusus </a>
                        </li>
                        <li>
                            <a href="kalimat-dasar.php" style="color: white;"> <i class="menu-icon ti-agenda"
                                    style="color: white;"></i>Pengenalan Kalimat </a>
                        </li>
                        <li>
                            <a href="kamus.php" style="color: white;"> <i class="menu-icon ti-search"
                                    style="color: white;"></i>Kamus Terjemahan </a>
                        </li>
                        <li>
                            <a href="kuis.php" style="color: white;"> <i class="menu-icon ti-pencil-alt"
                                    style="color: white;"></i>Kuis </a>
                        </li>
                        <li>
                            <a href="petunjuk.php" style="color: white;"> <i class="menu-icon ti-info"
                                    style="color: white;"></i>Petunjuk </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
    </div>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="image/logo-bbm.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">

                    <div class="user-area dropdown float-right">
                        <a href="#" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon ti-settings"> Hi, <?php echo $_SESSION['nama']; ?></i>
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="admin/login.php"><i class="ti-unlock"></i>Login</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Menu Utama</a>
                            </li>
                            <li class="active">
                                Khusus B.Madura
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div style="height:430px;" class="col-lg-12">
                    <div class="presentation"
                        style="    position: absolute;height: 100%;width: 100%;    left: 0px;    top: 0px;    display: block;    overflow: hidden;background: #ffffff; /* Mengatur warna latar belakang menjadi putih */">
                        <!-- Defining the main presentation -->
                        <div id="presentation-counter">Proses...</div>

                        <div class="slides">
                            <!-- Defining slides -->

                            <div class="slide" id="slide1">
                            <section class="middle">
                            <div class="table-responsive" id="coba">
                            <?php
                            // Koneksi ke database (pastikan Anda telah melakukan koneksi ke database sebelumnya)
                            require_once("koneksi.php");
                            require_once("fsa.php");

                            // Tentukan jumlah item per halaman
                            $itemsPerPage = 5;

                            // Hitung total baris dalam database
                            $totalRowsQuery = "SELECT COUNT(*) FROM `kata_khusus` WHERE jenis='bunga pohon' AND `madura` LIKE '%'";
                            $totalRowsResult = mysqli_query($koneksi, $totalRowsQuery);
                            $totalRows = mysqli_fetch_array($totalRowsResult)[0];

                            // Hitung total halaman
                            $totalPages = ceil($totalRows / $itemsPerPage);

                            // Tentukan nomor halaman saat ini dari URL
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;

                            // Pastikan nomor halaman tidak kurang dari 1 atau lebih besar dari total halaman yang tersedia
                            if ($page < 1) {
                                $page = 1;
                            } elseif ($page > $totalPages) {
                                $page = $totalPages;
                            }

                            // Hitung klausa LIMIT SQL
                            $offset = ($page - 1) * $itemsPerPage;

                            // Query database untuk mengambil data yang dipaginasi
                            $query = "SELECT `madura`, `indonesia` FROM `kata_khusus` WHERE jenis='bunga pohon' AND `madura` LIKE '%' ORDER BY RAND() LIMIT $offset, $itemsPerPage";
                            $result = mysqli_query($koneksi, $query);
                            ?>

                            <table class="table table-bordered table-hover table-striped" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Indonesia</th>
                                        <th style="text-align:center">Kata Madura</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = $offset + 1; // Inisialisasi nomor pada halaman saat ini

                                    while ($h = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $nomor; ?> <!-- Tampilkan nomor otomatis di sini -->
                                        </td>
                                        <td>
                                            <h5><?php echo $h['indonesia']; ?></h5>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success"
                                                onClick="play('<?php echo $h['madura']; ?>')"><?php echo $h['madura']; ?></button>
                                        </td>
                                    </tr>
                                    <?php
                                    $nomor++; // Tambahkan nomor setiap kali baris data selesai diproses
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!-- Tautan Paginasi -->
                            <ul class="pagination">
                                <?php
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    $activeClass = ($i == $page) ? "active" : "";
                                ?>
                                <li class="page-item <?php echo $activeClass; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </section>
                            <div class="slide" id="slide2">
                                <!-- Defining single slide -->
                                <section class="middle">
                                    <h2 style="color:#31708f">
                                        <strong>Kata adalah gabungan dari <br> suku kata yang memiliki arti.</strong>
                                    </h2>
                                    <h3>Tekan <span id="left-init-key" class="key">&rarr;</span> di Keyboard <br> untuk
                                        Melanjutkan.</h3>
                                </section>
                            </div>
                        </div>



                        </div>

                        <div id="hidden-note" class="invisible" style="display: none;">
                        </div> <!-- hidden note -->

                    </div>
                </div>
                <!-- /.row -->

                <div style="margin-top:15px;" class="col-lg-4">
                    <script type="text/javascript">
                    function play(file) {
                        document.getElementById('terjemahan').innerHTML = "<font color='red'><blink>Proses..." + file +
                            "</blink></font>";
                        $('#terjemahan').load('suara.php', 'b=1&kalimat=' + file);
                        //alert(file);
                    }
                    </script>
                    <p id="terjemahan" style="margin-bottom: 0px;"></p>
                </div>

                <script type="text/javascript">
                function cekSlide(posHal) {
                    //alert(posHal);
                    if (posHal == 1) {
                        $("#nav-prev").hide("slow");
                    } else
                    if (posHal == 25) {
                        $("#nav-next").hide("slow");
                    } else {
                        $("#nav-prev").show("slow");
                        $("#nav-next").show("slow");
                    }
                }
                </script>
                <div align="center" style="margin-top:20px;" class="col-lg-4">
                    <a href="index.php" class="btn btn-lg btn-primary" role="button">Menu</a>
                    <a href="kata-khusus.php" class="btn btn-lg btn-primary" role="button">Kembali »</a>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="" id="footerhp">
            <div class="footer-inner bg-white text-center">
                <div class="row">
                    <div class="col-sm-12" id="batton-footer">
                        <br><br><br><br><br><br>
                        &copy; Universitas Trunojoyo Madura
                        <br><br><br>
                    </div>
                </div>
            </div>
        </footer>
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

</body>

</html>
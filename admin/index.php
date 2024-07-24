<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION["username"]) || $_SESSION["level"] != "admin") {
    header("location: ../login.php");
    exit;
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Abhâsa Madhure</title>
    <meta name="description" content="Admin - Abhâsa Madhure">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">Halaman Admin</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Kamus Madura</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-book"></i><a href="suku_kata.php">Suku Kata</a></li>
                            <li><i class="fa fa fa-book"></i><a href="kata_madura.php">Kata Madura</a></li>
                            <li><i class="fa fa fa-book"></i><a href="kalimat_madura.php">Kalimat Madura</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-microphone"></i>Audio Madura</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-microphone"></i><a href="tambah_audio.php">Audio Suara</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text"></i>Data Belajar</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-file-text"></i><a href="data_siswa.php">Data Siswa</a></li>
                            <li><i class="fa fa-file-text"></i><a href="data_guru.php">Data Guru</a></li>
                            <li><i class="fa fa-file-text"></i><a href="data_rombel.php">Data Rombel</a></li>
                            <li><i class="fa fa-file-text"></i><a href="data_nilai.php">Data Nilai</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-check-square"></i>Validasi Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-check-square"></i><a href="valid_skt.php">Data Suku Kata</a></li>
                            <li><i class="fa fa-check-square"></i><a href="valid_kata.php">Data Kata</a></li>
                            <li><i class="fa fa-check-square"></i><a href="valid_kalimat.php ">Data kalimat</a></li>
                            <li><i class="fa fa-check-square"></i><a href="valid_kuis.php ">Data Kuis</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../image/umum.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-news-paper"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            // Query untuk mengambil data
                                            $query5 = "SELECT * FROM suku_kata";
                                            // Jalankan query
                                            $result5 = mysqli_query($mysqli, $query5);
                                            // Hitung jumlah baris hasil query
                                            $jumlah_skt = mysqli_num_rows($result5);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $jumlah_skt; ?></span></div>
                                            <div class="stat-heading">Suku Kata</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-news-paper"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            // Query untuk mengambil data
                                            $query6 = "SELECT * FROM kamus";
                                            // Jalankan query
                                            $result6 = mysqli_query($mysqli, $query6);
                                            // Hitung jumlah baris hasil query
                                            $jumlah_kamus = mysqli_num_rows($result6);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $jumlah_kamus; ?></span></div>
                                            <div class="stat-heading">Kata</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-news-paper"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            // Query untuk mengambil data
                                            $query7 = "SELECT * FROM kalimat";
                                            // Jalankan query
                                            $result7 = mysqli_query($mysqli, $query7);
                                            // Hitung jumlah baris hasil query
                                            $jumlah_kalimat = mysqli_num_rows($result7);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $jumlah_kalimat; ?></span></div>
                                            <div class="stat-heading">Kalimat</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            // Query untuk mengambil data
                                            $query8 = "SELECT * FROM user";
                                            // Jalankan query
                                            $result8 = mysqli_query($mysqli, $query8);
                                            // Hitung jumlah baris hasil query
                                            $jumlah_user = mysqli_num_rows($result8);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $jumlah_user; ?></span></div>
                                            <div class="stat-heading">Pengguna</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">User</h4>
                                    <br>
                                    <?php

                                    // Set the number of rows per page
                                    $limit = 5;

                                    // Get the current page number from the URL parameter, default to 1 if not present
                                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                                    // Get the search keyword from the URL parameter, default to an empty string if not present
                                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                                    // Calculate the offset for the SQL query
                                    $offset = ($page - 1) * $limit;

                                    // Query to count the total number of rows
                                    $total_rows_query = "SELECT COUNT(*) AS total FROM user";
                                    if ($search) {
                                        $total_rows_query .= " WHERE nama LIKE '%" . mysqli_real_escape_string($mysqli, $search) . "%'";
                                    }
                                    $total_rows_result = mysqli_query($mysqli, $total_rows_query);
                                    $total_rows = mysqli_fetch_assoc($total_rows_result)['total'];

                                    // Calculate the total number of pages
                                    $total_pages = ceil($total_rows / $limit);

                                    // Query to get the current page data
                                    $query = "SELECT * FROM user";
                                    if ($search) {
                                        $query .= " WHERE nama LIKE '%" . mysqli_real_escape_string($mysqli, $search) . "%'";
                                    }
                                    $query .= " ORDER BY id_user ASC LIMIT $offset, $limit";
                                    $result = mysqli_query($mysqli, $query);
                                    ?>

                                    <!-- Form Search and Add Button -->
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <a href="tambah_user.php" class="btn btn-success mr-2">Tambah</a>
                                        <form class="form-inline my-2 my-lg-0" method="GET" action="">
                                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo htmlspecialchars($search); ?>">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                            <?php if ($search) : ?>
                                                <a href="?" class="btn btn-outline-danger my-2 my-sm-0 ml-2">Exit</a>
                                            <?php endif; ?>
                                        </form>
                                    </div>

                                    <div class="card-body--">
                                        <div class="table-stats order-table ov-h">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th>Level</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nomor = $offset + 1;
                                                    while ($data = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $nomor; ?></td>
                                                            <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                                            <td><?php echo htmlspecialchars($data['username']); ?></td>
                                                            <td><?php echo htmlspecialchars($data['password']); ?></td>
                                                            <td><?php echo htmlspecialchars($data['level']); ?></td>
                                                            <td>
                                                                <a href="index.php?delete=<?php echo $data['id_user']; ?>" onclick="return confirm('apakah anda yakin untuk delete?')">
                                                                    <span class="badge badge-danger">Delete</span>
                                                                </a>
                                                                <a href="edit_user.php?edit=<?php echo $data['id_user']; ?>" onclick="return confirm('apakah anda yakin untuk edit data?')">
                                                                    <span class="badge badge-primary">Edit</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $nomor++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- /.table-stats -->
                                    </div>

                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <?php if ($page > 1) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo htmlspecialchars($search); ?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php
                                            // Maximum number of pages to display
                                            $maxPages = 10;

                                            // Determine the start and end page for the pagination
                                            $startPage = max(1, $page - floor($maxPages / 2));
                                            $endPage = min($total_pages, $startPage + $maxPages - 1);

                                            // Create the pagination links
                                            for ($i = $startPage; $i <= $endPage; $i++) :
                                            ?>
                                                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                                    <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>"><?php echo $i; ?></a>
                                                </li>
                                            <?php endfor; ?>

                                            <?php if ($page < $total_pages) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo htmlspecialchars($search); ?>" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                                <?php
                                // Handle deletion
                                if (isset($_GET['delete'])) {
                                    $id = (int)$_GET['delete'];
                                    $querydelete = mysqli_query($mysqli, "DELETE FROM user WHERE id_user='$id'");
                                    if ($querydelete) {
                                        echo "<script type='text/javascript'>
                alert('berhasil dihapus');
                document.location='index.php';
              </script>";
                                    }
                                }
                                ?>

                            </div> <!-- /.card -->
                        </div> <!-- /.col-lg-8 -->

                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card br-0">
                                        <div class="card-body">
                                            <div class="chart-container ov-h">
                                                <div id="flotPie1" class="float-chart"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.card -->
                                </div>

                                <div class="col-lg-3 col-xl-12">
                                    <div class="card bg-flat-color-3  ">
                                        <?php
                                        // Query untuk mengambil data
                                        $query = "SELECT * FROM valid_skt WHERE status = 'proses validasi'";
                                        // Jalankan query
                                        $result = mysqli_query($mysqli, $query);
                                        // Hitung jumlah baris hasil query
                                        $jumlah_skt = mysqli_num_rows($result);
                                        ?>
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">Validasi Suku kata : <?php echo  $jumlah_skt; ?></h4>
                                        </div>
                                        <?php
                                        // Query untuk mengambil data
                                        $query2 = "SELECT * FROM valid_kata WHERE status = 'proses validasi'";
                                        // Jalankan query
                                        $result2 = mysqli_query($mysqli, $query2);
                                        // Hitung jumlah baris hasil query
                                        $jumlah_kata = mysqli_num_rows($result2);
                                        ?>
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">Validasi Tambah kata : <?php echo  $jumlah_kata; ?></h4>
                                        </div>
                                        <?php
                                        // Query untuk mengambil data
                                        $query3 = "SELECT * FROM valid_kalimat WHERE status = 'proses validasi'";
                                        // Jalankan query
                                        $result3 = mysqli_query($mysqli, $query3);
                                        // Hitung jumlah baris hasil query
                                        $jumlah_kalimat = mysqli_num_rows($result3);
                                        ?>
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">Validasi Tambah Kalimat : <?php echo  $jumlah_kalimat; ?></h4>
                                        </div>
                                        <?php
                                        // Query untuk mengambil data
                                        $query4 = "SELECT * FROM valid_kuis WHERE status = 'proses validasi'";
                                        // Jalankan query
                                        $result4 = mysqli_query($mysqli, $query4);
                                        // Hitung jumlah baris hasil query
                                        $jumlah_kuis = mysqli_num_rows($result4);
                                        ?>
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">Validasi Tambah Kuis : <?php echo  $jumlah_kuis; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.col-md-4 -->
                    </div>
                </div>
                <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; Fajar Andrianto
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

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
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [{
                    label: "User Guru",
                    data: [
                        [1, 20]
                    ],
                    color: '#5c6bc0'
                },
                {
                    label: "User Siswa",
                    data: [
                        [1, 50]
                    ],
                    color: '#ef5350'
                },
                {
                    label: "User Umum",
                    data: [
                        [1, 30]
                    ],
                    color: '#66bb6a'
                }
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2 / 3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [{
                    label: "Direct Sell",
                    data: [
                        [1, 65]
                    ],
                    color: '#5b83de'
                },
                {
                    label: "Channel Sell",
                    data: [
                        [1, 35]
                    ],
                    color: '#00bfa5'
                }
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [
                [0, 3],
                [1, 5],
                [2, 4],
                [3, 7],
                [4, 9],
                [5, 3],
                [6, 6],
                [7, 4],
                [8, 10]
            ];

            var plot = $.plot($('#flotLine5'), [{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }], {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [
                        [0, 18000, 35000, 25000, 22000, 0],
                        [0, 33000, 15000, 20000, 15000, 300],
                        [0, 15000, 28000, 15000, 30000, 5000]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                        showGrid: true
                    }
                });

                chart.on('draw', function(data) {
                    if (data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById("TrafficChart");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                        datasets: [{
                                label: "Visit",
                                borderColor: "rgba(4, 73, 203,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(4, 73, 203,.5)",
                                data: [0, 2900, 5000, 3300, 6000, 3250, 0]
                            },
                            {
                                label: "Bounce",
                                borderColor: "rgba(245, 23, 66, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(245, 23, 66,.5)",
                                pointHighlightStroke: "rgba(245, 23, 66,.5)",
                                data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
                            },
                            {
                                label: "Targeted",
                                borderColor: "rgba(40, 169, 46, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(40, 169, 46, .5)",
                                pointHighlightStroke: "rgba(40, 169, 46,.5)",
                                data: [1000, 5200, 3600, 2600, 4200, 5300, 0]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                });
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [
                    [0, 18],
                    [2, 8],
                    [4, 5],
                    [6, 13],
                    [8, 5],
                    [10, 7],
                    [12, 4],
                    [14, 6],
                    [16, 15],
                    [18, 9],
                    [20, 17],
                    [22, 7],
                    [24, 4],
                    [26, 9],
                    [28, 11]
                ],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>

</html>
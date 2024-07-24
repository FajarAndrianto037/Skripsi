<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BBM - Belajar Bahasa Madura</title>

    <link rel="apple-touch-icon" href="image/sakera.png">
    <link rel="shortcut icon" href="image/sakera.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
                            <a href="../huruf.php" style="color: white;"> <i class="menu-icon ti-file"
                                    style="color: white;"></i>Pengenalan Huruf </a>
                        </li>
                        <li>
                            <a href="../suku-kata.php" style="color: white;"> <i class="menu-icon ti-files"
                                    style="color: white;"></i>Pengenalan Suku Kata </a>
                        </li>
                        <li>
                            <a href="../kata.php" style="color: white;"> <i class="menu-icon ti-book"
                                    style="color: white;"></i>Pengenalan Kata </a>
                        </li>
                        <li>
                            <a href="../kata-khusus.php" style="color: white;"> <i class="menu-icon ti-notepad"
                                    style="color: white;"></i>Kata Khusus </a>
                        </li>
                        <li>
                            <a href="../kalimat-dasar.php" style="color: white;"> <i class="menu-icon ti-agenda"
                                    style="color: white;"></i>Pengenalan Kalimat </a>
                        </li>
                        <li>
                            <a href="../kamus.php" style="color: white;"> <i class="menu-icon ti-search"
                                    style="color: white;"></i>Kamus Terjemahan </a>
                        </li>
                        <li>
                            <a href="../kuis.php" style="color: white;"> <i class="menu-icon ti-pencil-alt"
                                    style="color: white;"></i>Kuis </a>
                        </li>
                        <li>
                            <a href="../petunjuk.php" style="color: white;"> <i class="menu-icon ti-info"
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
                    <a class="navbar-brand" href="./"><img src="../image/logo-bbm.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <!-- <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search w-100">
                            <input type="text" class="form-control" placeholder="             Searching" />
                        </form>
                    </div> -->

                    <div class="user-area dropdown float-right">
                        <a href="#" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon ti-settings"> Pengaturan</i>
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
        <div id="page-wrapper" style="margin-left:10px">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" style="margin-bottom: 2px;margin-top: 2px;padding-bottom: 5px;">
                            Tingkat Bahasa (Speech Levels) Bahasa Madura
                        </h2>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="../index.php">Menu Utama / </a>
                            </li>
                            <li class="active">
                                Tingkat Bahasa Madura
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-lg-12">
                    <h3>
                        Pada dasarnya bahasa Madura dibagi menjadi tiga tingkat bahasa, yaitu:
                    </h3>
                    <br>
                    <h4>Tingkat Bahasa Umum (iyâ-enjâ’)</h4>
                    <h5>
                        Tingkat bahasa Madura iyâ-enjâ’ digunakan oleh masyarakat Madura untuk berkomunikasi
                        antara anak-anak dengan anak-anak yang sebaya sebagai bahasa keakraban,
                        orang dewasa dengan orang dewasa yang sudah akrab,
                        orang tua kepada anaknya sendiri, keponakannya,
                        dan juga banyak digunakan oleh sebagian golongan masyarakat priayi kepada rakyat.
                        <br>Contoh :
                    </h5>
                    <ul>
                        <li>
                            <p>Apa bâ’na ella tao? (Apakah kamu sudah tahu?).</p>
                        </li>
                        <li>
                            <p>Sapa nyamana bâ’na, lè’? (Siapa nama kamu, dik?).</p>
                        </li>
                        <li>
                            <p>Apa bâ’na ella tao? (Apakah kamu sudah tahu?).</p>
                        </li>
                    </ul>
                    <br>
                    <h4>Tingkat Bahasa Menengah (engghi-enten)</h4>
                    <h5>
                        Tingkat bahasa ini digunakan oleh anak-anak di pedesaan kepada kedua orang tua,
                        paman,bibi dan kepada orang yang lebih tua darinya. Di perkotaan digunakan oleh
                        seorang mertua kepada menantunya, tetapi sekarang kebanyakan para mertua menggunakan tingkat
                        bahasa halus.
                        Di pedesaaan juga digunakan oleh para istri kepada suaminya.
                        Namun saat ini tingkat bahasa tengahan jarang terdengar dan sudah tidak dimengerti oleh generasi
                        muda.
                        <br>Contoh :
                    </h5>
                    <ul>
                        <li>
                            <p>Napè dhika pon tao? (Apakah kamu sudah tau?)</p>
                        </li>
                        <li>
                            <p>Sèra nyamana dhika, lè’? (Siapa nama kamu, dik?)</p>
                        </li>
                        <li>
                            <p>Èntara dâ’ ka’ amma dhika? (Hendak pergi kemana kamu?)</p>
                        </li>
                    </ul>
                    <br>
                    <h4>Tingkat Bahasa Tinggi/Halus (Èngghi-bhunten)</h4>
                    <h5>
                        Tingkat bahasa ini merupakan bahasa halus yang digunakan sebagai kata pengantar dalam pertemuan
                        atau
                        rapat musyawarah tanpa pengecualian yang hadir juga ada anak muda dan anak-anak,
                        digunakan oleh orang dewasa dengan orang yang baru dikenal baik kepada orang yang lebih tua
                        maupun
                        terhadap yang lebih muda sebagai bahasa pergaulan yang sopan,
                        digunakan oleh anak-anak kepada orang tuanya sendiri maupun orang dewasa lainnya,
                        dan digunakan oleh murid kepada gurunya. Contoh :
                        <br>Contoh :
                    </h5>
                    <ul>
                        <li>
                            <p>Ponapa panjhennengan ampon mèyarsa? (Apakah kamu sudah tau?).</p>
                        </li>
                        <li>
                            <p>Pasèra asmana panjhennenggan, lè’? (Siapa nama kamu, dik?).</p>
                        </li>
                        <li>
                            <p>Bhâdhi mèyossa dâ ka’ dimma? (Hendak pergi kemana?).</p>
                        </li>
                    </ul>
                    <br>
                    <h5>Sumber : Pawitra, A. Kamus Lengkap Bahasa Madura Indonesia. Jakarta: Dian Rakyat. 2009.</h5>
                </div><br><br><br>
                <div style="text-align:center" class="col-lg-12">
                    <a href="../huruf.php" class="btn btn-primary btn-lg" role="button">Mulai Belajar »</a>
                </div>

            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <br><br>
    <!-- Footer -->
    <footer class="" id="footerhp">
        <div class="footer-inner bg-white text-center">
            <div class="row">
                <div class="col-sm-12" id="batton-footer">
                    <br>
                    &copy; Universitas Trunojoyo Madura
                    <br><br>
                </div>
            </div>
        </div>
    </footer>
    <!-- /.site-footer -->
    </div>
    <!-- /#wrapper -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->

</body>

</html>
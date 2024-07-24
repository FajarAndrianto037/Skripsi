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
                                Kuis
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <script type="text/javascript">
                window.history.forward();

                function noBack() {
                    window.history.forward();
                }

                var nilaiAkhir = 0;
                var nilaiTotal = 0;

                function setFocusedField(field) {
                    document.getElementById('focusedField').value = field;
                    //alert(field);
                }

                function karakter_e() {
                    /*
                    teks = document.getElementById("input").value
                    document.getElementById("input").value=teks+"è"
                    document.getElementById("input").focus()
                    return false
                    */

                    var idJawaban = document.getElementById('focusedField').value;
                    var valueJawaban = document.getElementById(idJawaban).value;

                    document.getElementById(idJawaban).value = valueJawaban + "è";
                    document.getElementById(idJawaban).focus();

                    return false;
                }

                function karakter_a() {
                    /*
                    teks = document.getElementById("input").value
                    document.getElementById("input").value=teks+"â"
                    document.getElementById("input").focus()
                    return false
                    */
                    var idJawaban = document.getElementById('focusedField').value;
                    var valueJawaban = document.getElementById(idJawaban).value;

                    document.getElementById(idJawaban).value = valueJawaban + "â";
                    document.getElementById(idJawaban).focus();

                    return false;
                }
                </script>

                <div style="height:430px;" class="col-lg-12">
                    <div class="presentation"
                        style="    position: absolute;height: 100%;width: 100%;    left: 0px;    top: 0px;    display: block;    overflow: hidden;background: #ffffff; /* Mengatur warna latar belakang menjadi putih */">
                        <!-- Defining the main presentation -->
                        <div id="presentation-counter">Proses...</div>

                        <div class="slides">
                            <!-- Defining slides -->
                            <?php
                        require_once("koneksi.php");
                    ?>

                            <div class="slide" id="slide1" onload="noBack();"
                                onpageshow="if (event.persisted) noBack();" onunload>
                                <!-- Defining single slide -->
                                <section class="middle">
                                    <div id="cobakuis">
                                        <h3 style="color:#31708f">
                                            <strong>Masukkan Nama :</strong>
                                        </h3>
                                        <input type="text" style="text-align:center; width:300px; font-size:20px"
                                            name="nama" id="nama">
                                        <br>
                                        <button type="button" id="left-init-key" name="s1" class="btn btn-primary">Mulai
                                            Kuis</button>
                                    </div>
                                </section>
                            </div>

                            <div class="slide" id="tingkat1" onload="noBack();"
                                onpageshow="if (event.persisted) noBack();" onunload>
                                <section class="middle">
                                    <h2 style="color:#31708f"><strong>SOAL 1</strong></h2>
                                    <h3>Soal berupa Gambar <br> Bagian Tubuh Manusia</h3>
                                    <h3>Apa Nama Gambar Tersebut <br> Dalam Bahasa Madura <br> <em>"Èngghi Bhunten"</em>
                                    </h3>
                                    <button type="button" id="nav-next" name="t1"
                                        class="btn btn-primary">Lanjutkan</button>
                                </section>
                            </div>

                            <div class="slide" id="soal1" onload="noBack();" onpageshow="if (event.persisted) noBack();"
                                onunload>
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped"
                                            style="text-align:center; width:400px; margin-left:40px; float:left;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Soal (Gambar)</th>
                                                    <th style="text-align:center">Jawaban (Èngghi Bhunten)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
												$angka=0;
												$q = mysqli_query($koneksi, "select `madura` from `kuis` order by rand() limit 4;");
												while($h = mysqli_fetch_array($q)){?>
                                                <tr>
                                                    <td><img src="image/<?php echo  htmlspecialchars($h[0]); ?>.png"
                                                            width="49"></td>
                                                    <input type="hidden" value="<?php echo htmlspecialchars($h[0]);?>"
                                                        name="soal_gambar<?php echo ++$angka; ?>">
                                                    <td><input type="text" id="jawaban_gambar<?php echo $angka; ?>"
                                                            class="form-control"
                                                            onFocus="setFocusedField('jawaban_gambar<?php echo $angka; ?>')">
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                        <script type="text/javascript">
                                        function koreksi_soal_gambar() {

                                            var result = "";
                                            var nilai = 0;

                                            for (var i = 1; i <= 4; i++) {
                                                soal = document.getElementsByName('soal_gambar' + i)[0].value;
                                                jawaban = document.getElementById('jawaban_gambar' + i).value;
                                                jawaban = jawaban.toLowerCase();

                                                if (jawaban == soal) {
                                                    result += "Tebak " + i + " Jawaban \"" + jawaban + "\" Benar\n\n";
                                                    nilai += 25;
                                                } else {
                                                    result += "Tebak " + i + " Jawaban \"" + jawaban +
                                                        "\" Salah Yang Benar \"" + soal + "\"\n\n";
                                                }
                                            }

                                            result += "Nilai Kamu : " + nilai;
                                            nilaiAkhir = nilaiAkhir + nilai;
                                            document.getElementById('nilai_gambar').innerHTML =
                                                "Kosakata Bahasa Madura : " + nilai;
                                            document.getElementById('gambar_hidden').value = nilai;
                                            alert(result);
                                            //window.location.reload();
                                        }
                                        </script>
                                    </div>
                                    <input type="hidden" id="focusedField" />
                                    <button type="button" class="btn btn-warning" onClick="karakter_e()">Karakter
                                        &egrave;</button>
                                    <button type="button" class="btn btn-success" onClick="karakter_a()">Karakter
                                        &acirc;</button>
                                    <button type="button" id="nav-next" class="btn btn-danger"
                                        onClick="koreksi_soal_gambar()">Selesai</button>
                                </section>
                            </div>

                            <div class="slide" id="tingkat2" onload="noBack();"
                                onpageshow="if (event.persisted) noBack();" onunload>
                                <section class="middle">
                                    <h1 style="color:#31708f"><strong>SOAL 2</strong></h1>
                                    <h3>Soal berupa suara kata Bahasa Madura</h3>
                                    <h3>Apa arti dalam Bahasa Indonesia?</h3>
                                    <button type="button" id="nav-next" class="btn btn-primary">Lanjutkan</button>
                                </section>
                            </div>

                            <div class="slide" id="soal2" onload="noBack();" onpageshow="if (event.persisted) noBack();"
                                onunload>
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped"
                                            style="text-align:center; width:400px; margin-left:40px; float:left;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Soal (Suara)</th>
                                                    <th style="text-align:center">Jawaban (Arti Bahasa Indonesia)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        $angka=0;
                                        $q = mysqli_query($koneksi, "select `madura`,`indonesia` from `kamus` order by rand() limit 5;");
                                        while($h = mysqli_fetch_array($q)){?>
                                                <tr>
                                                    <td><button type="button" class="btn btn-lg btn-info"
                                                            onClick=play("<?php echo htmlspecialchars(utf8_encode($h[0]));?>")>Tebak
                                                            <?php echo ++$angka;?></button></td>
                                                    <input type="hidden" value="<?php echo $h[1];?>"
                                                        name="soal_indo<?php echo $angka; ?>">
                                                    <td><input type="text" id="jawaban_indo<?php echo $angka; ?>"
                                                            class="form-control"
                                                            onFocus="setFocusedField('jawaban_indo<?php echo $angka; ?>')">
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                        <script type="text/javascript">
                                        function koreksi_soal_indo() {

                                            var result = "";
                                            var nilai = 0;

                                            for (var i = 1; i <= 5; i++) {
                                                soal = document.getElementsByName('soal_indo' + i)[0].value;
                                                jawaban = document.getElementById('jawaban_indo' + i).value;
                                                jawaban = jawaban.toLowerCase();

                                                if (jawaban == soal) {
                                                    result += "Tebak " + i + " Jawaban \"" + jawaban + "\" Benar\n\n";
                                                    nilai += 20;
                                                } else {
                                                    result += "Tebak " + i + " Jawaban \"" + jawaban +
                                                        "\" Salah Yang Benar \"" + soal + "\"\n\n";
                                                }
                                            }

                                            result += "Nilai Kamu : " + nilai;
                                            nilaiAkhir = nilaiAkhir + nilai;
                                            document.getElementById('nilai_indonesia').innerHTML =
                                                "Terjemahan Bahasa Madura : " + nilai;
                                            document.getElementById('indonesia_hidden').value = nilai;
                                            alert(result);
                                            //window.location.reload();
                                        }
                                        </script>
                                    </div>
                                    <input type="hidden" id="focusedField" />
                                    <button type="button" class="btn btn-warning" onClick="karakter_e()">Karakter
                                        &egrave;</button>
                                    <button type="button" class="btn btn-success" onClick="karakter_a()">Karakter
                                        &acirc;</button>
                                    <button type="button" id="nav-next" class="btn btn-danger"
                                        onClick="koreksi_soal_indo()">Selesai</button>
                                </section>
                            </div>

                            <div class="slide" id="tingkat3" onload="noBack();"
                                onpageshow="if (event.persisted) noBack();" onunload>
                                <section class="middle">
                                    <h1 style="color:#31708f"><strong>SOAL 3</strong></h1>
                                    <h3>Soal berupa suara kata Bahasa Madura</h3>
                                    <h3>Bagaimana penulisannya?</h3>
                                    <button type="button" id="nav-next" class="btn btn-primary">Lanjutkan</button>
                                </section>
                            </div>

                            <div class="slide" id="soal3" onload="noBack();" onpageshow="if (event.persisted) noBack();"
                                onunload>
                                <section class="middle">
                                    <div class="table-responsive" id="coba">
                                        <table class="table table-bordered table-hover table-striped"
                                            style="text-align:center; width:400px; margin-left:40px; float:left;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Soal (Suara)</th>
                                                    <th style="text-align:center">Jawaban (Tulisan Bahasa Madura)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        $angka=0;
                                        $q = mysqli_query($koneksi, "select `madura` from `kamus` order by rand() limit 5;");
                                        while($h = mysqli_fetch_array($q)){?>
                                                <tr>
                                                    <td><button type="button" class="btn btn-lg btn-primary"
                                                            onClick=play("<?php echo htmlspecialchars(utf8_encode($h[0]));?>")>Tebak
                                                            <?php echo ++$angka;?></button></td>
                                                    <input type="hidden" value="<?php echo htmlspecialchars($h[0]);?>"
                                                        name="soal<?php echo $angka; ?>">
                                                    <td><input type="text" id="jawaban<?php echo $angka; ?>"
                                                            class="form-control"
                                                            onFocus="setFocusedField('jawaban<?php echo $angka; ?>')">
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                        <!--<a href="#sukukata1"><button type="button" class="btn btn-lg btn-primary" onClick="window.location.reload()">Acak Suku Kata</button></a> -->

                                        <script type="text/javascript">
                                        function koreksi_soal_suara() {

                                            var result = "";
                                            var nilai = 0;

                                            for (var i = 1; i <= 5; i++) {
                                                soal = document.getElementsByName('soal' + i)[0].value;
                                                jawaban = document.getElementById('jawaban' + i).value;
                                                jawaban = jawaban.toLowerCase();

                                                if (jawaban == soal) {
                                                    result += "Tebak " + i + " Jawaban \"" + jawaban + "\" Benar\n\n";
                                                    nilai += 20;
                                                } else {
                                                    result += "Tebak " + i + " Jawaban \"" + jawaban +
                                                        "\" Salah Yang Benar \"" + soal + "\"\n\n";
                                                }
                                            }

                                            result += "Nilai Kamu : " + nilai;
                                            nilaiAkhir = nilaiAkhir + nilai;
                                            alert(result);
                                            //window.location.reload();

                                            //Perhitungan nilai akhir
                                            nama = document.getElementById('nama').value;
                                            nilaiTotal = nilaiAkhir / 3;

                                            if (nilaiTotal <= 50) {
                                                nilaiHuruf = "Kurang Baik";
                                            } else if (nilaiTotal > 50 && nilaiTotal <= 60) {
                                                nilaiHuruf = "Cukup Baik";
                                            } else if (nilaiTotal > 60 && nilaiTotal <= 70) {
                                                nilaiHuruf = "Baik";
                                            } else {
                                                nilaiHuruf = "Sangat Baik";
                                            }

                                            document.getElementById('nilai_akhir').innerHTML = "Nilai Akhir : " +
                                                nilaiTotal;
                                            document.getElementById('nama_sertifikat').innerHTML = "Nama : " + nama;
                                            document.getElementById('nilai_madura').innerHTML =
                                                "Penulisan Bahasa Madura : " + nilai;
                                            document.getElementById('name_hidden').value = nama;
                                            document.getElementById('nilai_hidden').value = nilaiHuruf;
                                            document.getElementById('madura_hidden').value = nilai;
                                            document.getElementById('music').play();
                                            /*document.write('<embed autostart="true" loop="false" src="audio/beep">')*/
                                        }
                                        </script>
                                    </div>
                                    <input type="hidden" id="focusedField" />
                                    <button type="button" class="btn btn-warning" onClick="karakter_e()">Karakter
                                        &egrave;</button>
                                    <button type="button" class="btn btn-success" onClick="karakter_a()">Karakter
                                        &acirc;</button>
                                    <button type="button" id="nav-next" class="btn btn-danger"
                                        onClick="koreksi_soal_suara()">Selesai</button>
                                </section>
                            </div>

                            <div class="slide" id="sertifikat">
                                <section class="middle">
                                    <h1 style="color:#31708f"><strong>Nilai Akhir</strong></h1>
                                    <h3 id="nama_sertifikat"></h3>
                                    <h3 id="nilai_akhir"></h3>
                                    <h4 id="nilai_gambar"></h4>
                                    <h4 id="nilai_indonesia"></h4>
                                    <h4 id="nilai_madura"></h4>

                                    <form action="page/sertifikat.php" method="POST">
                                        <input type="hidden" name="name_hidden" id="name_hidden">
                                        <input type="hidden" name="nilai_hidden" id="nilai_hidden">
                                        <input type="hidden" name="gambar_hidden" id="gambar_hidden">
                                        <input type="hidden" name="indonesia_hidden" id="indonesia_hidden">
                                        <input type="hidden" name="madura_hidden" id="madura_hidden">
                                        <button type="submit" class="btn btn-success" role="button"><a href="index.php"
                                                style="color:#ffffff">Belajar Lagi</a></button>
                                    </form>

                                    </script>
                            </div>

                        </div>

                        <div id="hidden-note" class="invisible" style="display: none;">
                        </div> <!-- hidden note -->

                        <aside id="help" class="sidebar invisible" style="display:hidden;">
                            <!-- Defining sidebar help -->
                            <table>
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

                <div style="margin-top:15px;" class="col-lg-12">
                    <script type="text/javascript">
                    function play(file) {
                        document.getElementById('terjemahan').innerHTML = "<font color='red'><blink>Proses..." + file +
                            "</blink></font>";
                        $('#terjemahan').load('suara.php', 'b=1&kalimat=' + file);
                        //alert(file);
                    }
                    </script>
                    <p align="center" id="terjemahan" name="translate"></p>
                </div>

            </div>
        </div>
        <!-- /#page-wrapper -->
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
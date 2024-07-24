<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="../../halaman_belajar.php"><span>Ruang <?php echo $_SESSION['level']; ?></span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar-item">
            <ul>
                <li class="dropdown"><a href="#"><span>Pemula 1</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="../../huruf-angka.php">Huruf & Angka</a></li>
                        <li><a href="../../suku-kata.php">Suku Kata</a></li>
                        <li><a href="../../kata.php">Kata</a></li>
                        <li><a href="../../bendahara-kata.php">Bendahara Kata</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span>Pemula 2</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="../../halaman-kata-khusus.php">Kata Khusus</a></li>
                        <li><a href="../../halaman-kalimat.php">Kalimat</a></li>
                        <li><a href="../../kamus.php">Terjemah</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="../../rangkuman-belajar">Rangkuman Belajar</a></li>
                <li class="dropdown"><a href="#"><span>Pengaturan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="../../profil.php">Profile</a></li>
                        <li><a href="../../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
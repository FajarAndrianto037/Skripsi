<?php
session_start();
include "../../koneksi.php";
if (isset($_SESSION['rombel_id'])) {
	$query = "SELECT * FROM kuis_pembelajaran LIMIT 10";
	$run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$total = mysqli_num_rows($run);
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
			?><!-- End Header -->
			<br><br><br>
			<main id="main">
				<!-- ======= Features Section ======= -->
				<section id="features" class="features">
					<div class="container">
						<div class="section-title" data-aos="fade-up">
							<h2>Abhâsa Madhure</h2><br>
							<p>Kuis Kata Khusus</p>
						</div>
						<main>
							<div class="container">
								<ul class="list-group">
									<li class="list-group-item"><strong>Jumlah kuis yang harus dikerjakan:</strong> <?php echo $total; ?></li>
									<li class="list-group-item"><strong>Jenis Kuis:</strong> Pilihan Ganda</li>
									<li class="list-group-item"><strong>Nilai Setiap Kuis:</strong> 10 Poin Untuk 1 Kuis</li>
								</ul>
								<a href="kuis-khusus.php?n=1" class="btn btn-primary mt-3">Mulai Kuis</a>
								<a href="exit.php" class="btn btn-danger mt-3 ml-2">Keluar</a>
							</div>
						</main>

					</div>
				</section><!-- End Features Section -->

				<!-- ======= Team Section ======= -->
				<section id="team" class="team">
					<div class="container">

					</div>
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
			<script src="../../style/vendor/purecounter/purecounter_vanilla.js"></script>
			<script src="../../style/vendor/aos/aos.js"></script>
			<script src="../../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="../../style/vendor/glightbox/js/glightbox.min.js"></script>
			<script src="../../style/vendor/swiper/swiper-bundle.min.js"></script>
			<script src="../../style/vendor/php-email-form/validate.js"></script>

			<!-- Template Main JS File -->
			<script src="../../style/js/main.js"></script>
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
		<?php unset($_SESSION['kuis_khusus']); ?>
	<?php } else {
	header("location: halaman-khusus.php");
}
	?>
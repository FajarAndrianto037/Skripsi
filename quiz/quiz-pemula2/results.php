<?php
session_start();
include "../../koneksi.php";
if (isset($_SESSION['rombel_id'])) {
?>
	<?php if (!isset($_SESSION['kuis_pemula2'])) {
		header("location: kuis-pemula2.php?n=1");
	}
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
			$nilai = $_SESSION['set_nilai'];
			?>
			<!-- End Header -->
			<br><br><br><br><br><br>
			<main>
				<div class="container">
					<ul class="list-group">
						<li class="list-group-item"><strong>Jumlah Nilai Minimal : </strong> <?php echo $nilai ?></li>
						<?php if (isset($_SESSION['kuis_pemula2'])) {
							if (!isset($_SESSION['total_benar'])) {
								// Jika belum memiliki nilai, atur nilai menjadi 0
								$_SESSION['total_benar'] = 0;
							}
							$total_point = $_SESSION['kuis_pemula2'];
							echo '<li class="list-group-item"><strong>Jumlah Soal yang Benar :</strong> ' . $_SESSION['total_benar'] . '</li>';
							echo '<li class="list-group-item"><strong>Skor Kuis :</strong> ' . $total_point . '</li>';
						} ?>
					</ul>
					<a href="kuis-pemula2.php?n=1" class="btn btn-primary mt-3">Coba Lagi Kuis</a>
					<a href="../../halaman_belajar.php" class="btn btn-danger mt-3 ml-2">Keluar</a>
					<a href="../quiz-akhir/halaman-akhir.php" class="btn btn-info mt-3 ml-2">Next Materi</a>
				</div>
			</main>
			<?php unset($_SESSION['total_benar']); ?>
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

		<?php
		// Update nilai kuis_huruf jika nilai kuis yang baru lebih tinggi
		$kuis_pemula2 = $_SESSION['kuis_pemula2'];
		$id_user = $_SESSION['id_user'];
		$query = "SELECT kuis_pemula2 FROM rombel_belajar WHERE id_user = '$id_user'";
		$result = mysqli_query($mysqli, $query);
		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$existing_kuis_pemula2 = $row['kuis_pemula2'];
			if ($kuis_pemula2 > $existing_kuis_pemula2) {
				$query = "UPDATE rombel_belajar SET kuis_pemula2 = '$kuis_pemula2' WHERE id_user = '$id_user'";
				$run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
			}
		}
		?>
		<?php unset($_SESSION['kuis_pemula2']); ?>
		<?php unset($_SESSION['time_up']); ?>
		<?php unset($_SESSION['start_time']); ?>
	<?php } else {
	header("location: home.php");
}
	?>
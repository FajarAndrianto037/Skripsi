<?php
session_start();
include "../../koneksi.php";
?>
<?php
if (isset($_SESSION['rombel_id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['id_user'])) {
	$id_user = mysqli_real_escape_string($mysqli, $_POST['id_user']);
	if (filter_var($id_user, FILTER_VALIDATE_INT)) {
		$chekid = "SELECT * from rombel_belajar WHERE id_user = '$id_user'";
		$runcheck = mysqli_query($mysqli, $chekid) or die(mysqli_error($mysqli));
		if (mysqli_num_rows($runcheck) > 0) {
			$pengerjaan = date('Y-m-d H:i:s');
			$update = "UPDATE rombel_belajar SET pengerjaan = '$pengerjaan' WHERE id_user = '$id_user' ";
			$runupdate = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));
			$row = mysqli_fetch_array($runcheck);
			$rombel_id = $row['rombel_id'];
			$_SESSION['rombel_id'] = $rombel_id;
			$_SESSION['id_user'] = $row['id_user'];
			header("location: home.php");
		} else {
			$pengerjaan = date('Y-m-d H:i:s');
			$query = "INSERT INTO rombel_belajar(id_user,pengerjaan) VALUES ('$id_user','$pengerjaan')";
			$run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
			if (mysqli_affected_rows($mysqli) > 0) {
				$query2 = "SELECT * FROM rombel_belajar WHERE id_user = '$id_user' ";
				$run2 = mysqli_query($mysqli, $query2) or die(mysqli_error($mysqli));
				if (mysqli_num_rows($run2) > 0) {
					$row = mysqli_fetch_array($run2);
					$rombel_id = $row['rombel_id'];
					$_SESSION['rombel_id'] = $rombel_id;
					$_SESSION['id_user'] = $row['id_user'];
					header("location: home.php");
				}
			} else {
				echo "<script> alert('something is wrong'); </script>";
			}
		}
	} else {
		echo "<script> alert('Invalid id_user'); </script>";
	}
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
		?>
		<!-- End Header -->
		<br><br><br>
		<main id="main">
			<!-- ======= Features Section ======= -->
			<section id="features" class="features">
				<div class="container">
					<div class="section-title" data-aos="fade-up">
						<h2>Abhâsa Madhure</h2><br>
						<p>Kuis Kalimat</p>
					</div>
					<!-- <form method="POST" action="">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Kode Kelas</label>
							<input type="text" name="kode_kelas" class="form-control" id="" required="" aria-describedby="emailHelp">
						</div>
						<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
					</form> -->
					<form method="POST" action="">
						<div class="form-group">
							<select class="form-control" name="id_user" required="">
								<?php
								// Query untuk mendapatkan data user
								$query_users = "SELECT id_user, nama FROM user";
								$result_users = mysqli_query($mysqli, $query_users);

								// Periksa apakah query berhasil dieksekusi
								if ($result_users && mysqli_num_rows($result_users) > 0) {
									while ($row_user = mysqli_fetch_assoc($result_users)) {
										// Bandingkan ID user dengan ID user yang tersimpan di session
										$selected = ($row_user['id_user'] == $_SESSION['id_user']) ? "selected" : "";
										echo "<option value='" . $row_user['id_user'] . "' $selected>" . $row_user['nama'] . "</option>";
									}
								} else {
									echo "<option disabled selected>No users available</option>";
								}
								?>
							</select>
						</div>
						<input type="submit" class="btn btn-primary" name="submit" value="PLAY NOW">
						<a href="../../halaman_belajar.php"><button class="btn btn-danger">Kembali</button></a>
					</form>

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
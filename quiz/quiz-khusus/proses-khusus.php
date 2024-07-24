<?php 
session_start();
include "../../koneksi.php";

if (isset($_SESSION['rombel_id'])) {
   
	if(!isset($_SESSION['kuis_khusus'])) {
		$_SESSION['kuis_khusus'] = 0;
	}
	if ($_POST) {
            $_SESSION['start_time'] = $newtime;
		    $qid = $_POST['qid'];
            $qno = $_SESSION['quiz'];
            $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
		    $selected_choice = $_POST['choice'];
		    $nextqno = $qno + 1;


            $qid = $_POST['qid'] ?? null;

            if ($qid !== null) {
            // Jika 'qid' belum ada dalam sesi, buat array baru
            if (!isset($_SESSION['qid_list'])) {
                $_SESSION['qid_list'] = [];
            }

            // Tambahkan 'qid' ke daftar jika belum ada
            if (!in_array($qid, $_SESSION['qid_list'])) {
                $_SESSION['qid_list'][] = $qid;
            }
            }

            // Batasi jumlah soal yang akan dikerjakan menjadi 5
            if ($_SESSION['quiz'] > 11) {
                header("location: results.php");
                exit;
            }

    	    $query = "SELECT * FROM kuis_pembelajaran WHERE qid = $qid"; 
            $run = mysqli_query($mysqli , $query) or die(mysqli_error($mysqli));
            if(mysqli_num_rows($run) > 0 ) {
        	    $row = mysqli_fetch_array($run);
        	    $kunci_jawaban = $row['kunci_jawaban'];
                // var_dump($row);die;
            } else {
                // Jika tidak ada soal yang sesuai dengan kriteria, maka arahkan ke halaman hasil
                header("location: results.php");
                exit;
            }

            if ($kunci_jawaban == $selected_choice) {
        	    $_SESSION['kuis_khusus'] += 10;
                
                // Update jumlah soal yang benar
                $_SESSION['total_benar']++;
            }

            if ($_SESSION['quiz'] >= 11) {
                header("location: results.php");
                exit;
            } else {
                header("location: kuis-khusus.php?n=".$nextqno);
                exit;
            }
        // }
    }
    else {
        header("location: home.php");
    }
}
else {
	header("location: home.php");
}
?>

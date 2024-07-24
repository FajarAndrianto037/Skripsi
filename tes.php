<?php
	include "fsa.php";
	//echo "<h1>";
	if(isset($_POST['kata'])){
		$kat = $_POST['kata'];
		$pecah = explode(' ',$kat);
		foreach ($pecah as $i => $h){
			if ($i > 0 ) {
				echo " -";
			}
			echo proses_fsa($h);
		}
	}
	//echo "</h1>";
?>
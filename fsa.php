<?php
	//menonaktifkan pesan eror di php
	error_reporting(E_ERROR | E_PARSE);
	//deklarasi variabel pola (1=v, 2=k, 3=kv, 4=g)
	$pola;
	
	//fungsi proses FSA
	function proses_fsa($kata){
		//memasukkan variabel global
		global $pola;
		//inisialisasi variabel pola
		$pola = array();
		//memanggil fungsi FSA 1, sekaligus FSA 2
		$hasil = fsa_tingkat_satu($kata);
		//mengembalikan nilai $hasil
		return $hasil;
	}
	
	//fungsi proses FSA
	function fsa_tingkat_satu($kata){
		//memasukkan variabel global
		global $pola;
		//inisialisasi variabel vokal
		$vocal = array("a","â","e","è","i","o","u","'","È","Â");
		//inisialisasi variabel konsonan ganda
		$konsonan2 = array("b","g","d","j","k");
		//kata dijadikan huruf kecil
		$kata = strtolower($kata);
		//mengganti karakter "\\, -" menjadi karakter kosong
		$kata = str_replace(array('\\','-'),'',$kata);
		//memecah kata menjadi array huruf
		$huruf = mb_str_split($kata);
		//menampung hasil FSA 1
		$hasil1 = "";
		$i = 0;
		
		//strln = panjang array kata
		while ($i < strlen($kata)) {
			//apakah huruf n
			if($huruf[$i] == "n") {
				//huruf n bertemu huruf g/y.vokal
				if(($huruf[$i+1] == "g" || $huruf[$i+1] == "y") && in_array($huruf[$i+2],$vocal)) {
					//$hasil = kv
					$hasil1 .= $huruf[$i].$huruf[$i+1].$huruf[$i+2];
					$pola[] = 3;
					$i+=2;
				} else 
				//huruf n bertemu huruf g/y saja
				if($huruf[$i+1] == "g" || $huruf[$i+1] == "y") {
					//$hasil = k
					$hasil1 .= $huruf[$i].$huruf[$i+1];
					$pola[] = 2;
					$i+=1;
				} else {
					//huruf n bertemu dengan vokal saja
					if(in_array($huruf[$i+1],$vocal)) {
						//$hasil = kv
						$hasil1 .= $huruf[$i].$huruf[$i+1];
						$pola[] = 3;
						$i+=1;
					} else {
						//apabila hanya huruf n maka hasil = k
						$hasil1 .= $huruf[$i];
						$pola[] = 2;
					}
				}
				//menambah karakter "-" setelah variabel hasil
				$hasil1 .= "-";
			//apabila huruf sekarang adalah huruf konsonan ganda
			} else if(in_array($huruf[$i],$konsonan2)) {
				//huruf berikutnya adalah h.vokal
				if($huruf[$i+1] == "h" && in_array($huruf[$i+2],$vocal)) {
					//$hasil = kv
					$hasil1 .= $huruf[$i].$huruf[$i+1].$huruf[$i+2];
					$pola[] = 3;
					$i+=2;
				} else
				//huruf berikutnya adalah h saja
				if($huruf[$i+1] == "h") {
					//$hasil = k
					$hasil1 .= $huruf[$i].$huruf[$i+1];
					$pola[] = 2;
					$i+=1;
				} else 
				//huruf berikutnya adalah vokal saja
				if(in_array($huruf[$i+1],$vocal)) {
					//$hasil = kv
					$hasil1 .= $huruf[$i].$huruf[$i+1];
					$pola[] = 3;
					$i+=1;
				} else {
					//huruf sekarang hanya konsonan ganda maka hasil = k
					$hasil1 .= $huruf[$i];
					$pola[] = 2;
				}
				//menambah karakter "-" setelah variabel hasil
				$hasil1 .= "-";
			//apabila huruf sekarang adalah huruf vokal saja
			} else if(in_array($huruf[$i],$vocal)) {
				//maka hasil = v.-
				$hasil1 .= $huruf[$i]."-";
				//apabila huruf sekarang adalah karakter glotal saja
				if ($huruf[$i] == "'")
					$pola[] = 4;
				else
					$pola[] = 1;
			} else {
				//apabila huruf sekarang adalah huruf konsonan bertemu dengan vokal
				if(in_array($huruf[$i+1],$vocal)) {
					//$hasil = kv
					$hasil1 .= $huruf[$i].$huruf[$i+1];
					$pola[] = 3;
					$i+=1;
				} else {
					//$hasil = k
					$hasil1 .= $huruf[$i];
					$pola[] = 2;
				}
				//menambah karakter "-" setelah variabel hasil
				$hasil1 .= "-";
			}
			$i++;
		}
		//echo 'FSA1 = '.utf8_encode($hasil1);
		//mengembalikan variabel hasil FSA 1 ke proses FSA 2
		return fsa_tingkat_dua($hasil1);
	}
	
	//fungsi proses FSA 2
	function fsa_tingkat_dua($kata){
		//memasukkan variabel global
		global $pola;
		//hasil FSA 1 di pecah berdasarkan "-"
		$arr_skt = explode('-',$kata);
		$i = 0;
		$hasil2 = "";
		
		//melooping isi dari array suku kata (-1 karena array paling belakang kosong)
		while ($i < sizeof($arr_skt) - 1) {
			//apabila array sekarang 1(v) dan array berikutnya adalah 2(k) atau 4(glotal)
			if($pola[$i] == 1 && ($pola[$i+1] == 2 || $pola[$i+1] == 4)){
				//$hasil = vk/vg
				$hasil2 .= $arr_skt[$i].$arr_skt[$i+1];
				$i+=1;
			} else 
			//apabila array sekarang 1(v) saja
			if ($pola[$i] == 1){
				//$hasil = v
				$hasil2 .= $arr_skt[$i];
			} else
			//apabila array sekarang 2(k) dan array berikutnya adalah 3(kv) dan array berikutnya adalah 2(k) atau 4(glotal)
			if($pola[$i] == 2 && $pola[$i+1] == 3 && ($pola[$i+2] == 2 || $pola[$i+2] == 4)){
				//$hasil = kkvk/kkvg
				$hasil2 .= $arr_skt[$i].$arr_skt[$i+1].$arr_skt[$i+2];
				$i+=2;
			} else
			//apabila array sekarang 2(k) dan array berikutnya adalah 3(kv)
			if($pola[$i] == 2 && $pola[$i+1] == 3){
				//$hasil = kkv
				$hasil2 .= $arr_skt[$i].$arr_skt[$i+1];
				$i+=1;
			} else 
			//apabila array sekarang 2(k) saja
			// if ($pola[$i] == 2){
				//hasil = k
				// $hasil2 .= $arr_skt[$i];
			// } else
			//apabila array sekarang 3(kv) dan array berikutnya adalah 2(k) atau 4(glotal)
			if($pola[$i] == 3 && ($pola[$i+1] == 2 || $pola[$i+1] == 4)){
				//$hasil = kvk/kvg
				$hasil2 .= $arr_skt[$i].$arr_skt[$i+1];
				$i+=1;
			} else
			//apabila array sekarang 3(kv) saja
			if ($pola[$i] == 3){
				//hasil = kv
				$hasil2 .= $arr_skt[$i];
			} //else {
				//$hasil2 .= $arr_skt[$i];
			//}
			$i++;
			//menambah karakter "-" setelah variabel hasil
			$hasil2 .= "-";
		}
		return $hasil2;
	}
?>
<?php
// require_once("koneksi.php");

/* fungsi cek kamus untuk mencari kata di dalam kamus */
function cek_kamus($kata){
	$host = "localhost";
	$admin = "root";
	$password = "";
	$dbname="belajar_bahasa_madura";
	
	$koneksi= new mysqli($host,$admin,$password,$dbname);

	if ($koneksi->connect_error){
		die("Koneksi Database gagal" . $koneksi->connect_error);
	}
		
	//$kata=str_replace("è","e",$kata); //mengganti huruf è menjadi e kemudian disimpan dalam kalimat 
	//$kata=str_replace("â","a",$kata); //mengganti tanda â menjadi a kemudian disimpan dalam kalimat
	//$kata = utf8_decode($kata); /dekoding sebuah UTF – 8 string ke ISO – 8859-1/
	$kata = addslashes($kata); //tambahkan tanda backslash jika terdapat karakter escape pada kata agar tidak error/

    $kata = mysqli_real_escape_string($koneksi, $kata); /*menghindari SQL Injection dengan menghindari karakter escape*/

    $query = "SELECT `madura` FROM `kamus` WHERE `madura`=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $kata);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $data = mysqli_stmt_num_rows($stmt);

    if($data >= 1){ /*jika kata yang di-stemming ada di kamus*/
        return true; /*maka kembalikan nilai true*/
    } else {
        return false;
    }
}/* end fungsi cek kamus */



/*fungsi cek rule precedence untuk mengecek apakah suatu kata memiliki kombinasi imbuhan terlarang atau tidak*/
function cek_rule_precedence($kata){

	/*cek kata apakah memiliki kombinasi imbuhan yg tidak diperbolehkan*/
	if(preg_match("/(^è[^0-9]+(èpon|na)$)|(^a[^0-9]+èpon$)|(^ta[^0-9]+(è|wi|en|ana|aghi)$)|(^sa[^0-9]+(è|wi|nè)$)|(^pè[^0-9]+(è|wi|nè|en|wen)$)|(^pan[^0-9]+(è|wi|nè|en)$)|(^pam[^0-9]+(è|wi|nè|en)$)|(^pang[^0-9]+(è|wi|nè|en))|(^n[aiueo])|(^ny[aiueo])|(^m[aiueo])|(^ng[aiueo])/i",$kata)){
		
		return true; /*jika ada maka kembalikan nilai true*/
		
	}else{
		
		return false;		
	}
}

/*fungsi untuk hapus possesive pronoun*/
function hapus_possesive_pronoun($kata,&$akhiran){

	if(!cek_kamus($kata)){
	
		if(preg_match("/(na|èpon|\Dèpon)$/i",$kata,$suffixes)){ /*cek kata apakah memiliki possesive pronoun (na)*/
		
			$kata = preg_replace("/(na|èpon|\Dèpon)$/i","",$kata); /*jika ada maka hilangkan possesive pronoun tersebut*/
		
			$akhiran = "$akhiran-$suffixes[0]";
		
		}
	
	}
	
	return $kata;
	
}

/*fungsi untuk menghapus akhiran (derivational suffix)*/
function hapus_derivation_suffixes($kata,&$akhiran){
	
	if(!cek_kamus($kata)){ /*jika kata tidak ada dikamus maka hilangkan awalan*/
	
		if(preg_match("/(e|è|wi|nè|â|a|wa|an|yan|wan|en|wen|na|ana|wana|yana|aghi|waghi|yaghi)$/i",$kata,$suffixes)){
		
			$kata = preg_replace("/(e|è|wi|nè|â|a|wa|an|yan|wan|en|wen|na|ana|wana|yana|aghi|waghi|yaghi)$/i","",$kata);
			
			$akhiran = "$akhiran-$suffixes[0]";
			
			if(preg_match("/[^aiueog]{2}$/",$kata)){ /*Jika huruf terakhir adalah huruf konsonan rangkap 2 maka hapus huruf terakhir*/
				
				$kata = preg_replace("/[^aiueo]$/","",$kata); /*kecuali g, a, i, u, e, o*/
				
			}
		
		}
		
	}
	
	return $kata;

}

/*fungsi untuk menghapus awalan (derivational prefixes)*/
function hapus_derivation_prefixes($kata, &$awalan) {
    $awalanprev = ""; // Deklarasi dan inisialisasi $awalanprev di luar loop

    for ($i = 1; $i <= 3; $i++) {
        if (!cek_kamus($kata)) { // Jika tidak ada di kamus maka lakukan pemotongan kata
            // Pemotongan biasa
            if (preg_match_all("/^(e|è|a|ta|ma|ka|sa|pa|koma|kamè|kapè|pè|pan|pam|pang)/", $kata, $prefixes)) {
                if (!($awalanprev == $prefixes[0][0])) {
                    $kata = preg_replace("/^(e|è|a|ta|ma|ka|sa|pa|koma|kamè|kapè|pè|pan|pam|pang)/", "", $kata);
                    $awalan .= $prefixes[0][0]; // Simpan awalan sebagai parameter output
                    $awalanprev = $prefixes[0][0];
                }
            } elseif (preg_match_all("/^n[aiueo]/", $kata, $prefixes)) {
                // Pemotongan bermorfologi
                if (!($awalanprev == $prefixes[0][0])) {
                    $kata = preg_replace("/^n/", "t", $kata);
                    $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0][0]); // Simpan awalan sebagai parameter output
                    $awalanprev = $prefixes[0][0];
                }
            } elseif (preg_match_all("/^ny[aiueo]/", $kata, $prefixes)) {
                if (!($awalanprev == $prefixes[0][0])) {
                    $kata = preg_replace("/^ny/", "s", $kata);
                    $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0][0]); // Simpan awalan sebagai parameter output
                    $awalanprev = $prefixes[0][0];
                }
            } elseif (preg_match_all("/^m[aiueo]/", $kata, $prefixes)) {
                if (!($awalanprev == $prefixes[0][0])) {
                    $kata = preg_replace("/^m/", "p", $kata);
                    $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0][0]); // Simpan awalan sebagai parameter output
                    $awalanprev = $prefixes[0][0];
                }
            } elseif (preg_match_all("/^ng[aiueo]/", $kata, $prefixes)) {
                if (!($awalanprev == $prefixes[0][0])) {
                    $kata = preg_replace("/^ng/", "k", $kata);
                    $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0][0]); // Simpan awalan sebagai parameter output
                    if (!cek_kamus($kata)) { // Jika tidak ada di kamus maka huruf k di awal dihapus
                        $kata = preg_replace("/^k/", "", $kata);
                    }
                    $awalanprev = $prefixes[0][0];
                }
            }
        } else { // Jika ada di kamus maka hentikan perulangan dengan membuat $i lebih dari 3
            $i = 4;
        }
    }

    return $kata;
}


/*fungsi untuk menghapus sisipan*/
function hapus_sisipan($kata){
	
	$kataAwal = $kata;
	
	if(!cek_kamus($kata)){ /*jika tidak ada di kamus maka lakukan pengecekan sisipan*/
	
		if(preg_match("/^[^0-9]+(al|ar|en|in|om|um|am)/i",$kata,$sisipan)){ /*jika ada sisipan maka lakukan pemotongan*/
		
			$kata = preg_replace("/(al|ar|um|en|in|om|am)/i","",$kata,1); 
			
		}
	
	}
	
	if(cek_kamus($kata)){ /*setelah sisipan dipotong apakah ada di kamus*/
		
		return $kata; /*jika ada maka kembalikan nilai kata yg telah dipotong*/
		
	}else{
	
		return $kataAwal; /*jika tidak ada di kamus maka kembalikan sisipan yg dihapus*/
		
	}

}


/*fungsi awalan untuk menghapus awalan untuk digunakan pada fungsi loop_pengembalian_akhiran*/
function hapus_awalan($kata) {
    $awalanprev = ""; // Deklarasi dan inisialisasi $awalanprev
    $awalan = ""; // Deklarasi dan inisialisasi $awalan

    if (!cek_kamus($kata)) { // Jika tidak ada di kamus maka lakukan pemotongan kata
        // Pemotongan biasa
        if (preg_match("/^(e|è|a|ta|ma|ka|sa|pa|koma|kamè|kapè|pè|pan|pam|pang)/", $kata, $prefixes)) {
            if (!($awalanprev == $prefixes[0])) {
                $kata = preg_replace("/^(e|è|a|ta|ma|ka|sa|pa|koma|kamè|kapè|pè|pan|pam|pang)/", "", $kata);
                $awalan .= $prefixes[0]; // Simpan awalan sebagai parameter output
                $awalanprev = $prefixes[0];
            }
        } elseif (preg_match("/^n[aiueo]/", $kata, $prefixes)) {
            // Pemotongan bermorfologi
            if (!($awalanprev == $prefixes[0])) {
                $kata = preg_replace("/^n/", "t", $kata);
                $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0]); // Simpan awalan sebagai parameter output
                $awalanprev = $prefixes[0];
            }
        } elseif (preg_match("/^ny[aiueo]/", $kata, $prefixes)) {
            if (!($awalanprev == $prefixes[0])) {
                $kata = preg_replace("/^ny/", "s", $kata);
                $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0]); // Simpan awalan sebagai parameter output
                $awalanprev = $prefixes[0];
            }
        } elseif (preg_match("/^m[aiueo]/", $kata, $prefixes)) {
            if (!($awalanprev == $prefixes[0])) {
                $kata = preg_replace("/^m/", "p", $kata);
                $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0]); // Simpan awalan sebagai parameter output
                $awalanprev = $prefixes[0];
            }
        } elseif (preg_match("/^ng[aiueo]/", $kata, $prefixes)) {
            if (!($awalanprev == $prefixes[0])) {
                $kata = preg_replace("/^ng/", "k", $kata);
                $awalan .= preg_replace("/[aiueo]/", "", $prefixes[0]); // Simpan awalan sebagai parameter output
                $awalanprev = $prefixes[0];
            }
        }
    }
    return $kata;
}


/*fungsi loop pengembalian akhiran untuk mengembalikan akhiran jika kata yg telah dipenggal tidak ditemukan dalam kamus*/
function loop_pengembalian_akhiran($kata,$prefix,$suffix){
	
	$akhiran = explode("-",$suffix); /*simpan suffix di variabel $akhiran sebagai array agar bisa dikembalikan per-imbuhan*/
	
	switch (trim($prefix)) { /*jika prefix merupakan kata yang dapat bermorfologi maka lakukan recoding*/
			
			case "n"	: $kata = preg_replace("/^t/","n",$kata);
						break;
			
			case "ny"	: $kata = preg_replace("/^s/","ny",$kata);
						break;
						
			case "m"	: $kata = preg_replace("/^p/","m",$kata);
						break;
						
			case "ng"	: $kata = preg_replace("/^k/","ng",$kata);
						break;
			
			default :  $kata = $prefix.$kata; /*jika tidak ada maka kembalikan awalan yg telah dihapus*/
		}
	
	$kata = hapus_awalan($kata); //hilangkan awalan per-imbuhan
	
	for($i=1;$i<=count($akhiran);$i++){ /*lakukan pengembalian akhiran per-imbuhan*/
		
		if(cek_kamus($kata)){ /*jika kata telah ditemukan di kamus*/
			
			$i=5; /*akhiran perulangan pengembalian akhiran*/
			
		}else{
			/*jika tidak ada di kamus maka tambahkan akhiran lalu hapus awalan*/
			
			$kata = $kata.$akhiran[$i]; 
			
			$kata = hapus_awalan($kata);
				
		}
		
	}
	
	if(!cek_kamus($kata)){ /*cek apakah setelah loop pengembalian akhiran kata ada di kamus*/
		
		switch (trim($prefix)) {
			
			case "n"	: $kata = preg_replace("/^t/","n",$kata);
						break;
			
			case "ny"	: $kata = preg_replace("/^s/","ny",$kata);
						break;
						
			case "m"	: $kata = preg_replace("/^p/","m",$kata);
						break;
						
			case "ng"	: $kata = preg_replace("/^k/","ng",$kata);
						break;
			
			default :  $kata = $prefix.$kata; /*jika tidak ada maka kembalikan awalan yg telah dihapus*/
		}
			
	}
	
	return $kata;
	
}


/*fungsi ecs_madura adalah fungsi utama untuk melakukan stemming bahasa madura*/
function ecs_madura($kata,&$terater,&$panoteng){
	
	$kata = stripslashes(trim($kata)); /*menghapus karakter spasi pada awal atau akhir kata jika tidak sengaja terketik*/
	
	$kata_awal = $kata; /*simpan kata yg akan distem untuk jaga-jaga jika terjadi kegagalan stemming*/
	
	if(preg_match("/\-/",$kata)){ /*periksa apakah ada tanda penghubung (-)*/
        
        $kata = explode("-",$kata); /*jika ada maka pecah kata tersebut berdasarkan tanda penghubung (-)*/
		
		if(cek_rule_precedence($kata[1])){ /*jika rule precedence true maka langkah berikutnya 5,6,3,4,7*/
			
			$kata[0] = hapus_sisipan(hapus_derivation_suffixes(hapus_possesive_pronoun(hapus_derivation_prefixes($kata[0],$dp),$pp),$ds));
			
			$kata[1] = hapus_sisipan(hapus_derivation_suffixes(hapus_possesive_pronoun(hapus_derivation_prefixes($kata[1],$dp),$pp),$ds));
			
			if($kata[0]==$kata[1]){
			
				$kata = $kata[1];
				
			}else{
			
				$kata = $kata[1];
				
			}
			
		}else{ /*jika rule precedence false maka langkah berikutnya 3,4,5,6,7*/
		
			$kata[0] = hapus_sisipan(hapus_derivation_prefixes(hapus_derivation_suffixes(hapus_possesive_pronoun($kata[0],$pp),$ds),$dp));
			
			$kata[1] = hapus_sisipan(hapus_derivation_prefixes(hapus_derivation_suffixes(hapus_possesive_pronoun($kata[1],$pp),$ds),$dp));
			
			if($kata[0]==$kata[1]){
			
				$kata = $kata[1];
				
			}else{
			
				$kata = $kata[1];
				
			}
			
		}
		
	}else{ /*jika tidak ada kata penghubung maka stemming berjalan biasa*/
	
		if(cek_rule_precedence($kata[1])){ /*jika rule precedence true maka langkah berikutnya 5,6,3,4,7*/
	
			$kata = hapus_sisipan(hapus_derivation_suffixes(hapus_possesive_pronoun(hapus_derivation_prefixes($kata,$dp),$pp),$ds));
		
		}else{
			
			$kata = hapus_sisipan(hapus_derivation_prefixes(hapus_derivation_suffixes(hapus_possesive_pronoun($kata,$pp),$ds),$dp));
			
		}
		
	}
	
	
	
	if(!cek_kamus($kata)){/*jika stelah langkah 7 (hapus sisipan) masih tidak ada di kamus*/
	
		$kata = loop_pengembalian_akhiran($kata,$dp,"$ds$pp"); /*lakukan fungsi loop_pengembalian_akhiran()*/
		
	}
	
	
	if(!cek_kamus($kata)){ /*jika setelah loop_pengembalian_akhiran() kata yg di stem tidak ada di kamus*/
		
		$kata = $kata_awal; /*maka kata yang diinputkan dianggap sebagai kata dasar */
		
	}
	
	$terater = $dp;
	
	$panoteng = $ds.$pp;
	
	return $kata;
		
}
?>
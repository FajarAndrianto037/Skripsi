<?php


require_once("suara1.php");
function indonesia_madura($kalimat,$tingkat){

// require_once("koneksi.php");
$host = "localhost";
$admin = "root";
$password = "";
$dbname = "kamus";

// Membuat koneksi menggunakan mysqli
$koneksi = new mysqli($host, $admin, $password, $dbname);

require_once("ECS.php");

$tanda=array('(',')','.',',','?','!','\\',':',';','"');


$kalimat_asli = $kalimat;
	
	
$kalimat = str_replace($tanda, '', $kalimat); //stopword

$arr_kata_asli = explode(" ", $kalimat_asli);
$kata = explode(" ", $kalimat);//tokenisasi 


$filter_tingkatan = ''; 

switch($tingkat){ 

	case "1": $filter_tingkatan = " AND ( tingkatan IS NULL OR tingkatan = 'lomrah')";break; 
	case "2": $filter_tingkatan = " AND ( tingkatan IS NULL OR tingkatan = 'tengngaan' OR tingkatan = 'alos')";break;
	case "3": $filter_tingkatan = " AND ( tingkatan IS NULL OR tingkatan = 'alos tengghi')";break;
	default : "";break;
	
}

foreach($kata as $indeks => $value){

	$kata_stem[$indeks] = Enhanced_CS($value);
}

foreach($kata_stem as $nomor => $isi){
	$kata_asli = $arr_kata_asli[$nomor];
	$kata_asal = $kata[$nomor];
	
	$tanda_baca = str_ireplace($kata_asal,'',$kata_asli);
	
	$isi_asli = $isi;
	$isi = addslashes($isi);
	
	$sql = "SELECT * FROM kamus WHERE (`indonesia` = '$isi') $filter_tingkatan LIMIT 1";
	$result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	$num = mysqli_num_rows($result);
	//echo $isi;
	if($num == 1){
		
		$hasil = mysqli_fetch_array( $result);
		
		$kata_madura[$nomor] = $hasil['madura'];
		$jenis_kata[$nomor] = $hasil['keterangan'];
		// cek imbuhan
		
		$arti_awalan = '';
		$arti_akhiran = '';
		
		$imbuhan = str_ireplace($isi_asli,'#',$kata_asal);
		
		$arrImbuhan = explode('#',$imbuhan);
		
		if(count($arrImbuhan) > 0){
			$awalan = $arrImbuhan[0];
			$akhiran = $arrImbuhan[1];
			
			// cek awalan
			if(($awalan != '') && ($akhiran == '')){
			$sql = "SELECT * FROM imbuhan_indo WHERE awalan='$awalan' AND letak='awalan' LIMIT 1";
			$result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
			if(mysqli_num_rows($result)==1){
				$row = mysqli_fetch_array($result);
				$arti_awalan = $row['arti_awalan'];	
			}
			}
			
			// cek akhiran
			if(($awalan == '') && ($akhiran != '')){
			$sql = "SELECT * FROM imbuhan_indo WHERE akhiran='$akhiran' AND letak='akhiran' LIMIT 1";
			$result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
			if(mysqli_num_rows($result)==1){
				$row = mysqli_fetch_array($result);
				$arti_akhiran = $row['arti_akhiran'];	
			}
			}
			// cek awalan dan akhiran
			if(($awalan != '') && ($akhiran != '')){
				$sql = "SELECT * FROM imbuhan_indo WHERE awalan='$awalan' AND akhiran='$akhiran' AND letak='awalan akhiran' LIMIT 1";
				$result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
				if(mysqli_num_rows($result)==1){
					$row = mysqli_fetch_array($result);
					$arti_awalan = $row['arti_awalan'];	
					$arti_akhiran = $row['arti_akhiran'];	
				}		
			}
			
		}
			
				
		$kata_madura[$nomor] = $arti_awalan.$kata_madura[$nomor].$arti_akhiran.$tanda_baca;

	}else{
		
		$kata_madura[$nomor] = $isi.$tanda_baca;
		$jenis_kata[$nomor] = 'xxx';
	}
}

$kalimat_madura = join(" ",$kata_madura);
$spok_kalimat = join('#',$jenis_kata);

//$hasil_terjemahan = $spok_kalimat.'__';
$hasil_terjemahan = $kalimat_madura;

return stripslashes ($hasil_terjemahan); 
}
//echo "$_GET[kalimat]rouf".indonesia_madura("$_GET[kalimat]","$_GET[tingkat]");
//echo mainkan(indonesia_madura("$_GET[kalimat]","$_GET[tingkat]"))."<hr>r";
echo indonesia_madura("$_GET[input]","$_GET[tingkat]")."<hr>";
echo mainkan(indonesia_madura("$_GET[input]","$_GET[tingkat]"));
?>
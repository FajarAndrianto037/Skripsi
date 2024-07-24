<?php
function madura_indonesia($kalimat)
{

    // require_once("koneksi.php");
    $host = "localhost";
    $admin = "root";
    $password = "";
    $dbname="belajar_bahasa_madura";

    $koneksi= new mysqli($host,$admin,$password,$dbname);

    require_once("ecsmadura.php");
    
    $tanda = ['(', ')', '.', ',', '?', '!', '\\', ':', ';', '"'];

    $kalimat_asli = $kalimat; //kalimat asli disimpan dalam kalimat.
    $kalimat = str_replace($tanda, '', $kalimat); //mengganti tanda baca, lalu disimpan dalam kalimat.

    $arr_kata_asli = explode(" ", $kalimat_asli); //jumlah kata asli dipecah lalu disimpan ke dalam kal. asli.
    $kata = explode(" ", $kalimat); //kata dipisah berdasarkan spasi di simpan dalam kalimat.

    foreach ($kata as $indeks => $value) {

        //agar memudahkan query serta menghindari karakter tak terbaca
        //$value = preg_replace("/�/","a",$value);//ganti karakter khusus dengan karakter biasa

        //$value = preg_replace("/�/","e",$value);//ganti karakter khusus dengan karakter biasa 
        $awalan = [];
        $akhiran = [];
        $kata_stem[$indeks] = ecs_madura($value, $awalan[$indeks], $akhiran[$indeks]);
    }

    foreach ($kata_stem as $nomor => $isi) { // dari masing2 kata di stemm berdasarkan nomor lalu disimpan dlm isi.

        $kata_asli = stripslashes($arr_kata_asli[$nomor]);
        $kata_asal = stripslashes($kata[$nomor]);

        $tanda_baca = str_ireplace($kata_asal, '', $kata_asli);

        //echo $tanda_baca.'#';

        $isi_asli = $isi; //jumlah isi asli disimpan dalam isi.
        $isi = addslashes($isi); //menambah tanda (/) lalu disimpan dalam isi.
        $filter_tingkatan = "";
        $sql = "SELECT * from kamus where (`madura` ='$isi') $filter_tingkatan LIMIT 1";
        //echo $sql;
        $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        $num = mysqli_num_rows($result);
        //echo $isi;
        if ($num == 1) {

            $hasil = mysqli_fetch_array($result);

            $kata_indo[$nomor] = $hasil['indonesia'];

            // cek imbuhan

            $arti_awalan = '';
            $arti_akhiran = '';

            $imbuhan = str_ireplace($isi_asli, '#', $kata_asal);

            $arrImbuhan = explode('#', $imbuhan);

            //var_export($arrImbuhan);

            if (count($arrImbuhan) > 0) {
                $awalan = addslashes($arrImbuhan[0]);
                $akhiran = addslashes($arrImbuhan[1]);

                // cek awalan
                if (($awalan != '') && ($akhiran == '')) {
                    $sql = "SELECT * FROM imbuhan_madura WHERE awalan='" . $awalan . "' AND letak='awalan' LIMIT 1";
                    //echo $sql;
                    $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result);
                        $arti_awalan = $row['arti_awalan'];
                    }
                }

                // cek akhiran
                if (($awalan == '') && ($akhiran != '')) {
                    $sql = "SELECT * FROM imbuhan_madura WHERE akhiran='" . $akhiran . "' AND letak='akhirans' LIMIT 1";
                    $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result);
                        $arti_akhiran = $row['arti_akhiran'];
                    }
                }
                // cek awalan dan akhiran
                if (($awalan != '') && ($akhiran != '')) {
                    $sql = "SELECT * FROM imbuhan_madura WHERE awalan='" . $awalan . "' AND akhiran='" . $akhiran . "' AND letak='awalan akhiran' LIMIT 1";
                    $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result);
                        $arti_awalan = $row['arti_awalan'];
                        $arti_akhiran = $row['arti_akhiran'];
                    }
                }
            }

            $kata_indo[$nomor] = $arti_awalan . $kata_indo[$nomor] . $arti_akhiran . $tanda_baca;
        } else {

            $kata_indo[$nomor] = $isi . $tanda_baca;
        }
    }
    $kalimat_indo = join(" ", $kata_indo);

    return stripslashes($kalimat_indo);
}

require_once("suara.php");
echo madura_indonesia("$_GET[input]") . "<hr>";
echo mainkan(madura_indonesia("$_GET[input]"));
?>
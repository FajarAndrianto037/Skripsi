<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php

    //menonaktifkan pesan error yang ada di php
    error_reporting(E_ERROR | E_PARSE);

    //fungsi untuk memainkan hasil audio dengan kalimat
    function mainkan($kalimat)
    {
        //semacam import fungsi yang ada di fsa
        require_once("fsa.php");

        //cek file suara sekaligus dihapus jika file yang lama sudah ada
        if (file_exists('suara.mp3')) {
            //hapus file suara
            unlink('suara.mp3');
        }

        //membuang noise "\" yang biasanya berbeda tiap browser
        $kalimat = str_replace("\\", "", $kalimat);
        //menjadikan $kalimat menjadi karakter tertentu
        $input_kata = $kalimat;
        //memecah kalimat menjadi kata & ditampung di array
        $pecah = explode(' ', $input_kata);

        //memproses pecah kalimat dengan diberi tanda "-"
        $hasil_fsa = '';
        foreach ($pecah as $i => $h) {
            //apabila kata lebih dari 1
            if ($i > 0) {
                //hasil kata diberi tanda "-"
                $hasil_fsa .= " -";
            }
            //setiap kata akan dilanjutkan pada proses FSA dan disimpan pada $hasil_fsa
            $hasil_fsa .= proses_fsa($h);
        }
        //echo $hasil_fsa;

        //mengubah spasi pada $hasil_fsa menjadi "space"
        $hasil_fsa = str_replace(" ", "space", $hasil_fsa);
        //$hasil_fsa dipecah menjadi suku kata berdasarkan "-"
        $list_suku_kata = explode("-", $hasil_fsa);
		
        // print_r($list_suku_kata);

        $files = null;

        //mengeluarkan output suara sesuai array suku kata 
        foreach ($list_suku_kata as $suku) {
            $nama_file = "audio/".$suku.".mp3";
            //mengambil file suara yang sesuai dengan suku kata
            if (file_exists($nama_file)) {
                $files .= file_get_contents($nama_file);
            } else {
                //harusnya beep
                $files .= file_get_contents("audio/beep.mp3");
            }
        }
        //menggabungkan suara audio ke dalam file "suara.mp3"
        if (!empty($files)) {
            $suara = file_put_contents("suara.mp3", $files);
        }
        
        //mengecek file suara mp3 apakah tersedia atau tidak
        if (file_exists('suara.mp3')) {
            echo '<audio src="suara.mp3?random='.md5(date('YmdHis')).'" controls="true">';
        } else {
            echo 'Maaf, suara tidak tersedia';
        }
    }

    //menampilkan hasil suara
    if (isset($_GET['kalimat'])) {
        echo mainkan($_GET['kalimat']) . "";
    }
    ?>
</body>

</html>
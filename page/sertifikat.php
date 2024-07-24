<!DOCTYPE html>
<html>
<head>
    <title>BBM - Belajar Bahasa Madura</title>
</head>

<script type="text/javascript">
	window.onload = function() {
		window.print();
	}
</script>

<body style="height:1600px; background:url(../image/aaa.png) no-repeat;">
    <div align="center">
    	<div align="center" style="float:left; margin-top:170px; min-width:1046px; border-bottom:medium">
			<img src="../image/logo_sister.png" height="120px" width="120px">
			<h1>Laboratorium Sistem Terdistribusi <br> Universitas Trunojoyo Madura</h1>
        </div>
        <div align="center" style="float:left; min-width:1046px;">
            <table cellpadding="0" cellspacing="0"
            	style="text-align:center; font-weight:bold; font-size:14px; line-height:30px;">
                
                <tr><h1 align="center">SERTIFIKAT</h1></tr>
                <tr>
                    <td><h2>diberikan kepada : </h2></td>
                </tr>
                <tr>
                    <td><h1><?php echo $_POST['name_hidden']?></h1></td>
                </tr>
                <tr>
                    <td>
                    	<h2> telah mengikuti pelatihan membaca permulaan Bahasa Madura <br>
                        pada tanggal <?php echo gmdate("d M Y");?> di PusLitBang Konten Lokal Madura <br>
                        http://madura.web.id, dengan predikat :</h2>
                    </td>
                </tr>
                <tr>
                    <td><h1>"<?php echo $_POST['nilai_hidden']?>"</h1></td>
                </tr>
                <tr>
                    <td>
                    	<h2 align="left">
                        Materi : <br>
                        1. Pengenalan huruf Bahasa Madura dan cara pengucapannya <br>
                        2. Suku kata Bahasa Madura dan cara pengucapannya <br>
                        3. Kata Bahasa Madura dan cara pengucapannya <br>
                        4. Kalimat Bahasa Madura dan cara pengucapannya
                        </h2>
                    </td>
                </tr>
            </table>          
            <br>
			<table border="1" cellspacing="0" style="font-size:24px">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Materi</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr">
                        <td>1. </td>
                        <td>Kosakata Bahasa Madura</td>
                        <td align="center"><?php echo $_POST['gambar_hidden']?></td>
                    </tr>
                    <tr>
                        <td>2. </td>
                        <td>Terjemahan Bahasa Madura</td>
                        <td align="center"><?php echo $_POST['indonesia_hidden']?></td>
                    </tr>
                    <tr>
                        <td>3. </td>
                        <td>Penulisan Bahasa Madura</td>
                        <td align="center"><?php echo $_POST['madura_hidden']?></td>
                    </tr>
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td align="center">
						<h3 style="margin-bottom:0;">Bangkalan, <?php echo gmdate("d M Y");?> <br> Instruktur</h3>
						<img src="../image/ttd.png" width="180" height="130"</td>
                    </td>
                </tr>
                <tr>
                    <td align="center"><h3 style="margin-top:0;">Pyepit Rinekso Andriyanto</h3></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
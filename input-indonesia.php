<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Abhâsa Madhure</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
			<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="utama.php" class="navbar-brand">Belajar Bahasa Madura</a>
            </div>
            
			<!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav"> 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-gear"></i> Setting <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="admin/login.php"><i class="fa fa-fw fa-unlock"></i> Login</a>
                        </li>
                        <li>
                            <a href="kontak.php"><i class="fa fa-fw fa-envelope"></i> Kontak</a>
                        </li>
						<li>
                            <a href="tentang.php"><i class="fa fa-fw fa-info"></i> Tentang</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="utama.php"><i class="fa fa-fw fa-home"></i> Menu Utama</a>
                    </li>
                    <li>
                        <a href="huruf.php"><i class="fa fa-fw fa-book"></i> Pengenalan Huruf</a>
                    </li>
                    <li>
                        <a href="suku-kata.php"><i class="fa fa-fw fa-file-text"></i> Pengenalan Suku Kata</a>
                    </li>
                    <li>
                        <a href="kata.php"><i class="fa fa-fw fa-table"></i> Pengenalan Kata</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#penggal">
                        	<i class="fa fa-fw fa-arrows-v"></i> Pengenalan Kalimat<i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="penggal" class="collapse">
                            <li>
                                <a href="kalimat-dasar.php">Kalimat Dasar</a>
                            </li>
                            <li>
                                <a href="input-indonesia.php">Input Indonesia</a>
                            </li>
                            <li>
                                <a href="input-madura.php">Input Madura</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="kamus.php"><i class="fa fa-fw fa-search"></i> Kamus Terjemahan</a>
                    </li>
					<li>
                        <a href="kuis.php"><i class="fa fa-fw fa-edit"></i> Kuis</a>
                    </li>
                    <li>
                        <a href="petunjuk.php"><i class="fa fa-fw fa-info"></i> Petunjuk</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" style="margin-bottom:2px; margin-top:2px; padding-bottom:5px;">
                            Mengenal Kalimat Bahasa Madura
                        </h2>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="utama.php">Menu Utama</a>
                            </li>
                            <li class="active">
                                Kalimat Input Indonesia
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
                <script>
                    $(document).ready(function(){
                        
                        $('#input').keyup(function(){ //saat ngetik langsung terjemah
                            translate();
                        });
                        
                        $('#bahasa').change(function(){ //saat bahasa diubah langsung terjemahkan
                            translate();
                        });
                        
                        $('#tingkat').change(function(){ //saat tingkat diubah langsung terjemahkan
                            translate();
                        });
                    
                    });
                
                    function translate(){
                        var kal = document.getElementById('input').value;
                        var bahasa = document.getElementById('bahasa').value;
                        var tingkat = document.getElementById('tingkat').value;
                        
                        document.getElementById('terjemahan').innerHTML="<font color='red'><blink>Sedang Menerjemahkan...</blink></font>";
                        
                        if(bahasa!='1'){
                            $('#terjemahan').load('madura-indonesia.php','input='+kal);
                        }else{
                            $('#terjemahan').load('indonesia-madura.php','input='+kal+'&tingkat='+tingkat);
                        }
                    }
                
                </script>
                
                <script type="text/javascript">
                    function cek_bahasa(){
                        var pil = document.getElementById("bahasa").value
                        if(pil == 2){
                            document.getElementById("tingkat").disabled=true
                        }else{
                            document.getElementById("tingkat").disabled=false                            }
                        }
                </script>
				
                <div class="col-lg-6">
				<form action="" method="post" onSubmit="return false">
                	<div class="form-group">
						<h4>Masukkan Kalimat Bahasa Indonesia</h4>
						<textarea name="input" id="input" class="form-control" rows="7"><?php if(isset($_POST['input']))
						echo stripslashes($_POST['input']);?></textarea>
					</div>
                
					<script>
                        function karakter_e(){
                            teks = document.getElementById("input").value
                            document.getElementById("input").value=teks+"è"
                            document.getElementById("input").focus()
                            return false
                        }
                        
                        function karakter_a(){
                            teks = document.getElementById("input").value
                            document.getElementById("input").value=teks+"â"
                            document.getElementById("input").focus()
                            return false
                        }
                    </script>
                     
                    <div class="form-group">
                        <label>Tingkatan</label>
                        <select name="tingkat" id="tingkat" class="form-control">
                            <?php if($_POST['tingkat']==1 || $_POST['tingkat']==""){ ?>
                                <option value="1" selected="selected">Enje'-Iyah</option>
                                <option value="2">Engghi-Enten</option>
                                <option value="3">Engghi-Bhunten</option>
                            <?php }elseif($_POST['tingkat']==2){?>
                                <option value="1">Enje'-Iyeh</option>
                                <option value="2" selected="selected">Engghi-Enten</option>
                                <option value="3">Engghi-Bhunten</option>
                            <?php }else{ ?>
                                <option value="1">Enje'-Iyeh</option>
                                <option value="2">Engghi-Enten</option>
                                <option value="3" selected="selected">Engghi-Bhunten</option>
                            <?php } ?>
                        </select>
                    </div>
					
					<div class="form-group">
                        <label>Terjemahan</label>
                        <select name="bahasa" id="bahasa" onChange="cek_bahasa()" class="form-control" disabled>
                            <?php if($_POST['bahasa']==1 || $_POST['bahasa']==""){ ?>
                                <option value="1" selected="selected">Indonesia-Madura</option>
                                <option value="2">Madura-Indonesia</option>
                            <?php }else{?>
                                <option value="1">Indonesia-Madura</option>
                                <option value="2" selected="selected">Madura-Indonesia</option>
                            <?php } ?>
                        </select>
                    </div>
				</form>
				</div>
                <!-- /.row -->
                
                <div class="col-lg-6 text-left">
                    <div class="form-group">
                        <h4>Hasil Terjemahan</h4>
                        <div class="panel panel-default" style=" height:155px;">
                        	<div class="panel-body">
                            	<p id="terjemahan">.::Belum Ada Inputan::.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="col-lg-12" style="text-align:right; margin-top:30px; margin-bottom:30px;">
                    <a href="utama.php" class="btn btn-lg btn-primary" role="button">Menu</a>
                    <a href="kuis.php" class="btn btn-lg btn-primary" role="button">Kuis »</a>
            	</div>
			</div>     
        </div>
        <!-- /#page-wrapper -->
		
    </div>
    <!-- /#wrapper -->
    
    <div style="position:fixed; bottom:0;">
        <audio controls="controls">
            <source src="audio/Together.mp3" type="audio/mpeg" />
            <embed src="Together.mp3" />
        </audio> 
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

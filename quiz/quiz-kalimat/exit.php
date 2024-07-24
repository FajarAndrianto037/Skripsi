<?php
session_start();
session_destroy(); 
header("location: halaman-kalimat.php");
?>
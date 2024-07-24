<?php 

$server 	= "localhost";
$username 	= "root";
$password	= "";
$database	= "db_belajar";

$mysqli = mysqli_connect($server, $username, $password, $database) or die('Koneksi Database Gagal : '.$mysqli->connect_error)
?>
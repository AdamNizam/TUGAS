<?php
$host = "localhost";
$user = "root";
$pwd  = "";
$db   = "unaux_19128520_dbforum";

$con = mysql_connect($host,$user,$pwd) or die("Tidak bisa koneksi");
mysql_select_db($db,$con) or die("Tidak ada database");

?>
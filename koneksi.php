<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "pegawai";

$conn = mysql_connect ($host, $user, $pass);
if ($conn) {
	$buka = mysql_select_db ($dbnm);
	if (!$buka) {
		die ("Database tidak dapat dibuka");	
	}
} else {
	die ("Server MySQL tidak terhubung");	
}
?>
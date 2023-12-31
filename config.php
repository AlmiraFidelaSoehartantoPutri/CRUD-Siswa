<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pendaftaran_siswa';

$conn = mysqli_connect($host, $username, $password);

if($conn) {
$buka = mysqli_select_db($conn, $database);
}

else{
 echo "Database Tidak Terhubung" ;
}

?>
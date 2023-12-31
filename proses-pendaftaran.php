<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses form pendaftaran
    // Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // Query untuk insert data ke database
    $query = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal)
              VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal')";

    if ($conn->query($query) === TRUE) {
        header("Location: index.php");
    } else {
        echo '<p>Error: ' . $query . '<br>' . $conn->error . '</p>';
    }
}

$conn->close();
?>

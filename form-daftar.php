<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Siswa Baru</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Form Pendaftaran Siswa Baru</h1>

    <?php
    // Proses form pendaftaran
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            echo '<p>Data berhasil disimpan</p>';
        } else {
            echo '<p>Error: ' . $query . '<br>' . $conn->error . '</p>';
        }
    }
    ?>

    <!-- Form pendaftaran disini -->
    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" required></textarea>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="agama">Agama:</label>
        <input type="text" name="agama" required>

        <label for="sekolah_asal">Sekolah Asal:</label>
        <input type="text" name="sekolah_asal" required>

        <input type="submit" value="Daftar">
    </form>
</body>
</html>
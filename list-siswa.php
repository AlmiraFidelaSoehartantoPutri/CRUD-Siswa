<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Siswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>List Siswa yang Telah Mendaftar</h1>

    <?php
    // Query untuk mengambil data siswa
    $query = "SELECT * FROM calon_siswa";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Jenis Kelamin</th><th>Agama</th><th>Sekolah Asal</th><th>Aksi</th></tr>';

        // Tampilkan data siswa
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nama'] . '</td>';
            echo '<td>' . $row['alamat'] . '</td>';
            echo '<td>' . $row['jenis_kelamin'] . '</td>';
            echo '<td>' . $row['agama'] . '</td>';
            echo '<td>' . $row['sekolah_asal'] . '</td>';
            echo '<td><a href="proses-edit.php?id=' . $row['id'] . '">Edit</a> | <a href="hapus.php?id=' . $row['id'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Tidak ada data siswa.</p>';
    }

    $conn->close();
    ?>
</body>
</html>

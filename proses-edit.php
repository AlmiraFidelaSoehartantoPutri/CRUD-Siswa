<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk mengambil data siswa berdasarkan ID
        $query = "SELECT * FROM calon_siswa WHERE id=$id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Form edit disini
            echo '<h1>Edit Data Siswa</h1>';
            echo '<form action="proses-edit.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '<label for="nama">Nama:</label>';
            echo '<input type="text" name="nama" value="' . $row['nama'] . '" required>';
            // Lanjutkan dengan mengisikan form sesuai dengan kolom tabel
            echo '<input type="submit" value="Simpan Perubahan">';
            echo '</form>';
        } else {
            echo '<p>Data siswa tidak ditemukan.</p>';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses edit data siswa
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    // Isikan data yang lain sesuai dengan kolom tabel

    // Query untuk update data siswa
    $query = "UPDATE calon_siswa SET nama='$nama' WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        header("Location: list-siswa.php");
    } else {
        echo '<p>Error: ' . $query . '<br>' . $conn->error . '</p>';
    }
}

$conn->close();
?>

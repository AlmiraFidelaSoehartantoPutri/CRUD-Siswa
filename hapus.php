<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk hapus data berdasarkan ID
    $query = "DELETE FROM calon_siswa WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        header("Location: list-siswa.php");
    } else {
        echo '<p>Error: ' . $query . '<br>' . $conn->error . '</p>';
    }
}

$conn->close();
?>

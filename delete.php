<?php
    include 'koneksi.php';

    $id_siswa = $_GET['id_siswa'];
    $sqlDelete = "DELETE FROM buku WHERE id_siswa='$id_siswa'";
    mysqli_query($conn, $sqlDelete);

    header("location: index.php");
?>
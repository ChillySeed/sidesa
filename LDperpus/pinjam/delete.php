<?php
    require 'koneksi.php';

    $idpinjam = $_GET['id_peminjaman'];
    $result = mysqli_query($conn, "DELETE FROM peminjaman_buku WHERE id_peminjaman='$idpinjam'");

    header("Location: index.php");
?>
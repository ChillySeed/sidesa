<?php
    require 'koneksi.php';

    $idbuku = $_GET['id_buku'];
    $result = mysqli_query($conn, "DELETE FROM buku_perpus WHERE id_buku='$idbuku'");

    header("Location: index.php");
?>
<?php
    require 'koneksi.php';

    $idberita = $_GET['id_berita'];
    $result = mysqli_query($conn, "DELETE FROM berita WHERE id_berita='$idberita'");

    header("Location: index.php");
?>
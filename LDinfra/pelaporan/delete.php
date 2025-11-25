<?php
    require 'koneksi.php';

    $idsurat = $_GET['id_surat'];
    $result = mysqli_query($conn, "DELETE FROM pengaduan_infrastruktur WHERE id_surat='$idsurat'");

    header("Location: index.php");
?>
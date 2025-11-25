<?php
    require 'koneksi.php';

    $idsurat = $_GET['id_interaksi'];
    $result = mysqli_query($conn, "DELETE FROM pelaporan_pihak_wewenang WHERE id_interaksi='$idinteraksi'");

    header("Location: index.php");
?>
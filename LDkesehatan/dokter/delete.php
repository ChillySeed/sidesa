<?php
    require 'koneksi.php';

    $iddokter = $_GET['id_dokter'];
    $result = mysqli_query($conn, "DELETE FROM dokter WHERE id_dokter='$iddokter'");

    header("Location: index.php");
?>
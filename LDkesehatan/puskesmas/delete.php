<?php
    require 'koneksi.php';

    $idpuskes = $_GET['id_puskesmas'];
    $result = mysqli_query($conn, "DELETE FROM puskesmas WHERE id_puskesmas='$idpuskes'");

    header("Location: index.php");
?>
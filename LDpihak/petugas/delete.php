<?php
    require 'koneksi.php';

    $idsurat = $_GET['id_wewenang'];
    $result = mysqli_query($conn, "DELETE FROM pihak_wewenang WHERE id_wewenang='$idwewenang'");

    header("Location: index.php");
?>
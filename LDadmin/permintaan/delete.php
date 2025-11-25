<?php
    require 'koneksi.php';

    $id = $_GET['id_administrasi'];
    $result = mysqli_query($conn, "DELETE FROM administrasi_desa WHERE id_administrasi='$id'");

    header("Location: index.php");
?>
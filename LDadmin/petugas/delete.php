<?php
    require 'koneksi.php';

    $id = $_GET['id_sekretaris'];
    $result = mysqli_query($conn, "DELETE FROM sekretaris_desa WHERE id_sekretaris='$id'");

    header("Location: index.php");
?>
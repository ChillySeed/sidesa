<?php
    require 'koneksi.php';

    $idpers = $_GET['id_pers'];
    $result = mysqli_query($conn, "DELETE FROM pers WHERE id_pers='$idpers'");

    header("Location: index.php");
?>
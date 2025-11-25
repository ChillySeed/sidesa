<?php
    require 'koneksi.php';

    $idinfra = $_GET['id_infrastruktur'];
    $result = mysqli_query($conn, "DELETE FROM infrastruktur WHERE id_infrastruktur='$idinfra'");

    header("Location: index.php");
?>
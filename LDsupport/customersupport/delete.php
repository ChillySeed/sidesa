<?php
    require 'koneksi.php';

    $id = $_GET['id_cs'];
    $result = mysqli_query($conn, "DELETE FROM customer_support WHERE id_cs='$id'");

    header("Location: index.php");
?>
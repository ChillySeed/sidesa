<?php
    require 'koneksi.php';

    $id = $_GET['id_user_support'];
    $result = mysqli_query($conn, "DELETE FROM support_ticket WHERE id_user_support='$id'");

    header("Location: index.php");
?>
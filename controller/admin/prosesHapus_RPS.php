<?php
include '../../database/koneksi.php';

if (isset($_GET['idRPS'])) {
    $idRPS = $_GET['idRPS'];

    $sql = "DELETE FROM tbl_rps WHERE idRPS='$idRPS'";
    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vRPS.php');
    } else {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}

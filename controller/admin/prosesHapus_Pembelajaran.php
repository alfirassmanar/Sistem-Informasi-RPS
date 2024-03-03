<?php
include '../../database/koneksi.php';

if (isset($_GET['idPembelajaran'])) {
    $idPembelajaran = $_GET['idPembelajaran'];

    $sql = "DELETE FROM tbl_pembelajaran WHERE idPembelajaran='$idPembelajaran'";
    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vPembelajaran.php');
    } else {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}

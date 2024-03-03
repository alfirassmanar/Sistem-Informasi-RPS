<?php
include '../../database/koneksi.php';

if (isset($_GET['idMK'])) {
    $idMK = $_GET['idMK'];

    $sql = "DELETE FROM tbl_mk WHERE idMK='$idMK'";
    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vMataKuliah.php');
    } else {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}

<?php
include '../../database/koneksi.php';

if (isset($_GET['idFakultas'])) {
    $idFakultas = $_GET['idFakultas'];

    $sql = "DELETE FROM tbl_fakultas WHERE idFakultas='$idFakultas'";
    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vFakultas.php');
    } else {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}

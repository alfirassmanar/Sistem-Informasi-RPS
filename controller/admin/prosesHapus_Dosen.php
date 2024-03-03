<?php
include '../../database/koneksi.php';

if (isset($_GET['idDosen'])) {
    $idDosen = $_GET['idDosen'];

    $sql = "DELETE FROM tbl_dosen WHERE idDosen='$idDosen'";
    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vDosen.php');
    } else {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}

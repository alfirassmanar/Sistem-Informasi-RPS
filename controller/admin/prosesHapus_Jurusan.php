<?php
include '../../database/koneksi.php';

if (isset($_GET['idJurusan'])) {
    $idJurusan = $_GET['idJurusan'];

    $sql = "DELETE FROM tbl_jurusan WHERE idJurusan='$idJurusan'";
    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vJurusan.php');
    } else {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}

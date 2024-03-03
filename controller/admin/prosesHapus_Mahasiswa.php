<?php
include '../../database/koneksi.php';

if (isset($_GET['idMahasiswa'])) {
    $idMahasiswa = $_GET['idMahasiswa'];

    $sql = "DELETE FROM tbl_mahasiswa WHERE idMahasiswa='$idMahasiswa'";
    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vMahasiswa.php');
    } else {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}

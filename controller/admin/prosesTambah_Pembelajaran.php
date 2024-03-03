<?php
session_start();
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMahasiswa = $_POST['idMahasiswa'];
    $kodeMK = $_POST['kodeMK'];

    $sql = "INSERT INTO tbl_pembelajaran (idMahasiswa, kodeMK) 
            VALUES ('$idMahasiswa', '$kodeMK')";

    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vPembelajaran.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

<?php
session_start();
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaFakultas = $_POST['namaFakultas'];
    $status = $_POST['status'];

    // Generate random idFakultas
    $idFakultas = rand(100, 999);

    $sql = "INSERT INTO tbl_fakultas (idFakultas, namaFakultas, status) 
            VALUES ('$idFakultas', '$namaFakultas', '$status')";

    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vFakultas.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

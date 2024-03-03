<?php
include '../../database/koneksi.php';
$idMK    = $_POST['idMK'];

$checkQuery = "SELECT * FROM tbl_rps WHERE idMK = '$idMK' OR rps = '$rps'";
$checkResult = $conn->query($checkQuery);

$idMK    = $_POST['idMK'];

// File
$namaFile_pertama   = $_FILES['rps']['name'];
$tmpFile_pertama    = $_FILES['rps']['tmp_name'];
$ukuranFile_pertama = $_FILES['rps']['size'];

$folderUpload = '../../RPS/';
if (move_uploaded_file($tmpFile_pertama, $folderUpload . $namaFile_pertama)) {
    $sql = "INSERT INTO tbl_rps (idMK, rps) VALUES ('$idMK', '$namaFile_pertama')";

    if ($conn->query($sql) === TRUE) {
        header('Location: .././../admin/Home/vRPS.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Gagal mengunggah file.";
}

$conn->close();

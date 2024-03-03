<?php
session_start();
include '../../database/koneksi.php'; // Sesuaikan dengan lokasi file koneksi Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaDosen = $_POST['namaDosen'];
    $gelarDosen = $_POST['gelarDosen'];
    $jenisIdentitas = $_POST['jenisIdentitas'];
    $nomorIdentitas = $_POST['nomorIdentitas'];
    $noTelpDosen = $_POST['noTelpDosen'];
    $emailDosen = $_POST['emailDosen'];
    $passwordDosen = $_POST['passwordDosen'];
    $instansiDosen = $_POST['instansiDosen'];
    $programStudi = $_POST['programStudi'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tbl_dosen (namaDosen, gelarDosen, jenisIdentitas, nomorIdentitas, noTelpDosen, emailDosen, passwordDosen, instansiDosen, programStudi, status) 
            VALUES ('$namaDosen', '$gelarDosen', '$jenisIdentitas', '$nomorIdentitas', '$noTelpDosen', '$emailDosen', '$passwordDosen', '$instansiDosen', '$programStudi', '$status')";

    if (mysqli_query($conn, $sql)) {
        header('Location: .././../admin/Home/vDosen.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

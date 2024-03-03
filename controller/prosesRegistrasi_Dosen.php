<?php
include '../database/koneksi.php';

// Mendapatkan data yang dikirimkan melalui POST
$namaDosen          = $_POST['namaDosen'];
$gelarDosen         = $_POST['gelarDosen'];
$jenisIdentitas     = $_POST['jenisIdentitas'];
$nomorIdentitas     = $_POST['nomorIdentitas'];
$noTelpDosen        = $_POST['noTelpDosen'];
$emailDosen         = $_POST['emailDosen'];
$passwordDosen      = $_POST['passwordDosen'];
$instansiDosen      = $_POST['instansiDosen'];
$programStudi       = $_POST['programStudi'];

// Check apakah email atau nama dosen sudah ada di database
$checkQuery = "SELECT * FROM tbl_dosen WHERE namaDosen = '$namaDosen' OR emailDosen = '$emailDosen'";
$checkResult = $conn->query($checkQuery);

// Jika ada hasil dari query, berarti data sudah ada di database
if ($checkResult->num_rows > 0) {
    echo "Nama atau email dosen sudah digunakan. Mohon gunakan nama atau email yang lain.  <a href='../vLogin.php'>Kembali</a>";
} else {
    // Lanjutkan proses pendaftaran
    $sql = "INSERT INTO tbl_dosen (namaDosen, gelarDosen, jenisIdentitas, nomorIdentitas, noTelpDosen, emailDosen, passwordDosen, instansiDosen, programStudi) VALUES ('$namaDosen', '$gelarDosen', '$jenisIdentitas', '$nomorIdentitas', '$noTelpDosen', '$emailDosen', '$passwordDosen', '$instansiDosen', '$programStudi')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../vLogin.php');
        exit; // Penting untuk menghentikan eksekusi skrip setelah melakukan redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

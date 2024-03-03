<?php
include '../database/koneksi.php';

// Mendapatkan data yang dikirimkan melalui POST
$namaMahasiswa      = $_POST['namaMahasiswa'];
$emailMahasiswa     = $_POST['emailMahasiswa'];

// Check apakah email atau nama mahasiswa sudah ada di database
$checkQuery = "SELECT * FROM tbl_mahasiswa WHERE namaMahasiswa = '$namaMahasiswa' OR emailMahasiswa = '$emailMahasiswa'";
$checkResult = $conn->query($checkQuery);

// Jika ada hasil dari query, berarti data sudah ada di database
if ($checkResult->num_rows > 0) {
    echo "Nama atau email sudah digunakan. Mohon gunakan nama atau email yang lain. <a href='../vLogin.php'>Kembali</a>";
} else {
    // Lanjutkan proses pendaftaran
    // Mendapatkan data lain yang diperlukan dari POST
    $tahunMasuk         = $_POST['tahunMasuk'];
    $jenisIdentitas     = $_POST['jenisIdentitas'];
    $jurusanMahasiswa   = $_POST['jurusanMahasiswa'];
    $noTelpMahasiswa    = $_POST['noTelpMahasiswa'];
    $passwordMahasiswa  = $_POST['passwordMahasiswa'];

    // File
    $namaFile_pertama   = $_FILES['buktiAktif_pertama']['name'];
    $tmpFile_pertama    = $_FILES['buktiAktif_pertama']['tmp_name'];
    $ukuranFile_pertama = $_FILES['buktiAktif_pertama']['size'];
    $namaFile_kedua     = $_FILES['buktiAktif_kedua']['name'];
    $tmpFile_kedua      = $_FILES['buktiAktif_kedua']['tmp_name'];
    $ukuranFile_kedua   = $_FILES['buktiAktif_kedua']['size'];

    // Folder penyimpanan
    $folderUpload = '../uploads/';

    // Pindahkan file yang diunggah ke folder penyimpanan
    if (move_uploaded_file($tmpFile_pertama, $folderUpload . $namaFile_pertama) && move_uploaded_file($tmpFile_kedua, $folderUpload . $namaFile_kedua)) {
        // Jika proses upload berhasil, lakukan penyimpanan informasi ke database
        $sql = "INSERT INTO tbl_mahasiswa (namaMahasiswa, tahunMasuk, jenisIdentitas, jurusanMahasiswa, noTelpMahasiswa, emailMahasiswa, passwordMahasiswa, buktiAktif_pertama, buktiAktif_kedua) VALUES ('$namaMahasiswa', '$tahunMasuk', '$jenisIdentitas', '$jurusanMahasiswa', '$noTelpMahasiswa', '$emailMahasiswa', '$passwordMahasiswa', '$namaFile_pertama', '$namaFile_kedua')";

        if ($conn->query($sql) === TRUE) {
            // Registrasi berhasil
            header('Location: ../vLogin.php');
            exit; // Penting untuk menghentikan eksekusi skrip setelah melakukan redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

$conn->close();

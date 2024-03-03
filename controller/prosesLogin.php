<?php
// Mulai session
session_start();

// Sambungkan ke database
include '../database/koneksi.php';

// Mendapatkan data yang dikirimkan melalui POST
$emailLogin = $_POST['emailLogin'];
$passwordLogin = $_POST['passwordLogin'];

// Query untuk mencari data pengguna berdasarkan email dan password
$queryAdmin = "SELECT * FROM tbl_admin WHERE emailAdmin = '$emailLogin' AND passwordAdmin = '$passwordLogin'";
$queryDosen = "SELECT * FROM tbl_dosen WHERE emailDosen = '$emailLogin' AND passwordDosen = '$passwordLogin'";
$queryMahasiswa = "SELECT * FROM tbl_mahasiswa WHERE emailMahasiswa = '$emailLogin' AND passwordMahasiswa = '$passwordLogin'";

$resultAdmin = $conn->query($queryAdmin);
$resultDosen = $conn->query($queryDosen);
$resultMahasiswa = $conn->query($queryMahasiswa);

// Periksa apakah ada data yang cocok di tabel admin
if ($resultAdmin !== false && $resultAdmin->num_rows > 0) {
    $rowAdmin = $resultAdmin->fetch_assoc();
    // Periksa apakah kolom status tidak null dan bukan nol
    if ($rowAdmin['status'] !== null && $rowAdmin['status'] != 0) {
        // Jika ada, set session dan redirect ke halaman admin
        $_SESSION['loggedIn'] = true;
        $_SESSION['email'] = $emailLogin; // Set email sebagai session
        $_SESSION['status'] = 1; // Status admin
        header('Location: ../index.php');
        exit;
    } else {
        echo "Akun anda belum diaktifkan oleh pikah Universitas! <a href='../vLogin.php'>Kembali</a>";
    }
}

// Periksa apakah ada data yang cocok di tabel dosen
if ($resultDosen !== false && $resultDosen->num_rows > 0) {
    $rowDosen = $resultDosen->fetch_assoc();
    // Periksa apakah kolom status tidak null dan bukan nol
    if ($rowDosen['status'] !== null && $rowDosen['status'] != 0) {
        // Jika ada, set session dan redirect ke halaman dosen
        $_SESSION['loggedIn'] = true;
        $_SESSION['email'] = $emailLogin; // Set email sebagai session
        $_SESSION['status'] = 2; // Status dosen
        header('Location: ../index.php');
        exit;
    } else {
        echo "Akun anda belum diaktifkan oleh pikah Universitas! <a href='../vLogin.php'>Kembali</a>";
    }
}

// Periksa apakah ada data yang cocok di tabel mahasiswa
if ($resultMahasiswa !== false && $resultMahasiswa->num_rows > 0) {
    $rowMahasiswa = $resultMahasiswa->fetch_assoc();
    // Periksa apakah kolom status tidak null dan bukan nol
    if ($rowMahasiswa['status'] !== null && $rowMahasiswa['status'] != 0) {
        // Jika ada, set session dan redirect ke halaman mahasiswa
        $_SESSION['loggedIn'] = true;
        $_SESSION['email'] = $emailLogin; // Set email sebagai session
        $_SESSION['status'] = 3; // Status mahasiswa
        $_SESSION['jurusanMahasiswa'] = $rowMahasiswa['jurusanMahasiswa']; // Set nilai jurusanMahasiswa dari hasil query
        $_SESSION['jenisIdentitas'] = $rowMahasiswa['jenisIdentitas']; // Set nilai jenisIdentitas dari hasil query
        $_SESSION['idMahasiswa'] = $rowMahasiswa['idMahasiswa']; // Set nilai jenisIdentitas dari hasil query
        header('Location: ../index.php');
        exit;
    } else {
        echo "Akun anda belum diaktifkan oleh pikah Universitas! <a href='../vLogin.php'>Kembali</a>";
    }
}
// Jika tidak ada data yang cocok di semua tabel, berarti login gagal
if (($resultAdmin === false || $resultAdmin->num_rows == 0) &&
    ($resultDosen === false || $resultDosen->num_rows == 0) &&
    ($resultMahasiswa === false || $resultMahasiswa->num_rows == 0)
) {
    echo "Login gagal. Data salah atau anda belum terdaftar di sistem. <a href='../vLogin.php'>Kembali</a>";
}

// Tutup koneksi ke database
$conn->close();

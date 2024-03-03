<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include file koneksi database
    include '../database/koneksi.php';

    // Check koneksi
    if ($conn) {
        // Mendapatkan data dari form
        $idMahasiswa = $_POST['idMahasiswa'];
        $kodeMK = $_POST['kodeMK'];

        // Query SQL untuk memeriksa apakah sudah ada data dengan kodeMK dan idMahasiswa yang sama
        $check_query = "SELECT * FROM tbl_pembelajaran WHERE idMahasiswa = '$idMahasiswa' AND kodeMK = '$kodeMK'";
        $check_result = mysqli_query($conn, $check_query);

        // Jika tidak ada data yang sama, tambahkan ke tbl_pembelajaran
        if (mysqli_num_rows($check_result) == 0) {
            // Query SQL untuk menyimpan data ke tbl_pembelajaran
            $insert_query = "INSERT INTO tbl_pembelajaran (idMahasiswa, kodeMK) VALUES ('$idMahasiswa', '$kodeMK')";

            // Eksekusi query dan periksa apakah data berhasil ditambahkan
            if (mysqli_query($conn, $insert_query)) {
                header('Location: ../vDaftar_RPS.php');
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Mata kuliah sudah ditambahkan sebelumnya, <a href=' ../vDaftar_RPS.php'>Kembali</a>";
        }

        // Tutup koneksi database
        mysqli_close($conn);
    } else {
        echo "Koneksi ke database gagal.";
    }
}

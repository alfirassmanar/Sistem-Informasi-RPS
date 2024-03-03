<?php
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['idMahasiswa'])) {
    $idMahasiswa = $_GET['idMahasiswa'];

    if (!empty($_POST['namaMahasiswa']) && !empty($_POST['tahunMasuk']) && !empty($_POST['noTelpMahasiswa']) && !empty($_POST['emailMahasiswa']) && !empty($_POST['passwordMahasiswa']) && !empty($_POST['buktiAktif_pertama']) && !empty($_POST['buktiAktif_kedua']) && !empty($_POST['jurusanMahasiswa']) && !empty($_POST['jenisIdentitas']) && !empty($_POST['status'])) {

        $namaMahasiswa = $_POST['namaMahasiswa'];
        $tahunMasuk = $_POST['tahunMasuk'];
        $noTelpMahasiswa = $_POST['noTelpMahasiswa'];
        $emailMahasiswa = $_POST['emailMahasiswa'];
        $passwordMahasiswa = $_POST['passwordMahasiswa'];
        $buktiAktif_pertama = $_POST['buktiAktif_pertama'];
        $buktiAktif_kedua = $_POST['buktiAktif_kedua'];
        $jurusanMahasiswa = $_POST['jurusanMahasiswa'];
        $jenisIdentitas = $_POST['jenisIdentitas'];
        $status = $_POST['status'];

        $sql = "UPDATE tbl_mahasiswa SET namaMahasiswa=?, tahunMasuk=?, noTelpMahasiswa=?, emailMahasiswa=?, passwordMahasiswa=?, buktiAktif_pertama=?, buktiAktif_kedua=?, jurusanMahasiswa=?, jenisIdentitas=?, status=? WHERE idMahasiswa=?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssssis", $namaMahasiswa, $tahunMasuk, $noTelpMahasiswa, $emailMahasiswa, $passwordMahasiswa, $buktiAktif_pertama, $buktiAktif_kedua, $jurusanMahasiswa, $jenisIdentitas, $status, $idMahasiswa);
            if (mysqli_stmt_execute($stmt)) {
                // Eksekusi berhasil, arahkan pengguna ke halaman lain
                header('Location: ../../Admin/Home/vMahasiswa.php');
                exit;
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Semua field harus diisi!";
    }
} else {
    echo "ID Mahasiswa tidak valid.";
}

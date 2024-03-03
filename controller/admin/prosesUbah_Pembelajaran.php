<?php
include '../../database/koneksi.php';

if (isset($_GET['idPembelajaran'])) {
    $idPembelajaran = $_GET['idPembelajaran'];

    if (!empty($_POST['idMahasiswa']) && !empty($_POST['kodeMK'])) {
        $idMahasiswa = $_POST['idMahasiswa'];
        $kodeMK = $_POST['kodeMK'];

        $sql = "UPDATE tbl_pembelajaran SET idMahasiswa='$idMahasiswa', kodeMK='$kodeMK' WHERE idPembelajaran='$idPembelajaran'";
        if (mysqli_query($conn, $sql)) {
            header('Location: ../../Admin/Home/vPembelajaran.php');
        } else {
            die("Error: " . $sql . "<br>" . mysqli_error($conn));
        }
    } else {
        echo "Semua field harus diisi!";
    }
}

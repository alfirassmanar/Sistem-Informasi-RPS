<?php
include '../../database/koneksi.php';

if (isset($_GET['idDosen'])) {
    $idDosen = $_GET['idDosen'];

    if (!empty($_POST['namaDosen']) && !empty($_POST['gelarDosen']) && !empty($_POST['jenisIdentitas']) && !empty($_POST['nomorIdentitas']) && !empty($_POST['noTelpDosen']) && !empty($_POST['emailDosen']) && !empty($_POST['passwordDosen']) && !empty($_POST['instansiDosen']) && !empty($_POST['programStudi']) && !empty($_POST['status'])) {
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

        $sql = "UPDATE tbl_dosen SET namaDosen='$namaDosen', gelarDosen='$gelarDosen', jenisIdentitas='$jenisIdentitas', nomorIdentitas='$nomorIdentitas', noTelpDosen='$noTelpDosen', emailDosen='$emailDosen', passwordDosen='$passwordDosen', instansiDosen='$instansiDosen', programStudi='$programStudi', status='$status' WHERE idDosen='$idDosen'";
        if (mysqli_query($conn, $sql)) {
            header('Location: ../../Admin/Home/vDosen.php');
        } else {
            die("Error: " . $sql . "<br>" . mysqli_error($conn));
        }
    } else {
        echo "Semua field harus diisi!";
    }
}

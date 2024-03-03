<?php
include '../../database/koneksi.php';

if (isset($_GET['idMK'])) {
    $idMK = $_GET['idMK'];

    if (!empty($_POST['idFakultas']) && !empty($_POST['idJurusan']) && !empty($_POST['kodeMK']) && !empty($_POST['namaMK']) && !empty($_POST['rps'])) {
        $idFakultas = $_POST['idFakultas'];
        $idJurusan = $_POST['idJurusan'];
        $kodeMK = $_POST['kodeMK'];
        $namaMK = $_POST['namaMK'];
        $rps = $_POST['rps'];

        $sql = "UPDATE tbl_mk SET idFakultas='$idFakultas', idJurusan='$idJurusan', kodeMK='$kodeMK', namaMK='$namaMK', rps='$rps' WHERE idMK='$idMK'";
        if (mysqli_query($conn, $sql)) {
            header('Location: ../../Admin/Home/vMataKuliah.php');
        } else {
            die("Error: " . $sql . "<br>" . mysqli_error($conn));
        }
    } else {
        echo "Semua field harus diisi!";
    }
}

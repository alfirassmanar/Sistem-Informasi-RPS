<?php
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['idRPS'])) {
    $idRPS = $_GET['idRPS'];

    if (!empty($_POST['idMK']) && !empty($_POST['rps'])) {

        $idMK = $_POST['idMK'];
        $rps = $_POST['rps'];

        $sql = "UPDATE tbl_rps SET idMK=?, rps=? WHERE idRPS=?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isi", $idMK, $rps, $idRPS);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: ../../Admin/Home/vRPS.php');
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
    echo "ID RPS tidak valid.";
}

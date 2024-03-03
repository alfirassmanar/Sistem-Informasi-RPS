<?php
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['idFakultas'])) {
    $idFakultas = $_GET['idFakultas'];

    if (!empty($_POST['namaFakultas']) && !empty($_POST['status'])) {
        $namaFakultas = $_POST['namaFakultas'];
        $status = $_POST['status'];

        $sql = "UPDATE tbl_Fakultas SET namaFakultas=?, status=? WHERE idFakultas=?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $namaFakultas, $status, $idFakultas);

            if (mysqli_stmt_execute($stmt)) {
                header('Location: ../../Admin/Home/vFakultas.php');
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
    echo "ID Fakultas tidak valid.";
}

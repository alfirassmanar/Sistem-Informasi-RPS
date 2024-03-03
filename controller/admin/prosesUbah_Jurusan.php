<?php
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['idJurusan'])) {
    $idJurusan = $_GET['idJurusan'];

    if (!empty($_POST['programStudi']) && !empty($_POST['status'])) {
        $programStudi = $_POST['programStudi'];
        $status = $_POST['status'];

        $sql = "UPDATE tbl_jurusan SET programStudi=?, status=? WHERE idJurusan=?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $programStudi, $status, $idJurusan);

            if (mysqli_stmt_execute($stmt)) {
                header('Location: ../../Admin/Home/vJurusan.php');
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
    echo "ID Jurusan tidak valid.";
}

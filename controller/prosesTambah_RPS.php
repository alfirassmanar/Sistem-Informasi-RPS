<?php
include '../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeMK = $_POST['kodeMK'];
    $idFakultas = $_POST['idFakultas'];
    $idJurusan = $_POST['idJurusan'];
    $namaMK = $_POST['namaMK'];

    // Pengecekan duplikat
    $sql_check_duplicate = "SELECT COUNT(*) AS total FROM tbl_mk WHERE namaMK = '$namaMK'";
    $result_check_duplicate = mysqli_query($conn, $sql_check_duplicate);
    $row_check_duplicate = mysqli_fetch_assoc($result_check_duplicate);
    $total_duplicate = $row_check_duplicate['total'];

    if ($total_duplicate > 0) {
        echo "Duplikat: Nama MK yang sama sudah ada dalam database, <a href='../Master/vTambahRPS.php'>Kembali</a>";
    } else {
        $file_name = $_FILES['rps']['name'];
        $file_temp = $_FILES['rps']['tmp_name'];
        $file_size = $_FILES['rps']['size'];
        $file_error = $_FILES['rps']['error'];

        $file_destination = '../RPS/' . $file_name;

        if (move_uploaded_file($file_temp, $file_destination)) {
            // Insert ke tbl_mk
            $sql_mk = "INSERT INTO tbl_mk (kodeMK, idFakultas, idJurusan, namaMK, rps) 
                    VALUES ('$kodeMK', '$idFakultas', '$idJurusan', '$namaMK', '$file_name')";

            if (mysqli_query($conn, $sql_mk)) {
                // Ambil idMK yang baru saja dimasukkan
                $idMK = mysqli_insert_id($conn);

                // Insert ke tbl_rps
                $sql_rps = "INSERT INTO tbl_rps (idMK, rps) VALUES ('$idMK', '$file_name')";
                if (mysqli_query($conn, $sql_rps)) {
                    header('Location: ../vDetail_RPS.php?idJurusan=' . $idJurusan);
                } else {
                    echo "Error: " . $sql_rps . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error: " . $sql_mk . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    }
}

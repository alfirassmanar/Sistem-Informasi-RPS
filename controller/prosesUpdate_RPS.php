<?php
include '../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMK = $_POST['idMK'];
    $kodeMK = $_POST['kodeMK'];
    $idFakultas = $_POST['idFakultas'];
    $idJurusan = $_POST['idJurusan'];
    $namaMK = $_POST['namaMK'];
    $rps = $_FILES['rps']['name']; // Mendapatkan nama file RPS baru

    // Update data ke dalam tabel tbl_mk
    $sql = "UPDATE tbl_mk SET kodeMK = '$kodeMK', idFakultas = '$idFakultas', idJurusan = '$idJurusan', namaMK = '$namaMK'";

    // Jika terdapat file RPS yang diunggah
    if ($rps) {
        $file_temp = $_FILES['rps']['tmp_name'];
        $file_destination = '../RPS/' . $rps;

        // Pindahkan file RPS baru ke direktori yang dituju
        if (move_uploaded_file($file_temp, $file_destination)) {
            // Tambahkan nama file RPS baru ke dalam query update
            $sql .= ", rps = '$rps'";
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
            exit(); // Hentikan eksekusi script jika terjadi kesalahan
        }
    }

    // Tambahkan kondisi WHERE untuk mengupdate data berdasarkan idMK
    $sql .= " WHERE idMK = $idMK";

    // Eksekusi query update
    if (mysqli_query($conn, $sql)) {
        header('Location: ../vDetail_RPS.php?idJurusan=' . $idJurusan);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

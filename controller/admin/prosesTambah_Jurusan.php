<?php
session_start();
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idFakultas_input = $_POST['idFakultas'];
    $programStudi = $_POST['programStudi'];
    $jenjang = $_POST['jenjang'];
    $status = $_POST['status'];

    $idFakultas = '';

    if (is_numeric($idFakultas_input)) {
        // Jika input sudah berupa angka, gunakan nilai tersebut
        $idFakultas = $idFakultas_input;
    } else {
        // Jika input bukan angka, generate idFakultas acak dengan 4 digit
        for ($i = 0; $i < 4; $i++) {
            $idFakultas .= rand(0, 9);
        }
    }

    // Penambahan data langsung ke tbl_jurusan
    $sql_jurusan = "INSERT INTO tbl_jurusan (idFakultas, programStudi, jenjang, status) 
                    VALUES ('$idFakultas', '$programStudi', '$jenjang', '$status')";

    if (mysqli_query($conn, $sql_jurusan)) {
        header('Location: .././../admin/Home/vJurusan.php');
        exit;
    } else {
        echo "Error: " . $sql_jurusan . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
}

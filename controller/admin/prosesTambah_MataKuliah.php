<?php
session_start();
include '../../database/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idFakultas = $_POST['idFakultas'];
    $idJurusan = $_POST['idJurusan'];
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];

    // Mendapatkan informasi file RPS
    $file_name = $_FILES['rps']['name'];
    $file_size = $_FILES['rps']['size'];
    $file_tmp = $_FILES['rps']['tmp_name'];
    $file_type = $_FILES['rps']['type'];

    // Mendapatkan ekstensi file
    $file_ext = strtolower(end(explode('.', $file_name)));

    // Ekstensi file yang diizinkan
    $extensions = array("pdf");

    // Cek ekstensi file
    if (in_array($file_ext, $extensions) === false) {
        echo "Ekstensi file tidak diperbolehkan, harap pilih file PDF.";
    } elseif ($file_size > 2097152) { // Batas ukuran file (2MB)
        echo "File terlalu besar, maksimal 2MB.";
    } else {
        // Simpan file RPS ke folder RPS
        $upload_path = "../../RPS/";
        $new_file_name = $kodeMK . "_RPS." . $file_ext;
        $upload_file = $upload_path . $new_file_name;
        move_uploaded_file($file_tmp, $upload_file);

        // Simpan informasi RPS ke database
        $sql = "INSERT INTO tbl_mk (idFakultas, idJurusan, kodeMK, namaMK, rps) VALUES ('$idFakultas', '$idJurusan', '$kodeMK', '$namaMK', '$new_file_name')";
        if (mysqli_query($conn, $sql)) {
            header('Location: .././../admin/Home/vMataKuliah.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

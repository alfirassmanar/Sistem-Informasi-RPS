<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Mata Kuliah</title>

    <?php
    include '../database/koneksi.php';
    // Periksa apakah idJurusan telah diterima melalui parameter GET
    if (isset($_GET['idJurusan'])) {
        $idJurusan = $_GET['idJurusan'];
        $sql_programStudi = "SELECT programStudi FROM tbl_jurusan WHERE idJurusan = $idJurusan";
        $result_programStudi = mysqli_query($conn, $sql_programStudi);

        if ($result_programStudi) {
            $row_programStudi = mysqli_fetch_assoc($result_programStudi);
            $programStudi = $row_programStudi['programStudi'];
        } else {
            $programStudi = "Kesalahan dalam mendapatkan data programStudi";
        }
    } else {
        $programStudi = "ID Jurusan tidak ditemukan";
    }

    // Periksa apakah idJurusan telah diterima melalui parameter GET
    if (isset($_GET['idJurusan'])) {
        $idJurusan = $_GET['idJurusan'];
        $sql_data = "SELECT tbl_jurusan.programStudi, tbl_fakultas.namaFakultas 
                 FROM tbl_jurusan 
                 INNER JOIN tbl_fakultas ON tbl_jurusan.idFakultas = tbl_fakultas.idFakultas
                 WHERE tbl_jurusan.idJurusan = $idJurusan";

        $result_data = mysqli_query($conn, $sql_data);

        if ($result_data) {
            $row_data = mysqli_fetch_assoc($result_data);
            $programStudi = $row_data['programStudi'];
            $namaFakultas = $row_data['namaFakultas'];
        } else {
            $programStudi = "Kesalahan dalam mendapatkan data programStudi";
            $namaFakultas = "Kesalahan dalam mendapatkan data namaFakultas";
        }
    } else {
        $programStudi = "ID Jurusan tidak ditemukan";
        $namaFakultas = "ID Jurusan tidak ditemukan";
    }

    // Mengambil idMK dari parameter URL
    $idMK = isset($_GET['idMK']) ? $_GET['idMK'] : '';

    // Kueri SQL untuk mendapatkan semua data dari tbl_mk berdasarkan idMK
    $sql = "SELECT mk.*, fakultas.namaFakultas
        FROM tbl_mk AS mk
        LEFT JOIN tbl_fakultas AS fakultas ON mk.idFakultas = fakultas.idFakultas
        WHERE mk.idMK = $idMK";
    $result = mysqli_query($conn, $sql);

    // Memeriksa apakah kueri berhasil dieksekusi dan mengambil data jika ada
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $kodeMK = $row['kodeMK'];
        $namaMK = $row['namaMK'];
        $idFakultas = $row['idFakultas'];
        $idJurusan = $row['idJurusan'];
        $rps = $row['rps'];
        $namaFakultas = $row['namaFakultas'];
    } else {
        // Menampilkan pesan jika data tidak ditemukan
        $kodeMK = '';
        $namaMK = '';
        $idFakultas = '';
        $idJurusan = '';
        $rps = '';
        $namaFakultas = '';
    }
    ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            appearance: none;
            /* Hapus gaya default browser */
            background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            /* Tambahkan panah dropdown kustom */
            background-repeat: no-repeat;
            background-position-x: 97%;
            background-position-y: 50%;
            background-size: 24px;
            cursor: pointer;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Update Mata Kuliah</h2>
    <form action="../controller/prosesUpdate_RPS.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="idMK" value="<?php echo $idMK; ?>" required hidden><br>
        <label for="nama">Kode MK :</label><br>
        <input type="text" name="kodeMK" value="<?php echo $kodeMK; ?>" required readonly><br>


        <label for="fakultas">Fakultas:</label><br>
        <span style="color: #888; font-size: 12px;">Nb : Nama Fakultas harus valid dan sesuai dengan jobdesk Anda.</span><br>
        <select name="idFakultas" id="fakultas" required>
            <?php if ($idFakultas == True) : ?>
                <option value=""><?php echo $namaFakultas; ?></option>
            <?php endif; ?>
            <?php
            $sql = "SELECT idFakultas, namaFakultas FROM tbl_fakultas";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['idFakultas']}'>{$row['namaFakultas']}</option>";
                }
            } else {
                echo "<option value=''>Data Fakultas tidak tersedia</option>";
            }
            ?>
        </select>


        <label for="jurusan">Jurusan:</label><br>
        <span style="color: #888; font-size: 12px;">Nb : Nama Jurusan harus valid dan sesuai dengan jobdesk Anda.</span><br>
        <select name="idJurusan" id="jurusan" required>
            <?php if ($idJurusan == 1) : ?>
                <option value=""><?php echo $namaJurusan; ?></option>
            <?php endif; ?>
            <?php
            $sql = "SELECT idJurusan, programStudi FROM tbl_jurusan";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['idJurusan']}'>{$row['programStudi']}</option>";
                }
            } else {
                echo "<option value=''>Data Jurusan tidak tersedia</option>";
            }
            mysqli_close($conn);
            ?>
        </select>


        <label for="nama">Nama Mata Kuliah:</label><br>
        <input type="text" name="namaMK" value="<?= $namaMK ?>" required><br>

        <!-- Input hidden untuk menyimpan nilai RPS yang ada -->
        <input type="hidden" name="rps" value="<?= $rps ?>" />

        <!-- Input untuk memperbarui data RPS -->
        <label for="file">Upload RPS (PDF):</label><br>
        <input type="file" name="rps" accept=".pdf"><br>
        <iframe src="../RPS/<?= $rps ?>" width="100%" height="600px"></iframe>

        <input type="submit" value="Update RPS">
        <hr>
        <a href="../vDetail_RPS.php?idJurusan=<?= $idJurusan; ?>">
            <span>Kembali</span>
        </a>
    </form>
</body>

</html>
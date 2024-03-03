<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    .data-container {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .mahasiswa-info {
        margin-bottom: 20px;
    }

    .mahasiswa-info p {
        margin: 10px 0;
    }

    .mahasiswa-info p span {
        font-weight: bold;
    }

    .mk-info {
        background-color: #fff;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .mk-info p {
        margin: 5px 0;
    }

    .mk-info p span {
        font-weight: bold;
        color: #333;
    }
</style>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <div class="data-container">
            <?php
            session_start();

            if (isset($_SESSION['idMahasiswa'])) {
                $idMahasiswa = $_SESSION['idMahasiswa'];

                include '../database/koneksi.php';

                if ($conn) {
                    // Query untuk mengambil data mahasiswa
                    $sql = "SELECT * FROM tbl_mahasiswa WHERE idMahasiswa = $idMahasiswa";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
            ?>
                        <form action="../controller/prosesTambah_MK.php" method="post">
                            <div class="mahasiswa-info">
                                <p><input type="text" name="idMahasiswa" value="<?php echo $row['idMahasiswa']; ?>"></p>

                                <p><span>ID Mahasiswa:</span> <?php echo $row['idMahasiswa']; ?></p>
                                <p><span>Nama Mahasiswa:</span> <?php echo $row['namaMahasiswa']; ?></p>
                                <p><span>Tahun Masuk:</span> <?php echo $row['tahunMasuk']; ?></p>
                                <p><span>Email:</span> <?php echo $row['emailMahasiswa']; ?></p>
                                <p><span>No. Telepon:</span> <?php echo $row['noTelpMahasiswa']; ?></p>
                                <p><span>Jurusan:</span> <?php echo $row['jurusanMahasiswa']; ?></p>
                                <p><span>Jenjang:</span> <?php echo $row['jenisIdentitas']; ?></p>
                                <p><span>Status:</span> <?php echo $row['status']; ?></p>

                                <!-- Tampilkan idMK yang disimpan dalam session -->
                                <div class="mk-info">
                                    <?php
                                    if (isset($_SESSION['idMK'])) {
                                        $idMK = $_SESSION['idMK'];

                                        // Query untuk mengambil data tbl_mk dengan idMK yang sesuai
                                        $sql_mk = "SELECT * FROM tbl_mk WHERE idMK = $idMK";
                                        $result_mk = mysqli_query($conn, $sql_mk);

                                        if ($result_mk && mysqli_num_rows($result_mk) > 0) {
                                            while ($row_mk = mysqli_fetch_assoc($result_mk)) {
                                    ?>
                                                <h2>Data Mata Kuliah</h2>
                                                <p><span>Kode Mata Kuliah:</span> <?php echo $row_mk['kodeMK']; ?></p>
                                                <p><input type="text" name="kodeMK" value="<?php echo $row_mk['kodeMK']; ?>"></p>

                                    <?php
                                            }
                                        } else {
                                            echo '<p>Data mata kuliah tidak ditemukan.</p>';
                                        }
                                    } else {
                                        echo "<p>ID MK belum dipilih.</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <input type="submit" value="Tambahkan">
                        </form>
            <?php
                    } else {
                        echo '<p>Data mahasiswa tidak ditemukan.</p>';
                    }
                    mysqli_close($conn);
                } else {
                    echo '<p>Koneksi ke database gagal.</p>';
                }
            } else {
                echo '<p>ID Mahasiswa tidak tersedia.</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        if (isset($_SESSION['idMahasiswa'])) {
            $idMahasiswa = $_SESSION['idMahasiswa'];
            include './database/koneksi.php'; // Ubah sesuai dengan lokasi file koneksi Anda
            $sql = "SELECT m.*, p.kodeMK, mk.namaMK
                    FROM tbl_pembelajaran p
                    JOIN tbl_mahasiswa m ON p.idMahasiswa = m.idMahasiswa
                    JOIN tbl_mk mk ON p.kodeMK = mk.kodeMK
                    WHERE p.idMahasiswa = '$idMahasiswa'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
        ?>
                <h2>Data Mata Kuliah Mahasiswa, <a href="index.php" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 12pt;">Kembali</a></h2>
                <table>
                    <tr>
                        <th>ID Mahasiswa</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jurusan</th>
                        <th>Jenjang</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['idMahasiswa']; ?></td>
                            <td><?php echo $row['namaMahasiswa']; ?></td>
                            <td><?php echo $row['jurusanMahasiswa']; ?></td>
                            <td><?php echo $row['jenisIdentitas']; ?></td>
                            <td><?php echo $row['kodeMK']; ?></td>
                            <td><?php echo $row['namaMK']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
        <?php
            } else {
                echo "<p>Data mahasiswa dengan ID $idMahasiswa tidak ditemukan.</p>";
            }

            mysqli_close($conn);
        } else {
            echo "<p>Pengguna belum login.</p>";
        }
        ?>
    </div>
</body>

</html>
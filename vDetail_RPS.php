<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Informasi RPS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- <link href="img/favicon.png" rel="icon"> -->
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
</head>

<?php
include './database/koneksi.php';

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
    $sql_data = "SELECT tbl_jurusan.programStudi, tbl_jurusan.jenjang, tbl_fakultas.namaFakultas 
                 FROM tbl_jurusan 
                 INNER JOIN tbl_fakultas ON tbl_jurusan.idFakultas = tbl_fakultas.idFakultas
                 WHERE tbl_jurusan.idJurusan = $idJurusan";

    $result_data = mysqli_query($conn, $sql_data);

    if ($result_data) {
        $row_data = mysqli_fetch_assoc($result_data);
        $programStudi = $row_data['programStudi'];
        $jenjang = $row_data['jenjang']; // Tambahkan variabel jenjang
        $namaFakultas = $row_data['namaFakultas'];
    } else {
        $programStudi = "Kesalahan dalam mendapatkan data programStudi";
        $jenjang = "Kesalahan dalam mendapatkan data jenjang"; // Inisialisasi variabel jenjang
        $namaFakultas = "Kesalahan dalam mendapatkan data namaFakultas";
    }
} else {
    $programStudi = "ID Jurusan tidak ditemukan";
    $jenjang = "ID Jurusan tidak ditemukan"; // Inisialisasi variabel jenjang
    $namaFakultas = "ID Jurusan tidak ditemukan";
}

session_start();

if (!isset($_SESSION['loggedIn'])) {
    header("Location: vLogin.php");
}

?>

<style>
    #header {
        background: linear-gradient(to right, #6CE2FF, #22AFFF);
    }

    #carousel {
        background: linear-gradient(to right, #6CE2FF, #22AFFF);
        color: #fff;
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel h1 {
        margin-top: -10px;
        color: white;
        text-align: left;
    }

    .col {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    @media (max-width: 768px) {
        .col {
            align-items: center;
            /* Mengatur ke tengah saat tampilan di bawah 768px */
        }
    }

    /* CSS untuk desain tabel */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }

    /* CSS untuk desain form pencarian */
    .search-form {
        margin-bottom: 20px;
    }

    .search-form input[type="text"] {
        width: 200px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 0.9em;
    }

    .search-form input[type="submit"] {
        padding: 10px 15px;
        background-color: #009879;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9em;
    }
</style>

<body>

    <!--========================== Header ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <!-- <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a> -->
                <h1 style="color: #fff;">SIRPS</h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="vDaftar_RPS.php">Daftar RPS</a></li>
                    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
                        <li><a href="./controller/prosesLogout.php">Logout</a></li>
                        <?php
                        if (isset($_SESSION['email']) && isset($_SESSION['status'])) {
                            $email = $_SESSION['email'];
                            $status = $_SESSION['status'];

                            if ($status == 1 || $status == 2) {
                                echo "<li><a href=\"#\" style=\"color: #fff;\">$email ($status)</a></li>";
                            } else {
                                echo "<li><a href=\"vProfile.php?id={$_SESSION['idMahasiswa']}\" style=\"color: #fff;\">$email ({$_SESSION['idMahasiswa']})</a></li>";
                            }
                        }
                        ?>
                    <?php else : ?>
                        <li><a href="vLogin.php">Masuk</a></li>
                    <?php endif; ?>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->

    <!--========================== Hero Section ============================-->
    <section id="carousel">
        <div class="container">
            <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size: 80px; margin-top: 70px;">SIRPS.co.id</h1>
            <h2>Universitas Islam Sultan Agung Semarang</h2>
        </div>
    </section><!-- #hero -->

    <div class="container" style="background-color: #fff; padding: 20px;">
        <span style="font-size: 24px; color: black;">Daftar RPS |
            <?php
            if (isset($_SESSION['status'])) {
                $status = $_SESSION['status'];
                if ($status == 1 || $status == 2) {
                    echo '<a href="./Master/vTambahRPS.php?idJurusan=' . $idJurusan . '">Tambah</a>';
                }
            }
            ?>
        </span>
        <br>
        <span style="font-size: 18px; color: black;"><?php echo $programStudi; ?></span>
    </div>
    <hr>

    <div class="container">
        <?php
        if (isset($_GET['idJurusan'])) {
            $idJurusan = $_GET['idJurusan'];

            // Query untuk menghitung jumlah namaMK berdasarkan idJurusan
            $sql = "SELECT COUNT(DISTINCT namaMK) AS total_mk FROM tbl_mk WHERE idJurusan = $idJurusan";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $total_mk = $row['total_mk'];
                echo "<span>Terdapat $total_mk Mata Kuliah,</span><br>";
            } else {
                echo "<span>Tidak ada data Mata Kuliah untuk idJurusan $idJurusan</span><br>";
            }
        } else {
            echo "<span>idJurusan tidak disertakan dalam parameter URL</span><br>";
        }
        ?>
        <span>Fakultas <?php echo $namaFakultas; ?> Program Studi <?php echo $programStudi; ?> <?= $jenjang ?> :
        </span>
        <br>
        <!-- Kode HTML untuk form pencarian dan tabel -->
        <div class="search-form mt-2">
            <form action="#" method="GET">
                <input type="text" name="search" placeholder="Cari...">
                <input type="submit" value="Cari">
            </form>
        </div> <!-- Kode HTML untuk tabel -->
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode MataKuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Download RPS</th>
                    <?php
                    if (isset($_SESSION['status'])) {
                        $status = $_SESSION['status'];
                        if ($status == 1 || $status == 2) {
                            echo "<th>Fitur Admin</th>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['status'])) {
                        $status = $_SESSION['status'];
                        if ($status == 3) {
                            echo "<th>Tambah Matkul</th>";
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['idJurusan'])) {
                    $idJurusan = $_GET['idJurusan'];

                    $sql = "SELECT * FROM tbl_mk WHERE idJurusan = $idJurusan";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['idMK']}</td>";
                            echo "<td><span style='cursor: pointer;' onclick='myFunction()'>{$row['kodeMK']}</span></td>";
                            echo "<td><span style='cursor: pointer;' onclick='myFunction()'>{$row['namaMK']}</span></td>";
                            echo "<td><a href='./RPS/{$row['rps']}' download>Download</a></td>";
                            if (isset($_SESSION['status'])) {
                                $status = $_SESSION['status'];
                                if ($status == 1 || $status == 2) {
                                    echo "<td><a href='./Master/vUpdateRPS.php?idMK={$row['idMK']}'>Update</a></td>";
                                }
                            }

                            // if (isset($_SESSION['status'])) {
                            //     $status = $_SESSION['status'];
                            //     $jurusanMahasiswa = $_SESSION['jurusanMahasiswa'];
                            //     $jenisIdentitas = $_SESSION['jenisIdentitas'];
                            //     if ($status == 3 && $jurusanMahasiswa == $programStudi && $jenisIdentitas == $jenjang) {
                            //         echo "<td><a href='./Master/vTambah_Matkul.php?idMK={$row['idMK']}&idMahasiswa={$_SESSION['idMahasiswa']}'>Tambah</a></td>";
                            //     } else {
                            //         echo "<td>Anda tidak memiliki izin.</td>";
                            //     }
                            // }

                            $idMK = $row['idMK']; // Anda dapat mengganti nilai ini dengan nilai sesuai kebutuhan
                            // Simpan $idMK ke dalam session
                            $_SESSION['idMK'] = $idMK;

                            if (isset($_SESSION['status']) && $_SESSION['status'] == 3) {
                                $status = $_SESSION['status'];
                                $jurusanMahasiswa = $_SESSION['jurusanMahasiswa'];
                                $jenisIdentitas = $_SESSION['jenisIdentitas'];

                                if ($status == 3 && $jurusanMahasiswa == $programStudi && $jenisIdentitas == $jenjang) {
                                    echo "<td><a href='./Master/vTambah_Matkul.php?idMK={$_SESSION['idMK']}&idMahasiswa={$_SESSION['idMahasiswa']}'>Tambah</a></td>";
                                } else {
                                    echo "<td>Anda tidak memiliki izin.</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data yang ditemukan untuk idJurusan: $idJurusan</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>idJurusan tidak disertakan dalam parameter URL</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <!-- <script src="lib/jquery/jquery.min.js"></script> -->
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("header").style.padding = "15px 0";
                document.getElementById("header").style.height = "60px"; /* Mengubah tinggi header */
                document.getElementById("header").style.backgroundColor = "#333";
            } else {
                document.getElementById("header").style.padding = "20px 0";
                document.getElementById("header").style.height = "100px"; /* Tinggi header asli */
                document.getElementById("header").style.backgroundColor = "transparent";
            }
        }
    </script>

    <script>
        // Ambil semua elemen <td> di dalam tabel
        var cells = document.querySelectorAll('.styled-table tbody td:first-child');

        // Iterasi melalui setiap elemen <td> dan berikan nomor urut
        cells.forEach(function(cell, index) {
            cell.textContent = index + 1;
        });
    </script>

    <script>
        function myFunction() {
            // Tambahkan tindakan yang ingin dilakukan di sini
            console.log('Tindakan yang ingin dilakukan saat Paru-Paru diklik');
        }
    </script>
</body>

</html>
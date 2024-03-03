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

    a::before {
        content: "\2022";
        color: #3366FF;
        ;
        margin-right: 5px;
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
                        <li><span style="color: #fff;"><?= $_SESSION['email'] ?> (<?= $_SESSION['status'] ?>) </span></li>
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

    <div class="container">
        <h4 class="mt-5">Daftar RPS</h4>
        <p>Silakan pilih jurusan untuk melihat daftar RPS :</p>
        <div class="row mt-3">
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 1";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>

                <?php
                $idFakultas = 1;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 2";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 2;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 3";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 3;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 4";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 4;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 5";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 2;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 6";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 6;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 7";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 7;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 8";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 8;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 9";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 9;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 10";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 10;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 11";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 11;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
            <div class="col">
                <span class="mb-1" style="font-size: 20px;">
                    <?php
                    $sql_id1 = "SELECT namaFakultas FROM tbl_fakultas WHERE idFakultas = 12";
                    $result_id1 = mysqli_query($conn, $sql_id1);
                    if ($result_id1) {
                        $row_id1 = mysqli_fetch_assoc($result_id1);
                        echo $row_id1['namaFakultas'];
                    } else {
                        echo "Kesalahan dalam menjalankan kueri: " . mysqli_error($conn);
                    }
                    ?>
                </span>
                <?php
                $idFakultas = 12;
                $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                $result_programStudi = mysqli_query($conn, $sql_programStudi);

                if ($result_programStudi) {
                    while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                        echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col">
                <?php
                // Query untuk mengambil semua idFakultas di atas 12
                $sql_idFakultas = "SELECT idFakultas, namaFakultas FROM tbl_fakultas WHERE idFakultas > 12";
                $result_idFakultas = mysqli_query($conn, $sql_idFakultas);

                if ($result_idFakultas && mysqli_num_rows($result_idFakultas) > 0) {
                    while ($row_idFakultas = mysqli_fetch_assoc($result_idFakultas)) {
                        // Tampilkan namaFakultas
                        echo '<span class="mb-1" style="font-size: 20px;">' . $row_idFakultas['namaFakultas'] . '</span>';

                        // Ambil idFakultas untuk query program studi
                        $idFakultas = $row_idFakultas['idFakultas'];

                        // Query program studi berdasarkan idFakultas
                        $sql_programStudi = "SELECT idJurusan, programStudi FROM tbl_jurusan WHERE idFakultas = $idFakultas";
                        $result_programStudi = mysqli_query($conn, $sql_programStudi);

                        if ($result_programStudi && mysqli_num_rows($result_programStudi) > 0) {
                            while ($row_programStudi = mysqli_fetch_assoc($result_programStudi)) {
                                // Tampilkan program studi dengan link jika diperlukan
                                echo '<a href="#" class="bullet-link" style="color: #3366FF;; font-size: 15px; margin-left: 15px; margin-right: 10px;" data-idjurusan="' . $row_programStudi['idJurusan'] . '">' . $row_programStudi['programStudi'] . '</a>';
                            }
                        } else {
                            echo "Tidak ada data program studi.";
                        }

                        // Tambahkan baris kosong untuk pemisah
                        echo "<br><br>";
                    }
                } else {
                    echo "Tidak ada data fakultas baru.";
                }
                ?>
            </div>
        </div>

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
        // Memilih semua elemen dengan class bullet-link
        const links = document.querySelectorAll('.bullet-link');

        // Menambahkan event listener ke setiap elemen link
        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const idJurusan = this.getAttribute('data-idjurusan');
                // Arahkan pengguna ke halaman yang diinginkan dengan menggunakan window.location.href
                window.location.href = 'vDetail_RPS.php?idJurusan=' + idJurusan;
            });
        });
    </script>
</body>

</html>
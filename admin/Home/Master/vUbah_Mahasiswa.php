<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIRPS - Dashboard</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/datepicker3.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<?php
session_start();

$idMahasiswa = $_GET['idMahasiswa'];
include '../../././../database/koneksi.php';

$sql = "SELECT * FROM tbl_mahasiswa WHERE idMahasiswa = $idMahasiswa";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $mahasiswa = mysqli_fetch_assoc($result);

    $idMahasiswa = $mahasiswa['idMahasiswa'];
    $namaMahasiswa = $mahasiswa['namaMahasiswa'];
    $tahunMasuk = $mahasiswa['tahunMasuk'];
    $noTelpMahasiswa = $mahasiswa['noTelpMahasiswa'];
    $emailMahasiswa = $mahasiswa['emailMahasiswa'];
    $passwordMahasiswa = $mahasiswa['passwordMahasiswa'];
    $buktiAktif_pertama = $mahasiswa['buktiAktif_pertama'];
    $buktiAktif_kedua = $mahasiswa['buktiAktif_kedua'];
    $jurusanMahasiswa = $mahasiswa['jurusanMahasiswa'];
    $jenisIdentitas = $mahasiswa['jenisIdentitas'];
    $status = $mahasiswa['status'];
} else {
    echo "Data dosen tidak ditemukan.";
}

?>

<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>SIRPS</span>Admin</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <!-- <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt=""> -->
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    <?php
                    if (isset($_SESSION['emailAdmin'])) {
                        echo $_SESSION['emailAdmin'];
                    } else {
                        echo "None";
                    }
                    ?>
                </div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="active"><a href="../home.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em> Daftar Pengguna <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="../vDosen.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Dosen
                        </a></li>
                    <li><a class="" href="../vMahasiswa.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Mahasiswa
                        </a></li>
                </ul>
            </li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                    <em class="fa fa-navicon">&nbsp;</em> Daftar UNISSULA <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="../vFakultas.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Fakultas
                        </a></li>
                    <li><a class="" href="../vJurusan.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Jurusan
                        </a></li>
                </ul>
            </li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                    <em class="fa fa-navicon">&nbsp;</em> RPS & MATKUL <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="../vMataKuliah.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data MataKuliah
                        </a></li>
                    <li><a class="" href="../vPembelajaran.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Pembelajaran
                        </a></li>
                    <li><a class="" href="../vRPS.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data RPS
                        </a></li>
                </ul>
            </li>
            <li><a href=".././././../controller/admin/prosesLogout_Admin.php"><em class="fa fa-power-off">&nbsp;</em> Keluar</a></li>
        </ul>
    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Mahasiswa</h1>
            </div>
        </div><!--/.row-->

        <h3 style="margin-bottom: 20px;">Tambah Mahasiswa</h3>
        <form action="../../././../controller/admin/prosesUbah_Mahasiswa.php?idMahasiswa=<?= $idMahasiswa; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama" style="font-size: 12px;">Nama Mahasiswa :</label>
                <input type="text" class="form-control" id="nama" name="namaMahasiswa" value="<?= $namaMahasiswa ?>" required style="font-size: 12px;">
            </div>
            <div class="form-group">
                <label for="nama" style="font-size: 12px;">Tahun Masuk :</label>
                <input type="text" class="form-control" id="nama" name="tahunMasuk" value="<?= $tahunMasuk ?>" required style="font-size: 12px;">
            </div>
            <div class="form-group">
                <label for="nama" style="font-size: 12px;">No.Telp :</label>
                <input type="text" class="form-control" id="nama" name="noTelpMahasiswa" value="<?= $noTelpMahasiswa ?>" required style="font-size: 12px;">
            </div>
            <div class="form-group">
                <label for="nama" style="font-size: 12px;">Email :</label>
                <input type="text" class="form-control" id="nama" name="emailMahasiswa" value="<?= $emailMahasiswa ?>" required style="font-size: 12px;">
            </div>
            <div class="form-group">
                <label for="nama" style="font-size: 12px;">Password :</label>
                <input type="text" class="form-control" id="nama" name="passwordMahasiswa" value="<?= $passwordMahasiswa ?>" required style="font-size: 12px;">
            </div>
            <div class="form-group">
                <label for="nama" style="font-size: 12px;">Bukti Aktif 1 :</label>
                <input type="file" class="form-control" id="nama" name="buktiAktif_pertama" style="font-size: 12px;">
                <input type="hidden" name="buktiAktif_pertama" value="<?= $buktiAktif_pertama ?>" />
            </div>
            <iframe src="../../../uploads/<?= $buktiAktif_pertama ?>" width="300px" height="200px"></iframe>
            <div class="form-group">
                <label for="nama" style="font-size: 12px;">Bukti Aktif 2 :</label>
                <input type="file" class="form-control" id="nama" name="buktiAktif_kedua" style="font-size: 12px;">
                <input type="hidden" name="buktiAktif_kedua" value="<?= $buktiAktif_kedua ?>" />
            </div>
            <iframe src="../../../uploads/<?= $buktiAktif_kedua ?>" width="300px" height="200px"></iframe>
            <div class="form-group">
                <label for="programStudi" style="font-size: 12px;">Program Studi :</label>
                <select class="form-control" id="jurusanMahasiswa" name="jurusanMahasiswa" required style="font-size: 12px;">
                    <option value="" disabled selected>-- <?= $jurusanMahasiswa ?> --</option>
                    <?php
                    include '../../././../database/koneksi.php';

                    $sql = "SELECT idJurusan, programStudi, jenjang FROM tbl_jurusan";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['programStudi'] . "' data-jenjang='" . $row['jenjang'] . "'>" . $row['programStudi'] . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>Data programStudi tidak tersedia</option>";
                    }
                    mysqli_close($conn);
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jenjang" style="font-size: 12px;">Jenjang :</label>
                <input type="text" class="form-control" id="jenjang" value="<?= $jenisIdentitas ?>" name="jenisIdentitas" style="font-size: 12px;" readonly required>
            </div>

            <div class="form-group">
                <label for="status" style="font-size: 12px;">Status :</label>
                <select class="form-control" id="status" name="status" required style="font-size: 12px;">
                    <option value="" disabled selected>-- <?= $status ?> --</option>
                    <option value="3">Mahasiswa</option>
                    <option value="null">Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="font-size: 12px;">Ubah</button>
        </form>

    </div>
    </div><!--/.col-->

    </div><!--/.row-->
    </div> <!--/.main-->

    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/chart.min.js"></script>
    <script src="../js/chart-data.js"></script>
    <script src="../js/easypiechart.js"></script>
    <script src="../js/easypiechart-data.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/custom.js"></script>
    <script>
        window.onload = function() {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>

    <script>
        var inputJenjang = document.getElementById("jenjang");
        var selectJurusan = document.getElementById("jurusanMahasiswa");

        selectJurusan.addEventListener("change", function() {
            var selectedOption = selectJurusan.options[selectJurusan.selectedIndex];
            var jenjang = selectedOption.getAttribute("data-jenjang");
            inputJenjang.value = jenjang;
        });
    </script>



</body>

</html>
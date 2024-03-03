<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIRPS - Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<?php session_start() ?>

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
            <li class="active"><a href="./home.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em> Daftar Pengguna <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="./vDosen.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Dosen
                        </a></li>
                    <li><a class="" href="./vMahasiswa.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Mahasiswa
                        </a></li>
                </ul>
            </li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                    <em class="fa fa-navicon">&nbsp;</em> Daftar UNISSULA <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="./vFakultas.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Fakultas
                        </a></li>
                    <li><a class="" href="./vJurusan.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Jurusan
                        </a></li>
                </ul>
            </li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                    <em class="fa fa-navicon">&nbsp;</em> RPS & MATKUL <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="./vMataKuliah.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data MataKuliah
                        </a></li>
                    <li><a class="" href="./vPembelajaran.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data Pembelajaran
                        </a></li>
                    <li><a class="" href="./vRPS.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Data RPS
                        </a></li>
                </ul>
            </li>
            <li><a href="../../controller/admin/prosesLogout_Admin.php"><em class="fa fa-power-off">&nbsp;</em> Keluar</a></li>
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
                <h1 class="page-header">Halaman Dosen</h1>
                <div class="text-left">
                    <a href="./Master/vTambah_Dosen.php">
                        <button class="btn btn-success">Tambah</button>
                    </a>
                </div>
            </div>
        </div><!--/.row-->

        <div class="panel panel-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>no.Telp</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../database/koneksi.php';

                    // Query untuk mengambil seluruh data dari tabel tbl_admin
                    $sql = "SELECT * FROM tbl_dosen";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row['namaDosen'] . "</td>";
                            echo "<td>" . $row['emailDosen'] . "</td>";
                            echo "<td>" . $row['noTelpDosen'] . "</td>";
                            echo "<td>" . $row['nomorIdentitas'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>";
                            echo "<a href='./Master/vUbah_Dosen.php?idDosen=" . $row['idDosen'] . "'><button class='btn btn-primary'>Ubah</button></a>";
                            echo "<a href='../../controller/admin/prosesHapus_Dosen.php?idDosen=" . $row['idDosen'] . "'><button class='btn btn-danger'>Hapus</button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data admin.</td></tr>";
                    }

                    // Tutup koneksi database
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>



    </div>
    </div><!--/.col-->

    </div><!--/.row-->
    </div> <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
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

</body>

</html>
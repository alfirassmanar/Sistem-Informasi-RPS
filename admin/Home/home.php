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
<?php
session_start();
include '../../database/koneksi.php';
// Hitung Jumlah Dosen
$sql_count_dosen = "SELECT COUNT(*) AS total_dosen FROM tbl_dosen";
$result_count_dosen = mysqli_query($conn, $sql_count_dosen);

if ($result_count_dosen) {
	$row_count_dosen = mysqli_fetch_assoc($result_count_dosen);
	$total_dosen = $row_count_dosen['total_dosen'];
} else {
	$total_dosen = 0;
}

// Hitung Jumlah Mahasiswa
$sql_count_mahasiswa = "SELECT COUNT(*) AS total_mahasiswa FROM tbl_mahasiswa";
$result_count_mahasiswa = mysqli_query($conn, $sql_count_mahasiswa);
if ($result_count_mahasiswa) {
	$row_count_mahasiswa = mysqli_fetch_assoc($result_count_mahasiswa);
	$total_mahasiswa = $row_count_mahasiswa['total_mahasiswa'];
} else {
	$total_mahasiswa = 0;
}

// Hitung Jumlah Fakultas
$sql_count_fakultas = "SELECT COUNT(*) AS total_fakultas FROM tbl_fakultas";
$result_count_fakultas = mysqli_query($conn, $sql_count_fakultas);
if ($result_count_fakultas) {
	$row_count_fakultas = mysqli_fetch_assoc($result_count_fakultas);
	$total_fakultas = $row_count_fakultas['total_fakultas'];
} else {
	$total_fakultas = 0;
}

// Hitung Jumlah Jurusan
$sql_count_jurusan = "SELECT COUNT(*) AS total_jurusan FROM tbl_jurusan";
$result_count_jurusan = mysqli_query($conn, $sql_count_jurusan);
if ($result_count_jurusan) {
	$row_count_jurusan = mysqli_fetch_assoc($result_count_jurusan);
	$total_jurusan = $row_count_jurusan['total_jurusan'];
} else {
	$total_jurusan = 0;
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
			<li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-navicon">&nbsp;</em> Daftar Pengguna <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="vDosen.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Data Dosen
						</a></li>
					<li><a class="" href="vMahasiswa.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Data Mahasiswa
						</a></li>
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
					<em class="fa fa-navicon">&nbsp;</em> Daftar UNISSULA <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="vFakultas.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Data Fakultas
						</a></li>
					<li><a class="" href="vJurusan.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Data Jurusan
						</a></li>
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
					<em class="fa fa-navicon">&nbsp;</em> RPS & MATKUL <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="vMataKuliah.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Data MataKuliah
						</a></li>
					<li><a class="" href="vPembelajaran.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Data Pembelajaran
						</a></li>
					<li><a class="" href="vRPS.php">
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
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large"><?= $total_mahasiswa ?></div>
							<div class="text-muted">Mahasiswa</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?= $total_dosen ?></div>
							<div class="text-muted">Dosen</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?= $total_fakultas ?></div>
							<div class="text-muted">Fakultas</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large"><?= $total_jurusan ?></div>
							<div class="text-muted">Jurusan</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
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
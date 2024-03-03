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
session_start();
include './database/koneksi.php';
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

// Hitung Jumlah Mata Kuliah
$sql_count_mk = "SELECT COUNT(*) AS total_mk FROM tbl_mk";
$result_count_mk = mysqli_query($conn, $sql_count_mk);

if ($result_count_mk) {
  $row_count_mk = mysqli_fetch_assoc($result_count_mk);
  $total_mk = $row_count_mk['total_mk'];
} else {
  $total_mk = 0;
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

// Hitung Jumlah Data di tbl_rps
$sql_count_rps = "SELECT COUNT(*) AS total_rps FROM tbl_rps";
$result_count_rps = mysqli_query($conn, $sql_count_rps);
if ($result_count_rps) {
  $row_count_rps = mysqli_fetch_assoc($result_count_rps);
  $total_rps = $row_count_rps['total_rps'];
} else {
  $total_rps = 0; // Jika terjadi kesalahan dalam eksekusi query
}

?>


<style>
  #header {
    background: linear-gradient(to right, #6CE2FF, #22AFFF);
  }

  #carousel {
    background: linear-gradient(to right, #6CE2FF, #22AFFF);
    color: #fff;
    height: 680px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .carousel h1 {
    margin-top: -10px;
    color: white;
    text-align: left;
  }
</style>

<body>

  <!--========================== Header ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a> -->
        <h1><a href="#hero">SIRPS</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="vDaftar_RPS.php">Daftar RPS</a></li>
          <li><a href="#team">TIM</a></li>
          <li><a href="#about">Informasi</a></li>
          <li><a href="#contact">Hubungi Kami</a></li>
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
      </nav>
    </div>
  </header>
  <!-- #header -->

  <!--========================== Hero Section ============================-->
  <section id="carousel">
    <div class="container">
      <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size: 120px;">SIRPS.co.id</h1>
      <h2>Universitas Islam Sultan Agung Semarang</h2>
    </div>
  </section><!-- #hero -->

  <!--========================== Facts Section ============================-->
  <section id="facts">
    <div class="container wow fadeIn">
      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up" style="color: #22AFFF;"><i class="fa fa-user" style="color: #22AFFF;"></i> <?php echo $total_dosen; ?></span>
          <a href="#" style="color: #666666;">
            <p>Dosen</p>
          </a>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up" style="color: #22AFFF;"><i class="fa fa-user" style="color: #22AFFF;"></i> <?php echo $total_mahasiswa; ?></span>
          <a href="#" style="color: #666666;">
            <p>Mahasiswa</p>
          </a>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up" style="color: #22AFFF;"><i class="fa fa-book" style="color: #22AFFF;"></i> <?php echo $total_rps; ?></span>
          <a href="#" style="color: #666666;">
            <p>RPS</p>
          </a>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up" style="color: #22AFFF;"><i class="fa fa-book" style="color: #22AFFF;"></i> <?php echo $total_mk; ?></span>
          <a href="#" style="color: #666666;">
            <p>Mata Kuliah</p>
          </a>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up" style="color: #22AFFF;"><i class="fa fa-university" style="color: #22AFFF;"></i> <?php echo $total_fakultas; ?></span>
          <a href="#" style="color: #666666;">
            <p>Fakultas</p>
          </a>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up" style="color: #22AFFF;"><i class="fa fa-book" style="color: #22AFFF;"></i> <?php echo $total_jurusan; ?></span>
          <a href="#" style="color: #666666;">
            <p>Jurusan</p>
          </a>
        </div>

      </div>
    </div>
  </section>
  <!-- #facts -->


  <main id="main">
    <!--========================== About Us Section ============================-->
    <section id="about">
      <div class="container">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Fitur Kami</h2>
            <p>
              Apa sebenarnya RPS itu? RPS adalah kegiatan atau tindakan mengkoordinasikan komponen-komponen pembelajaran sehingga tujuan pembelajaran, meteri pembelajaran, cara penyampaian kegiatan (metode, model, dan teknik) serta cara menilainya menjadi jelas dan sistematis, sehingga proses belajar selama satu semester menjadi efektif dan efisien.
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-eye" style="color: #22AFFF;"></i></div>
              <h4 class="title"><a href="">Lihat MataKuliah</a></h4>
              <p class="description">Mahasiswa dengan semester Genap/Ganjil dapat melihat matakuliah Universitas Universitas Islam Sultan Agung Semarang
              </p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-calendar" style="color: #22AFFF;"></i></div>
              <h4 class="title"><a href="">Jadwal Perkuliahan Semester Genap/Ganjil</a></h4>
              <p class="description">Seluruh pengguna dapat melihat Jadwal Perkuliahan sesuai Semester</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-info-circle" style="color: #22AFFF;"></i></div>
              <h4 class="title"><a href="">Informasi mengenai RPS</a></h4>
              <p class="description">Mahasiswa dapat melihat informasi RPS yang terbaru</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-user" style="color: #22AFFF;"></i></div>
              <h4 class="title"><a href="">Ada apa di Sistem RSP UNISSILA?</a></h4>
              <p class="description">Fungsi sebagai mahasiswa dam dosen masih banyak lagi</p>
            </div>


          </div>

          <!-- <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div> -->
          <img class="col-lg-6 order-lg-2 wow fadeInRight" src="img/bauran-landing-feature.png" alt="">
        </div>

      </div>
    </section>
    <!-- #about -->

    <!--========================== Team Section ============================-->
    <section id="team">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Tim</h3>
          <p class="section-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, excepturi!</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/user.png" alt=""></div>
              <h4>Muhammad Ghandi</h4>
              <span>CEO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/user.png" alt=""></div>
              <h4>Ali Abdulah</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/user.png" alt=""></div>
              <h4>Wahyu</h4>
              <span>Maganer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/user.png" alt=""></div>
              <h4>Ikoh wahyu</h4>
              <span>Marketing</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team -->

    <!--========================== Contact Section ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Kontak</h3>
          <p class="section-description">Berisi mengenai informasi kontak admin yang dapat dihubungi</p>
        </div>
      </div>

      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>Wahyu<br>Admin, Universitas Islam Sultan Agung Semarang
                </p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>UNISSULA@gmail.co.id</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+62 8233 1016 638</p>
              </div>
            </div>

            <!-- <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div> -->

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Pesan"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Kirim Pesan</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--========================== Footer ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>SIRPS</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">SIRPS</a>
      </div>
    </div>
  </footer><!-- #footer -->

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
</body>

</html>
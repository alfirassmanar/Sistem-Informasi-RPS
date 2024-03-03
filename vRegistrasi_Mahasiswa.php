<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        .fb9 {
            border: 1px solid #6CE2FF;
            background-color: #22AFFF;
            width: 150px;
            height: 30px;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6CE2FF, #22AFFF);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 420px;
            width: 100%;
            height: 850px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .form-group label {
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-group input[type="submit"] {
            background-color: #22AFFF;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #22AFFF;
        }

        .captcha-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 15px;
        }

        .captcha-container input[type="checkbox"] {
            margin-right: 10px;
        }

        .login-links {
            margin-top: 20px;
            text-align: left;
        }

        .login-links label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .login-links a {
            text-decoration: none;
            color: blue;
            margin-right: 10px;
        }

        .login-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <br>
        <div style="text-align: center;">
            <div>
                <span style="font-size: 16px; font-family: 'Times New Roman', Times, serif; color: #555;">Formulir Pendaftaran Mahasiswa
                </span>
            </div>
        </div>
        <br><br>
        <form action="./controller/prosesRegistrasi_MHS.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label style="font-size: 14px;">Nama Lengkap & Tahun Masuk</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" required style="margin-right: 10px; width: 320px;" name="namaMahasiswa" required>
                    <input type="text" placeholder="1999" style="width: 90px;" name="tahunMasuk" required>
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_identitas" style="font-size: 14px;">Jenis Identitas</label>
                <div style="display: flex; align-items: center;">
                    <!-- Input untuk menampung jenjang -->
                    <input type="text" id="jenjang" name="jenisIdentitas" style="width: 100px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;" readonly required>

                    <!-- Select untuk memilih jurusan mahasiswa -->
                    <select id="jurusanMahasiswa" name="jurusanMahasiswa" style="width: 320px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;" required>
                        <option value="" selected disabled>--Pilih--</option>
                        <?php
                        include './database/koneksi.php';

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

                    <script>
                        var inputJenjang = document.getElementById("jenjang");
                        var selectJurusan = document.getElementById("jurusanMahasiswa");

                        selectJurusan.addEventListener("change", function() {
                            var selectedOption = selectJurusan.options[selectJurusan.selectedIndex];
                            var jenjang = selectedOption.getAttribute("data-jenjang");
                            inputJenjang.value = jenjang;
                        });
                    </script>



                </div>
                <label style="font-size: 13px; font-family: 'Times New Roman', Times, serif; color: #555; margin-top: 3px; margin-left: 115px;">NB: Program studi yang diambil mahasiswa
                </label>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">No. Handphone</label>
                <input type="number" name="noTelpMahasiswa" required>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Alamat Email</label>
                <input type="email" name="emailMahasiswa" required>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Kata Sandi</label>
                <input type="password" name="passwordMahasiswa" required>
            </div>

            <div style="text-align: center;">
                <div>
                    <span style="font-size: 16px; font-family: 'Times New Roman', Times, serif; color: #555;">Upload Berkas
                    </span>
                </div>
            </div>

            <br>

            <div class="form-group">
                <label style="font-size: 14px;">Bukti KRS/KTM</label>
                <div style="display: flex; align-items: center;">
                    <input type="file" name="buktiAktif_pertama" style="width: 420px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;" required>
                </div>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Bukti Telah Membayar UKT</label>
                <div style="display: flex; align-items: center;">
                    <input type="file" name="buktiAktif_kedua" style="width: 420px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;" required>
                </div>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Verifikasi Keamanan</label>
                <div class="g-recaptcha" data-sitekey="6Ldbdg0TAAAAAI7KAf72Q6uagbWzWecTeBWmrCpJ"></div>
            </div>

            <div class="form-group" style="text-align: center;">
                <div style="display: inline-flex;">
                    <button type="submit" style="width: 100px; background-color: #22AFFF; color: white; border: none; padding: 8px 12px; border-radius: 5px;">Daftar</button>
                    <a href="vLogin.php">
                        <button type="button" style="width: 100px; background-color: red; color: white; border: none; padding: 8px 12px; border-radius: 5px; margin-left: 10px;">Batal</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>
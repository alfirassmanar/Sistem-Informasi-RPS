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
            height: 900px;
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
            background-color: orange;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .form-group input[type="submit"]:hover {
            background-color: orangered;
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
                <span style="font-size: 16px; font-family: 'Times New Roman', Times, serif; color: #555;">Formulir Pendaftaran Dosen
                </span>
            </div>
        </div>
        <br><br>
        <form action="./controller/prosesRegistrasi_Dosen.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label style="font-size: 14px;">Nama Lengkap & Gelar</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="namaDosen" required style="margin-right: 10px; width: 320px;" require>
                    <input type="text" name="gelarDosen" placeholder="gelar" style="width: 90px;" require>
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_identitas" style="font-size: 14px;">Jenis Identitas</label>
                <div style="display: flex; align-items: center;">
                    <select id="jenis_identitas" name="jenisIdentitas" style="width: 100px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;" required>
                        <option value="" selected disabled>--Pilih--</option>
                        <option value="NIDN">NIDN</option>
                        <option value="NUPT">NUPT</option>
                    </select>
                    <input type="text" name="nomorIdentitas" style="margin-left: 10px; padding: 8px; border-radius: 5px; width: 310px; border: 1px solid #ccc;" placeholder="Nomor Identitas" required>
                </div>
                <label style="font-size: 13px; font-family: 'Times New Roman', Times, serif; color: #555; margin-top: 3px; margin-left: 115px;">NB: harus sama dengan data di forlap dikti
                </label>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">No. Handphone</label>
                <input type="number" name="noTelpDosen" required>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Alamat Email</label>
                <input type="email" name="emailDosen" required>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Kata Sandi</label>
                <input type="password" name="passwordDosen" required>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Ulangi Kata Sandi</label>
                <input type="password" required>
            </div>

            <div style="text-align: center;">
                <div>
                    <span style="font-size: 16px; font-family: 'Times New Roman', Times, serif; color: #555;">Pilih Instansi
                    </span>
                </div>
            </div>

            <br>

            <div class="form-group">
                <label style="font-size: 14px;">Instansi</label>
                <div style="display: flex; align-items: center;">
                    <select id="instansi" name="instansiDosen" style="width: 420px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;" required>
                        <option value="" selected disabled>--Pilih--</option>
                        <option value="KTP">Instansi 1</option>
                        <option value="SIM">Instansi 2</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Program Studi</label>
                <div style="display: flex; align-items: center;">
                    <select id="programStudi" name="programStudi" style="width: 420px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;" required>
                        <option value="" selected disabled>--Pilih--</option>
                        <option value="KTP">Program Studi 1</option>
                        <option value="SIM">Program Studi 2</option>
                    </select>
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
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
            width: 100%;
            height: 550px;
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
        <div style="text-align: center;">
            <div>
                <img src="./img/logo_subtitle.png" style="width: 100px;">
            </div>
            <div>
                <span style="font-size: 14px; font-family: 'Times New Roman', Times, serif; color: #555;">Gunakan email yang aktif di SIRPS.id</span>
            </div>
        </div>
        <br>
        <form action="./controller/prosesReset_Password.php" method="post">
            <div class="form-group">
                <label style="font-size: 14px;">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
            <div class="form-group">
                <input type="submit" value="Reset Password">
            </div>
        </form>


        <div class="container" style="text-align: center;">
            <label style="font-size: 14px; font-family: 'Times New Roman', Times, serif; color: #555;">Belum memiliki akun? Silahkan mendaftar, sebagai
                <a href="vRegistrasi_Mahasiswa.php" style="color: #22AFFF; text-decoration: none;">Mahasiswa</a> atau
                <a href="vRegistrasi_Dosen.php" style="color: #22AFFF; text-decoration: none;">Dosen</a>
            </label>
        </div>
        <br>
        <div class="container" style="text-align: center;">
            <label style="font-size: 14px; font-family: 'Times New Roman', Times, serif; color: #555;">Sudah memiliki akun?
                <a href="vLogin.php" style="color: #22AFFF; text-decoration: none;">Masuk</a>
            </label>
        </div>
    </div>

    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>
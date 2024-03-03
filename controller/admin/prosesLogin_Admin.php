<?php
session_start();
include '../../database/koneksi.php'; // Sesuaikan dengan lokasi file koneksi Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['emailAdmin'];
    $password = $_POST['passwordAdmin'];

    $sql = "SELECT * FROM tbl_admin WHERE emailAdmin = '$email' AND passwordAdmin = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        $_SESSION['idAdmin'] = $admin['idAdmin'];
        $_SESSION['emailAdmin'] = $admin['emailAdmin'];

        if (isset($_POST['remember']) && $_POST['remember'] == 'Remember Me') {
            setcookie('emailAdmin', $admin['emailAdmin'], time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
        }

        header('Location: .././../admin/Home/home.php');
        // include '';
        exit;
    } else {
        echo "Login gagal. Invalid email atau password.";
    }

    mysqli_close($conn);
}

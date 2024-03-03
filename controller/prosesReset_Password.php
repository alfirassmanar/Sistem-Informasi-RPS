<?php
// Pastikan session dimulai di setiap halaman yang menggunakan session
session_start();

// Sertakan file koneksi ke database
include '../database/koneksi.php';

// Fungsi untuk mengirim email reset password
function kirimEmailResetPassword($email, $token) {
    // Di sini Anda harus mengirim email reset password ke alamat email yang diberikan
    // Isi pesan email dengan tautan reset password yang mengarah ke halaman reset password

    // Contoh pesan email
    $pesan = "Klik tautan berikut untuk mereset kata sandi Anda: ";
    $pesan .= "<a href='http://www.example.com/reset_password.php?token=$token'>Reset Password</a>";

    // Kirim email menggunakan fungsi mail() atau menggunakan pustaka PHPMailer
    // Pastikan untuk menyertakan informasi lebih lanjut seperti subjek dan header email
    // Contoh menggunakan fungsi mail():
    // mail($email, 'Reset Password', $pesan);

    // Setelah berhasil mengirim email, Anda dapat menampilkan pesan sukses kepada pengguna
    echo "Email reset password telah dikirim ke $email";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui formulir
    $email = $_POST['email'];

    // Verifikasi apakah email ada di tabel tbl_mahasiswa
    $sqlMahasiswa = "SELECT * FROM tbl_mahasiswa WHERE email = '$email'";
    $resultMahasiswa = mysqli_query($conn, $sqlMahasiswa);

    if ($resultMahasiswa !== false && $resultMahasiswa->num_rows > 0) {
        // Email ditemukan di tabel tbl_mahasiswa, buat token reset password dan kirim email
        $token = md5(uniqid(rand(), true));
        // Simpan token di session untuk verifikasi saat mengatur ulang password
        $_SESSION['reset_password_token'] = $token;

        // Kirim email reset password
        kirimEmailResetPassword($email, $token);
    } else {
        // Jika email tidak ditemukan di tabel tbl_mahasiswa, cek di tabel tbl_dosen
        $sqlDosen = "SELECT * FROM tbl_dosen WHERE email = '$email'";
        $resultDosen = mysqli_query($conn, $sqlDosen);

        if ($resultDosen !== false && $resultDosen->num_rows > 0) {
            // Email ditemukan di tabel tbl_dosen, buat token reset password dan kirim email
            $token = md5(uniqid(rand(), true));
            // Simpan token di session untuk verifikasi saat mengatur ulang password
            $_SESSION['reset_password_token'] = $token;

            // Kirim email reset password
            kirimEmailResetPassword($email, $token);
        } else {
            // Jika email tidak ditemukan di kedua tabel, beri pesan kesalahan kepada pengguna
            echo "Email tidak ditemukan.";
        }
    }
} else {
    // Jika bukan metode POST, beri pesan kesalahan kepada pengguna
    echo "Akses tidak valid.";
}
?>

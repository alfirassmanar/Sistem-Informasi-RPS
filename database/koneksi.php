<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sirps";

$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}


<?php
// Koneksi ke database MySQL XAMPP
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_pendaftaran"
);

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

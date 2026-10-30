
<?php
// Membuat koneksi ke database
$con = mysqli_connect("localhost", "root", "");

// Memeriksa koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memilih database
mysqli_select_db($con, "lat_dbase");

// Menghapus data Raka Firmansyah
mysqli_query($con, "DELETE FROM tbl_mhs
    WHERE FirstName = 'Raka'
    AND LastName = 'Firmansyah'");

// Menampilkan pesan
echo "Data Raka Firmansyah berhasil dihapus";

// Menutup koneksi
mysqli_close($con);
?>

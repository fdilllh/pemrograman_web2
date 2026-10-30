
<?php
// Membuat koneksi ke database
$con = mysqli_connect("localhost", "root", "");

// Memeriksa koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memilih database
mysqli_select_db($con, "lat_dbase");

// Mengubah umur Siti Amelia menjadi 36 tahun
mysqli_query($con, "UPDATE tbl_mhs
    SET Age = 36
    WHERE FirstName = 'Siti'
    AND LastName = 'Amelia'");

// Menampilkan pesan
echo "Data Siti Amelia berhasil diupdate";

// Menutup koneksi
mysqli_close($con);
?>

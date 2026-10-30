
<?php
// [DITAMBAHKAN] Koneksi database
require_once 'koneksi.php';

$pesan = "";

// [DITAMBAHKAN] Proses penyimpanan saat tombol SIMPAN diklik
if (isset($_POST['simpan'])) {

    $tgl_input = $_POST['tgl_input'];
    $kode = strtoupper(trim($_POST['kode']));
    $nama = trim($_POST['nama']);
    $jk = $_POST['jk'];
    $asal_sekolah = trim($_POST['asal_sekolah']);
    $pekerjaan_ortu = trim($_POST['pekerjaan_ortu']);
    $tempat_lahir = trim($_POST['tempat_lahir']);
    $tgl_lahir = $_POST['tgl_lahir'];

    $mat = (float) $_POST['mat'];
    $bing = (float) $_POST['bing'];
    $umum = (float) $_POST['umum'];

    // Hitung rata-rata (ASLI)
    $rata = ($mat + $bing + $umum) / 3;

    // Menentukan keterangan (ASLI)
    if ($rata >= 70) {
        $keterangan = "Lulus";
    } elseif ($rata >= 60) {
        $keterangan = "Cadangan";
    } else {
        $keterangan = "Tidak Lulus";
    }

    // Menentukan tempat tes berdasarkan kode (ASLI)
    $kode_awal = substr($kode, 0, 1);

    if ($kode_awal == "A") {
        $tempat_tes = "Gedung A";
    } elseif ($kode_awal == "B") {
        $tempat_tes = "Gedung B";
    } elseif ($kode_awal == "V") {
        $tempat_tes = "Viktor";
    } else {
        $tempat_tes = "Tidak Diketahui";
    }

    // [DITAMBAHKAN] Simpan data ke tabel pendaftar
    $sql = "INSERT INTO pendaftar (
        tgl_input, kode, nama, jk,
        asal_sekolah, pekerjaan_ortu,
        tempat_lahir, tgl_lahir,
        matematika, bahasa_inggris, umum,
        rata_rata, tempat_tes, keterangan
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Query gagal disiapkan: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssddddss",
        $tgl_input,
        $kode,
        $nama,
        $jk,
        $asal_sekolah,
        $pekerjaan_ortu,
        $tempat_lahir,
        $tgl_lahir,
        $mat,
        $bing,
        $umum,
        $rata,
        $tempat_tes,
        $keterangan
    );

    if (mysqli_stmt_execute($stmt)) {
        $pesan = "Data berhasil disimpan ke database!";
    } else {
        $pesan = "Data gagal disimpan: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        .container{
            width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 10px;
            text-align: center;
        }

        input[type=text],
        input[type=number],
        input[type=date]{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .btn{
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn:hover{
            background: darkblue;
        }

        .info{
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <form method="POST">

        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" name="mat" min="0" max="100" required>

        <label>Bahasa Inggris</label>
        <input type="number" name="bing" min="0" max="100" required>

        <label>Umum</label>
        <input type="number" name="umum" min="0" max="100" required>

        <button type="submit" name="simpan" class="btn">SIMPAN</button>

    </form>

    <?php
    // [DITAMBAHKAN] Tampilkan pesan penyimpanan
    if ($pesan != "") {
        echo "<p style='color:green;'>" .
             htmlspecialchars($pesan) . "</p>";
    }

    // [DITAMBAHKAN] Ambil seluruh data dari database
    $query = "SELECT * FROM pendaftar ORDER BY id DESC";
    $hasil = mysqli_query($conn, $query);

    if (!$hasil) {
        die("Gagal mengambil data: " . mysqli_error($conn));
    }

    // [DITAMBAHKAN] Hitung rekap berdasarkan seluruh data
    $jumlah_pendaftar = mysqli_num_rows($hasil);
    $jumlah_lulus = 0;
    $jumlah_tidak_lulus = 0;

    $data_pendaftar = [];

    while ($baris = mysqli_fetch_assoc($hasil)) {
        $data_pendaftar[] = $baris;

        if ($baris['keterangan'] == "Lulus") {
            $jumlah_lulus++;
        } else {
            $jumlah_tidak_lulus++;
        }
    }
    ?>

    <!-- [DITAMBAHKAN] Tabel menampilkan seluruh data tersimpan -->
    <table>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Tgl Lahir</th>
            <th>Asal Sekolah</th>
            <th>Pekerjaan Ortu</th>
            <th>Tempat Tes</th>
            <th>MAT</th>
            <th>B. Inggris</th>
            <th>Umum</th>
            <th>Rata-rata</th>
            <th>Keterangan</th>
        </tr>

        <?php if (count($data_pendaftar) > 0) { ?>
            <?php foreach ($data_pendaftar as $data) { ?>
                <tr>
                    <td><?= htmlspecialchars($data['kode']) ?></td>
                    <td><?= htmlspecialchars($data['nama']) ?></td>
                    <td><?= htmlspecialchars($data['jk']) ?></td>
                    <td>
                        <?= htmlspecialchars($data['tempat_lahir']) ?>,
                        <?= htmlspecialchars($data['tgl_lahir']) ?>
                    </td>
                    <td><?= htmlspecialchars($data['asal_sekolah']) ?></td>
                    <td><?= htmlspecialchars($data['pekerjaan_ortu']) ?></td>
                    <td><?= htmlspecialchars($data['tempat_tes']) ?></td>
                    <td><?= htmlspecialchars($data['matematika']) ?></td>
                    <td><?= htmlspecialchars($data['bahasa_inggris']) ?></td>
                    <td><?= htmlspecialchars($data['umum']) ?></td>
                    <td><?= number_format((float)$data['rata_rata'], 2) ?></td>
                    <td><?= htmlspecialchars($data['keterangan']) ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="12">Belum ada data pendaftar.</td>
            </tr>
        <?php } ?>
    </table>

    <!-- [DIPERBAIKI] Rekap menghitung seluruh data di database -->
    <div class="info">
        <h3>Rekap Data:</h3>
        <p>Jumlah Pendaftar: <b><?= $jumlah_pendaftar ?></b></p>
        <p>Jumlah Peserta Lulus: <b><?= $jumlah_lulus ?></b></p>
        <p>Jumlah Tidak Lulus: <b><?= $jumlah_tidak_lulus ?></b></p>
    </div>

    <!-- Keterangan asli tetap dipertahankan -->
    <div class="info">
        <h3>Keterangan:</h3>
        <p><b>Kode Tempat Tes:</b></p>
        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>
        <ul>
            <li>Rata-rata ≥ 70 = Lulus</li>
            <li>Rata-rata 60 - 69 = Cadangan</li>
            <li>Rata-rata &lt; 60 = Tidak Lulus</li>
        </ul>
    </div>

</div>

</body>
</html>

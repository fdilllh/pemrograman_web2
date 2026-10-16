<html>
<head><title>Contoh Penggunaan UDF</title></head>
<body>
<!-- Form Input -->
<form action"" method="post">
    Masukkan Bilangan Pertama :<br>
    <input type="text" name="A" size="10" required ><br>
    Masukkan Bilangan Kedua :<br>
    <input type="text" name="B" size="10" required><br>
    <input type="submit" value="hitung">
</form>

<?php
// Fungsi
function jumlah($A, $B)
{
    return $A + $B;
}
function kurang($A, $B)
{
    return $A - $B;
}
function kali($A, $B)
{
    return $A * $B;
}
function bagi($A, $B)
{
    return $A / $B;
}

// Proses
if (isset($_POST["A"]) && isset($_POST["B"])) {
    $A = $_POST["A"];
    $B = $_POST["B"];

    echo "<br>";
    echo "Bilangan Pertama : $A<br>";
    echo "Bilangan Kedua : $B<br><br>";

    echo "Hasil Penjumlahan 2 buah bilangan<br>";
    printf("Penjumlahan antara : %d + %d = %d", $A, $B, jumlah($A, $B));
    echo "<br><br>";

    echo "Hasil Pengurangan 2 buah bilangan<br>";
    printf("Pengurangan antara : %d - %d = %d", $A, $B, kurang($A, $B));
    echo "<br><br>";

    echo "Hasil Perkalian 2 buah bilangan<br>";
    printf("Perkalian antara : %d * %d = %d", $A, $B, kali($A, $B));
    echo "<br><br>";

    echo "Hasil Pembagian 2 buah bilangan<br>";
    if ($B != 0) {
        printf("Pembagian antara : %d / %d = %d", $A, $B, bagi($A, $B));
    } else {
        echo "Tidak bisa dibagi 0";
    }
    echo "<br><br>";
}
?>
</body>
</html>
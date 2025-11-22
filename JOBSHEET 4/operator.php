<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisa = $a % $b;
$pangkat = $a ** $b; 

echo "<h3>Operator Aritmatika</h3>";
echo "Hasil Penjumlahan: $a + $b = $hasilTambah <br>";
echo "Hasil Pengurangan: $a - $b = $hasilKurang <br>";
echo "Hasil Perkalian: $a * $b = $hasilKali <br>";
echo "Hasil Pembagian: $a / $b = $hasilBagi <br>";
echo "Sisa Pembagian: $a % $b = $sisa <br>";
echo "Pangkat: $a ** $b = $pangkat <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<h3>Operator Perbandingan</h3>";
echo "$a == $b : " . ($hasilSama ? 'true' : 'false') . "<br>";
echo "$a != $b : " . ($hasilTidakSama ? 'true' : 'false') . "<br>";
echo "$a < $b : " . ($hasilLebihKecil ? 'true' : 'false') . "<br>";
echo "$a > $b : " . ($hasilLebihBesar ? 'true' : 'false') . "<br>";
echo "$a <= $b : " . ($hasilLebihKecilSama ? 'true' : 'false') . "<br>";
echo "$a >= $b : " . ($hasilLebihBesarSama ? 'true' : 'false') . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<h3>Operator Logika</h3>";
echo "$a && $b : " . ($hasilAnd ? 'true' : 'false') . "<br>";
echo "$a || $b : " . ($hasilOr ? 'true' : 'false') . "<br>";
echo "!$a : " . ($hasilNotA ? 'true' : 'false') . "<br>";
echo "!$b : " . ($hasilNotB ? 'true' : 'false') . "<br>";

echo "<h3>Operator Penugasan</h3>";
$a += $b;
echo "Setelah \$a += \$b, nilai a menjadi: $a <br>";
$a -= $b;
echo "Setelah \$a -= \$b, nilai a menjadi: $a <br>";
$a *= $b;
echo "Setelah \$a *= \$b, nilai a menjadi: $a <br>";
$a /= $b;
echo "Setelah \$a /= \$b, nilai a menjadi: $a <br>";
$a %= $b;
echo "Setelah \$a %= \$b, nilai a menjadi: $a <br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "<h3>Operator Identitas</h3>";
echo "$a === $b : " . ($hasilIdentik ? 'true' : 'false') . "<br>";
echo "$a !== $b : " . ($hasilTidakIdentik ? 'true' : 'false') . "<br>";

// Soal 3.6
$jumlahKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $jumlahKursi - $kursiTerisi;
$persentaseKosong = ($kursiKosong / $jumlahKursi) * 100;

echo "<h3>Soal 3.6</h3>";
echo "Jumlah kursi: $jumlahKursi <br>";
echo "Kursi terisi: $kursiTerisi <br>";
echo "Kursi kosong: $kursiKosong <br>";
echo "Persentase kursi kosong: $persentaseKosong% <br>";
?>



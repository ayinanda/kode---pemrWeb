<?php

$a = 10;
$b = 5;
$c = $a + 5;
$d = $b + (10 * 5);
$e = $d - $c;

echo "<h3>Integer</h3>";
echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br>";
echo "Variabel c: {$c} <br>";
echo "Variabel d: {$d} <br>";
echo "Variabel e: {$e} <br>";

var_dump($e); 
echo "<hr>";

$nilaiMatematika = 5.1;
$nilaiIpa = 6.7;
$nilaiBahasaIndonesia = 9.3;
$rataRata = ($nilaiMatematika + $nilaiIpa + $nilaiBahasaIndonesia) / 3;

echo "<h3>Float</h3>";
echo "Matematika: {$nilaiMatematika} <br>";
echo "IPA: {$nilaiIpa} <br>";
echo "Bahasa Indonesia: {$nilaiBahasaIndonesia} <br>";
echo "Rata-rata: {$rataRata} <br>";

var_dump($rataRata);
echo "<hr>";

$apakahSiswaLulus = true;
$apakahSiswaSudahUjian = false;

echo "<h3>Boolean</h3>";
var_dump($apakahSiswaLulus);
echo "<br>";
var_dump($apakahSiswaSudahUjian);
echo "<hr>";

$namaDepan = "Ibnu";
$namaBelakang = 'Jakaria';
$namaLengkap = "{$namaDepan} {$namaBelakang}"; 
$namaLengkap2 = $namaDepan . ' ' . $namaBelakang;

echo "<h3>String</h3>";
echo "Nama Depan: {$namaDepan} <br>";
echo "Nama Belakang: {$namaBelakang} <br>";
echo $namaLengkap;

$listMahasiswa = ["Wahid Abdullah", "Elmo Bachtiar", "Lendis Fabri"];
echo $listMahasiswa[0];
?>

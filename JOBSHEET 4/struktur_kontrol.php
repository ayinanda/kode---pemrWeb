<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
   echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
   echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
   echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
   echo "Nilai huruf: D";
} 
echo "<br>";
$jarakSaatIni = 0;
$jaraktarget = 500;
$peningkatanHarian = 3;
$hari = 0;

while ($jarakSaatIni < $jaraktarget) {
   $jarakSaatIni += $peningkatanHarian;
   $hari++;
}

$jumlahLahan = 10;
$tanahPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
   $jumlahBuah += ($tanahPerLahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah <br><br>";
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer. " . "<br><br>";

$skorUjian = [85, 92, 58, 64, 90, 55, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
   $totalSkor += $skor;
}

echo "Total skor ujian adalah: $totalSkor" . "<br><br>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
   if ($nilai < 60) {
    echo "Nilai: $nilai (Tidak Lulus)<br>"; 
    continue;
   }
   echo "Nilai: $nilai (Lulus)<br>";
}

// Soal 4.6
echo "<hr>";
$n1 = 85;
$n2 = 92;
$n3 = 58;
$n4 = 64;
$n5 = 90;
$n6 = 55;
$n7 = 88;
$n8 = 79;
$n9 = 70;
$n10 = 96;

$totalSemuaNilai = $n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8 + $n9 + $n10;
$nilaiAfterModifikasi = $totalSemuaNilai - ($n10 + $n2 + $n4 + $n9);

echo "Total semua nilai: $totalSemuaNilai" . "<br>";
echo "Total nilai setelah menghapus nilai tertinggi dan terendah: $nilaiAfterModifikasi" . "<br>";
echo "Rata-rata nilai setelah modifikasi: " . ($nilaiAfterModifikasi / 6) . "<br>";


// Soal 4.7
echo "<hr>";
$hargaProduk = 120000;

if ($hargaProduk > 100000) {
   $diskon = 0.10 * $hargaProduk;
} else {
   $diskon = 0;
}

$hargaSetelahDiskon = $hargaProduk - $diskon;

echo "Harga produk: Rp $hargaProduk" . "<br>";
echo "Diskon yang diberikan: Rp $diskon" . "<br>";
echo "Harga setelah diskon: Rp $hargaSetelahDiskon" . "<br>";

// Soal 4.8
echo "<hr>";
$poin = 600;

echo "Total skor pemain adalah: $poin" . "<br>";

$hadiah = ($poin > 500) ? "YA" : "TIDAK";

echo "Apakah pemain mendapatkan hadiah? $hadiah" . "<br>";
?>


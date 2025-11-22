<?php

$name = @$_GET['name']; //tanda @ agar tidak ada peringatan error ketika key-nya kosong
$usia = @$_GET['usia']; //tanda @ agar tidak ada peringatan error ketika key-nya kosong

echo "Halo {$name}! Apakah benar anda berusia {$usia} tahun?";
?>

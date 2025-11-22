<?php
//membuat fungsi
function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}
function perkenalan ($nama, $salam="Assalamualaikum") {
    echo $salam. ", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
}
//memanggil fungsi yang sudah dibuat
perkenalan("Nanda", "Hallo");

echo "<hr>";

$saya= "Gargarina";
$ucapanSalam = "Selamat pagi";

//memanggil lagi tanpa mengisi parameter salam
perkenalan($saya);
?>
<?php   
    $koneksi = pg_connect("host=localhost port=5433 dbname=prakwebdb user=postgres password=220306");
    if (!$koneksi) {
        die("Koneksi database gagal: " . pg_last_error()); 
    }
 
?>

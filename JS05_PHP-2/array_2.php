<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #f9f9f9, #e0f7fa);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan' ];

    echo "Nama : {$Dosen ['nama']} <br>";
    echo "Domisili : {$Dosen ['domisili']} <br>";
    echo "Jenis_Kelamin : {$Dosen ['jenis_kelamin']} <br>";
    ?>
</body>
</html>
<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "documents/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);
    
    // === Validasi untuk gambar ===
    $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $maxFileSize = 2 * 1024 * 1024; 

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . $fileName;
        
        // === Validasi tipe file gambar ===
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $fileSize = $_FILES['files']['size'][$i];
        $fileTmpName = $_FILES['files']['tmp_name'][$i];
        
        // Validasi ekstensi file
        if (!in_array($fileExtension, $allowedImageTypes)) {
            echo "Error: File $fileName ditolak. Hanya format JPG, JPEG, PNG, GIF, dan WEBP yang diizinkan.<br>";
            continue;
        }
        
        // Validasi ukuran file
        if ($fileSize > $maxFileSize) {
            echo "Error: File $fileName terlalu besar. Maksimal ukuran file adalah 2MB.<br>";
            continue;
        }
        
        // Validasi apakah file benar-benar gambar
        $checkImage = getimagesize($fileTmpName);
        if ($checkImage === false) {
            echo "Error: File $fileName bukan gambar yang valid.<br>";
            continue;
        }
 
        // Pindahkan file yang diunggah ke direktori penyimpanan
        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
            echo "File $fileName berhasil diunggah.<br>";
        } else {
            echo "Gagal mengunggah file $fileName.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
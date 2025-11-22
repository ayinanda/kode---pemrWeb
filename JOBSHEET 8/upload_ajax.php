<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $extensions = array("jpg", "jpeg", "png", "gif", "webp");
    $max_file_size = 2097152; // 2MB
    
    $file_count = count($_FILES['files']['name']);
    
    for ($i = 0; $i < $file_count; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];
        
        // Mendapatkan ekstensi file
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Validasi ekstensi file
        if (!in_array($file_ext, $extensions)) {
            $errors[] = "File $file_name: Ekstensi file yang diizinkan adalah JPG, JPEG, PNG, GIF, atau WEBP.";
            continue;
        }

        // Validasi ukuran file
        if ($file_size > $max_file_size) {
            $errors[] = "File $file_name: Ukuran file tidak boleh lebih dari 2 MB";
            continue;
        }
        
        // Validasi apakah file benar-benar gambar
        $check_image = getimagesize($file_tmp);
        if ($check_image === false) {
            $errors[] = "File $file_name: File bukan gambar yang valid";
            continue;
        }
        
        // Pindahkan file ke direktori
        if (move_uploaded_file($file_tmp, "documents/". $new_file_name)) {
            echo "File $file_name berhasil diunggah sebagai $new_file_name.<br>";
        } else {
            $errors[] = "File $file_name: Gagal mengunggah file";
        }
    }
    
    // Tampilkan error jika ada
    if (!empty($errors)) {
        echo "<br>Error:<br>" . implode("<br>", $errors);
    }
}
?>
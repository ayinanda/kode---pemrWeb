<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Anggota</h2>
        <form action="proses.php?aksi=tambah" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <div class ="radio-group">
                <input type="radio" name="jenis_kelamin" value="L" id="laki" required> <label for="laki">Laki-laki</label>
                <input type="radio" name="jenis_kelamin" value="P" id="perempuan" required> <label for="perempuan"><label for="perempuan">Perempuan</label>
            </div>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="no_telp">No. Telp:</label>
            <input type="text" id="no_telp" name="no_telp" required>

            <button type="submit" class="btn-submit">Simpan Data</button>
            <a href="index.php" class="btn-kembali">Kembali</a>
        </form>
    </div>
</body>
</html>

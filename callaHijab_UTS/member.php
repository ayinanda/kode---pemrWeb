<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$display = $_SESSION['display_name'];
$profile = null;
$uploadsDir = 'assets/uploads/';

foreach (glob($uploadsDir."profile_{$username}.*") as $file) {
$profile = $file; 
break; 
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Member - Calla Hijab</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-light bg-cream shadow-sm">
<div class="container">
    <a class="navbar-brand" href="index.php">Calla Hijab</a>
<div>
<span class="me-3">Halo, <?=htmlspecialchars($display)?></span>
<a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
</div>
 </div>
</nav>

<main class="container py-5">
  <h3>Member Area</h3>
  <p class="text-muted">Isi data diri dan upload foto profil kamu yuk!.</p>

  <div class="row">
    <div class="col-md-4">
      <?php 
    if($profile): ?>
        <img src="<?=$profile?>" class="img-fluid rounded mb-3" alt="profile">
      <?php 
    else: 
    ?>
        <div class="border rounded p-5 text-center text-muted">Belum ada foto profil</div>
      <?php 
    endif; 
    ?>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="as" value="member">
        <div class="mb-2"><label class="form-label">Nama</label><input class="form-control" name="name" required></div>
        <div class="mb-2"><label class="form-label">Foto Profil</label>
        <input type="file" name="profile" accept="image/*" class="form-control" required></div>
        <div>
        <button class="btn btn-dark">Upload</button></div>
      </form>
    </div>

    <div class="col-md-8">`
      <h5>Katalog (preview)</h5>
      <p class="text-muted">Chekcout ur wishlist product now! <strong>Tambah ke keranjang</strong>.</p>
      <a href="index.php#pashmina" class="btn btn-outline-secondary">Kembali ke katalog</a>
    </div>
  </div>
</main>
</body>
</html>

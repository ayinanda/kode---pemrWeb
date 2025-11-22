<?php
require 'includes/session_check.php';
if($_SESSION['role'] !== 'admin'){ header('Location: index.php'); exit; }
$membersFile = 'data/members.json';
$members = [];
if(file_exists($membersFile)){
  $members = json_decode(file_get_contents($membersFile), true) ?? [];
}
$profile = null;
foreach (glob('assets/uploads/profile_admin.*') as $f){ $profile = $f; break; }

// load orders
$ordersFile = 'data/orders.json';
$orders = [];
if(file_exists($ordersFile)){
  $orders = json_decode(file_get_contents($ordersFile), true) ?? [];
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin - Calla Hijab</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-light bg-cream shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">Calla Hijab</a>
    <div>
      <span class="me-3">Admin</span>
      <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
    </div>
  </div>
</nav>

<main class="container py-5">
  <h3>Admin Dashboard</h3>
  <div class="row">
    <div class="col-md-4">
      <?php if($profile): ?>
        <img src="<?=$profile?>" class="img-fluid rounded mb-3">
      <?php else: ?>
        <div class="border rounded p-5 text-center text-muted">Belum ada foto admin</div>
      <?php endif; ?>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="as" value="admin">
        <div class="mb-2"><label class="form-label">Upload Foto Admin</label><input type="file" 
        name="profile" 
        accept="image/*" 
        class="form-control" required></div>
        <div><button class="btn btn-dark">Upload</button></div>
      </form>
    </div>
    <div class="col-md-8">
      <h5>Daftar member yang sudah upload</h5>
      <?php if(empty($members)): 
        ?>
        <p class="text-muted">Belum ada member yang upload.</p>
      <?php else: ?>
        <ul class="list-group mb-4">
          <?php foreach($members as $m): ?>
            <li class="list-group-item d-flex align-items-center">
              <img src="<?=htmlspecialchars($m['photo'])?>" width="60" class="rounded me-3" alt="">
              <div>
                <strong><?=htmlspecialchars($m['name'])?></strong><br>
                <small class="text-muted">username: <?=htmlspecialchars($m['username'])?></small>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <h5>Daftar Checkout Member</h5>
      <?php if(empty($orders)): ?>
        <p class="text-muted">Belum ada order dari member.</p>
      <?php else: ?>
        <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>Tanggal</th><th>User</th><th>Produk</th><th>Total</th><th>Alamat</th></tr></thead>
          <tbody>
            <?php foreach(array_reverse($orders) as $ord): ?>
              <tr>
                <td><?=htmlspecialchars($ord['date'] ?? '') ?></td>
                <td>
                  <strong><?=htmlspecialchars($ord['display_name'] ?? $ord['username'])?></strong><br>
                  <small class="text-muted"><?=htmlspecialchars($ord['username'])?></small>
                </td>
                <td>
                  <ul class="mb-0">
                    <?php foreach($ord['items'] as $it): ?>
                      <li><?=htmlspecialchars($it['title'])?> — <?=intval($it['qty'])?> x Rp<?=number_format($it['price'],0,',','.')?></li>
                    <?php endforeach; ?>
                  </ul>
                </td>
                <td>Rp<?=number_format($ord['total'],0,',','.')?></td>
                <td>
                  <?=nl2br(htmlspecialchars($ord['address'] ?? ''))?><br>
                  <small class="text-muted"><?=htmlspecialchars($ord['phone'] ?? '')?></small>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
</body>
</html>
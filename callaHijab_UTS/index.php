<?php
session_start();
$remembered = isset($_COOKIE['calla_remember']) ? $_COOKIE['calla_remember'] : '';
$products = [
  ['id'=>1,'title'=>'Pashmina Viscose - Latte sand','desc'=>'Lembut, jatuh, nyaman','img'=>'assets/uploads/produk/pashmina_viscose2.jpeg','type'=>'pashmina','price'=>75000],
  ['id'=>2,'title'=>'Voal Premium - Cloud','desc'=>'Ringan & breathable','img'=>'assets/uploads/produk/pashmina_voal.jpeg','type'=>'voal','price'=>70000],
  ['id'=>3,'title'=>'Silk luxury - Rose Gold','desc'=>'Elegan untuk acara formal','img'=>'assets/uploads/produk/silk.jpeg','type'=>'ceruty','price'=>90000],
  ['id'=>4,'title'=>'Segi empat polos - Baby Pink','desc'=>'Basic, timeless','img'=>'assets/uploads/produk/segi4_2.jpeg','type'=>'segi','price'=>65000],
  ['id'=>5,'title'=>'Segi empat motif - Creamy beige','desc'=>'Cheerful, dreamy','img'=>'assets/uploads/produk/segi4_motif.jpeg','type'=>'segi','price'=>68000],
  ['id'=>6,'title'=>'Bella Square - Latte','desc'=>'Soft, stylish','img'=>'assets/uploads/produk/Bella_square3.jpeg','type'=>'segi','price'=>72000],
  ['id'=>7,'title'=>'Bergo Instan - Classic Maroon','desc'=>'Praktis & rapi','img'=>'assets/uploads/produk/bergo.jpeg','type'=>'bergo','price'=>80000],
];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Calla Hijab — Koleksi</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    referrerpolicy="no-referrer"
  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-cream fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">Calla Hijab</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMain"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link scroll" href="#pashmina">Pashmina</a></li>
        <li class="nav-item"><a class="nav-link scroll" href="#segiempat">Segi Empat</a></li>
        <li class="nav-item"><a class="nav-link scroll" href="#bergo">Bergo</a></li>
      </ul>
      <div class="d-flex align-items-center">

        <!-- logika untuk menampilkan nama pengguna dan tombol dashboard/logout -->
        <?php if(isset($_SESSION['role'])): ?>
          <span class="me-2 small text-muted">Halo, <?=htmlspecialchars($_SESSION['username'])?></span>
          <a href="<?= $_SESSION['role']==='admin' ? 'admin.php' : 'member.php' ?>" class="btn btn-outline-dark me-2">Dashboard</a>
          <a href="logout.php" class="btn btn-danger btn-sm me-2">Logout</a>
        <?php else: ?>
          <button class="btn btn-dark me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <?php endif; ?>

        <!-- Cart icon (only for members) -->
        <?php if(isset($_SESSION['role']) && $_SESSION['role']==='member'): ?>
          <button id="cartBtn" class="btn btn-outline-dark position-relative" data-bs-toggle="modal" data-bs-target="#cartModal" title="Keranjang Belanja">
            <i class="fa-solid fa-cart-shopping"></i>
            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display:none">0</span>
          </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<header class="banner d-flex align-items-center justify-content-center text-center">
  <div class="container">
    <h1 class="display-3">Calla Hijab ⋆.˚ ☾⭒.˚</h1>
    <p class="lead text-muted">Soft • Elegant • Timeless</p>
    <p class="lead text-muted">Find your perfectly match hijab's style here</p>
    <a class="btn btn-outline-dark mt-3" href="#pashmina">Lihat Koleksi</a>
  </div>
</header>

<main class="container py-5">
  <!-- kategori Pashmina -->
  <section id="pashmina" class="mb-5">
    <h3 class="section-title">Pashmina</h3>
    <div class="row g-4">
      <?php foreach($products as $p): ?>
        <?php if($p['type']==='pashmina' || $p['type']==='voal' || $p['type']==='ceruty'): ?>
        <div class="col-md-4">
          <div class="card product-card h-100">
            <img src="<?=$p['img']?>" class="card-img-top" alt="">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?=$p['title']?></h5>
              <p class="card-text text-muted"><?=$p['desc']?></p>
              <p class="fw-bold">Rp<?= number_format($p['price'],0,',','.') ?></p>
              <div class="mt-auto">
                <?php if(isset($_SESSION['role']) && $_SESSION['role']==='member'): ?>
                  <button class="btn btn-primary w-100 add-cart" data-id="<?=$p['id']?>" data-title="<?=htmlspecialchars($p['title'], ENT_QUOTES)?>" data-price="<?=$p['price']?>" data-img="<?=$p['img']?>">Tambah ke Keranjang</button>
                <?php else: ?>
                  <button class="btn btn-outline-secondary w-100" title="Login sebagai member untuk tambah ke keranjang">Lihat</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- kategori Segi Empat -->
  <section id="segiempat" class="mb-5">
    <h3 class="section-title">Segi Empat</h3>
    <div class="row g-4">
      <?php foreach($products as $p): ?>
        <?php if($p['type']==='segi'): ?>
        <div class="col-md-4">
          <div class="card product-card h-100">
            <img src="<?=$p['img']?>" class="card-img-top" alt="">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?=$p['title']?></h5>
              <p class="card-text text-muted"><?=$p['desc']?></p>
              <p class="fw-bold">Rp<?= number_format($p['price'],0,',','.') ?></p>
              <div class="mt-auto">
                <?php if(isset($_SESSION['role']) && $_SESSION['role']==='member'): ?>
                  <button class="btn btn-primary w-100 add-cart"
                   data-id="<?=$p['id']?>" 
                   data-title="<?=htmlspecialchars($p['title'], ENT_QUOTES)?>" 
                   data-price="<?=$p['price']?>" data-img="<?=$p['img']?>">Tambah ke Keranjang</button>
                <?php else: ?>
                  <button class="btn btn-outline-secondary w-100">Lihat</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- kategori Bergo -->
  <section id="bergo" class="mb-5">
    <h3 class="section-title">Bergo</h3>
    <div class="row g-4">
      <?php foreach($products as $p): ?>
        <?php if($p['type']==='bergo'): ?>
        <div class="col-md-4">
          <div class="card product-card h-100">
            <img src="<?=$p['img']?>" class="card-img-top" alt="">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?=$p['title']?></h5>
              <p class="card-text text-muted"><?=$p['desc']?></p>
              <p class="fw-bold">Rp<?= number_format($p['price'],0,',','.') ?></p>
              <div class="mt-auto">
                <?php if(isset($_SESSION['role']) && $_SESSION['role']==='member'): ?>
                  <button class="btn btn-primary w-100 add-cart" data-id="<?=$p['id']?>" data-title="<?=htmlspecialchars($p['title'], ENT_QUOTES)?>" data-price="<?=$p['price']?>" data-img="<?=$p['img']?>">Tambah ke Keranjang</button>
                <?php else: ?>
                  <button class="btn btn-outline-secondary w-100">Lihat</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Keranjang Belanja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="cart-empty" class="text-center py-4">
          <p class="text-muted">Keranjangmu masih kosong. Tambahkan produk dari katalog.</p>
        </div>
        <div id="cart-list" style="display:none;">
          <table class="table align-middle">
            <thead><tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th></th></tr></thead>
            <tbody id="cart-items"></tbody>
          </table>
          <div class="d-flex justify-content-between align-items-center">
            <div><strong>Total:</strong> <span id="cart-total">Rp0</span></div>
            <div>
              <button id="clear-cart" class="btn btn-outline-danger btn-sm">Kosongkan</button>
              <button id="to-checkout" class="btn btn-primary">Lanjut ke Checkout</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Login Modal (unchanged) -->
<div class="modal fade" id="loginModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title">Login Calla Hijab</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
         </div>
        <div class="modal-body">
            <?php 
            if(isset($_COOKIE['login_error_msg'])): 
            ?>
            <div class="alert alert-danger"><?=htmlspecialchars($_COOKIE['login_error_msg'])?></div>
            <?php endif; 
            ?>
            <!-- Form Login -->
            <form id="loginForm" action="login.php" method="post">
            <div class="mb-2">
            <label class="form-label">Username</label>
            <input name="username" id="username" class="form-control" value="<?=htmlspecialchars($remembered)?>">
            </div>
            <div class="mb-2">
            <label class="form-label">Password</label>
            <input name="password" id="password" type="password" class="form-control">
            </div>
            <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label">Remember me</label>
            </div>
            <div class="d-grid">
            <button class="btn btn-dark">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="container">
    <div class="footer-content">
      <h3>Contact Us</h3>
      <p>Email: callahijab@gmail.com</p>
      <p>Phone: +6281673987625</p>
      <p>Address: Jl. Bridge Vactory No. 25</p>
    </div>

   <div class="footer-content">
  <h3>Quick Links</h3>
  <ul class="list">
    <li><a href="#pashmina" class="scroll">Pashmina</a></li>
    <li><a href="#segiempat" class="scroll">Segi Empat</a></li>
    <li><a href="#bergo" class="scroll">Bergo</a></li>
  </ul>
</div>

  <div class="footer-content">
  <h3>Follow Us</h3>
  <ul class="social-icons">
    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
  </ul>
</div>

  </div>
  <div class="bottom-bar">
    <p>&copy; 2025 Calla Hijab. All rights reserved</p>
  </div>
  <button id="scrollToTopBtn" title="Kembali ke atas">↑</button>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
<script>
    $(document).ready(function(){ 
    <?php if(isset($_COOKIE['login_error_msg'])): ?>
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal')); 
        loginModal.show();
    <?php endif; ?>
});
</script>
</body>
</html>
<?php
session_start();

$USERS = [
  'admin'=>['password'=>'admin123','role'=>'admin','name'=>'Admin Calla'],
  'admin2'=>['password'=>'admin456','role'=>'admin','name'=>'Admin Calla'],
  'gargarina'=>['password'=>'member123','role'=>'member','name'=>'Member Calla'],
  'ayin'=>['password'=>'member456','role'=>'member','name'=>'Member Calla'],
  'nanda'=>['password'=>'member789','role'=>'member','name'=>'Member Calla']
];
// proses login
if($_SERVER['REQUEST_METHOD'] === 'POST'){ // dari form login
  $u = trim($_POST['username'] ?? ''); // ambil inputan username
  $p = trim($_POST['password'] ?? ''); // ambil password
  $remember = isset($_POST['remember']) && $_POST['remember'] === 'true'; // jika checkbox ingat saya dicentang, maka true

  // Validasi input kosong
  if($u === '' || $p === ''){
    setcookie('login_error_msg','Username/password tidak boleh kosong', time()+3, '/');
    header('Location: index.php');
    exit;
  }

  // Validasi username/password
  if(isset($USERS[$u]) && $USERS[$u]['password'] === $p){ // cek username ada di 
    $_SESSION['username'] = $u;
    $_SESSION['role'] = $USERS[$u]['role'];
    $_SESSION['display_name'] = $USERS[$u]['name'];

    // set cookie jika ingat saya (calla)
    if($remember){
      setcookie('calla_remember', $u, time()+60*60*24*30, '/'); 
    } else {
      setcookie('calla_remember','', time()-3600, '/');
    }

    if($_SESSION['role'] === 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: member.php');
    }
    exit;
  } else {
    // Salah username/password
    setcookie('login_error_msg','Username/password salah', time()+3, '/');
    header('Location: index.php');
    exit;
  }
}

header('Location: index.php');
exit;

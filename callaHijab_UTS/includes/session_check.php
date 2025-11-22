<?php
session_start();

if (!isset($_SESSION['role'])) {
    // Kalau belum login sama sekali
    header("Location: login.php");
    exit();
}

// Kalau user adalah admin tapi buka halaman member
if ($_SESSION['role'] === 'admin' && basename($_SERVER['PHP_SELF']) === 'member.php') {
    header("Location: admin.php");
    exit();
}

// Kalau user adalah member tapi buka halaman admin
if ($_SESSION['role'] === 'member' && basename($_SERVER['PHP_SELF']) === 'admin.php') {
    header("Location: member.php");
    exit();
}
?>

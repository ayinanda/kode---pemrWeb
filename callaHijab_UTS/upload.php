<?php
require 'includes/session_check.php';
$uploadsDir = 'assets/uploads/'; 
if(!is_dir($uploadsDir)) mkdir($uploadsDir, 0755, true); 

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_FILES['profile'])) { // jika ada file diupload
  $as = $_POST['as'] ?? ($_SESSION['role'] ?? ''); // apakah sebagai admin atau member
  $file = $_FILES['profile']; 

  $allowed = ['image/jpeg','image/png','image/webp', 'image/jpg'];
  if($file['error']!==0){ 
    $_SESSION['upload_error']='Upload gagal.'; 
    header('Location: '.$_SERVER['HTTP_REFERER']); 
    exit; 
}
  if(!in_array(mime_content_type($file['tmp_name']), $allowed)) { // cek tipe file
    $_SESSION['upload_error']='Tipe file tidak didukung.'; 
    header('Location: '.$_SERVER['HTTP_REFERER']); exit; 
}
  // simpan file
  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $safeName = ($as === 'admin') ? 'profile_admin' : 'profile_'.preg_replace('/[^a-z0-9_\-]/i','', $_SESSION['username']);
  $target = $uploadsDir . $safeName . '.' . $ext;

  foreach (glob($uploadsDir . $safeName . '.*') as $old) @unlink($old);

  if(move_uploaded_file($file['tmp_name'], $target)){
    if($as === 'member'){
      $membersFile = 'data/members.json';
      if(!is_dir('data')) mkdir('data',0755,true);
      $members = file_exists($membersFile) ? json_decode(file_get_contents($membersFile), true) : [];
      $exists = false;

      foreach($members as $k=>$m){
        if($m['username'] === $_SESSION['username']) { 
        $members[$k]['photo']=$target; $exists=true; 
        break; 
        }
    }
    if(!$exists){
        $members[] = ['username'=>$_SESSION['username'],'name'=>($_POST['name'] ?? $_SESSION['display_name']),'photo'=>$target];
    }
    file_put_contents($membersFile, json_encode($members, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));
    }
    $_SESSION['upload_success']='Foto tersimpan.';
  } else {
    $_SESSION['upload_error']='Gagal memindahkan file.';
  }
}
header('Location: '.$_SERVER['HTTP_REFERER']);
exit;

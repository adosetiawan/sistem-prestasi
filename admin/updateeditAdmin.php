<?php

include '../config/koneksi.php';
include '../config/session.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

  $query = "UPDATE tb_admin SET
     admin_username='" . $username . "', 
     " . (!empty($password)?'admin_password = "'.md5($password).'",':null) . "
     admin_nama='" . $nama . "', 
     admin_status='" . $status . "' ,
     admin_email='" . $email . "',
     admin_telp='" . $telepon . "'
     WHERE admin_id = '" . $id . "'";
    //  print_r( $query);
    //  exit;
  $eksekusi = mysqli_query($koneksi, $query);
  
  if ($eksekusi) {
    header('location:admin.php', true, 301);
  }else{
    echo '<script>
    alert("data gagal di update periksa query anda");
    window.history.back()</script>';
    exit;
  }
} else {
    echo '<script>
    alert("inputan ditolak");
    window.history.back()</script>';
    exit;
  }


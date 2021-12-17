<?php

include '../config/koneksi.php';
include '../config/session.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['status'];
  $countuser = mysqli_query($koneksi, 'SELECT * FROM tb_admin WHERE admin_username = "'.$username.'"');
    if(mysqli_num_rows($countuser)==0){
        $query = "INSERT INTO tb_admin(admin_nama, admin_username, admin_password, admin_status, admin_email, admin_telp) VALUES ('" . $nama . "', '" . $username . "', '" . $password . "',  '" . $status . "', '" . $email . "', '" . $telepon . "')";
        $eksekusi = mysqli_query($koneksi, $query);
    
        if ($eksekusi) {
        header('location:admin.php', true, 301);
        }else{
        echo '<script>
        alert("data gagal di hapus query anda");
        window.history.back()</script>';
        exit;
        }
    }else{
        echo '<script>
        alert("Username sudah digunakan");
        window.history.back()</script>';
        exit;
    }
} else {
    echo '<script>
    alert("inputan ditolak");
    window.history.back()</script>';
    exit;
    }

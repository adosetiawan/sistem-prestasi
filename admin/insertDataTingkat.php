<?php

include '../config/koneksi.php';
include '../config/session.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama-tingkat'];
  $query = "INSERT INTO tb_tingkat(tingkat_nama) VALUES ('" . $nama . "')";
  $eksekusi = mysqli_query($koneksi, $query);
  if ($eksekusi) {
    header('location:tingkat.php', true, 301);
  }else{
    echo '<script>
    alert("data gagal di input periksa query anda");
    window.history.back()</script>';
    exit;
  }
} else {
    echo '<script>
    alert("inputan tidak diterima");
    window.history.back()</script>';
    exit;
  }

?>
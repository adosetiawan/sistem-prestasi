<?php

include '../config/koneksi.php';
include '../config/session.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id-tingkat'];
    $nama = $_POST['nama-tingkat'];
    $query = "UPDATE tb_tingkat SET tingkat_nama = '" . $nama . "' WHERE tingkat_id = '".$id."'";
    $eksekusi = mysqli_query($koneksi, $query);
  if ($eksekusi) {
    header('location:tingkat.php', true, 301);
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


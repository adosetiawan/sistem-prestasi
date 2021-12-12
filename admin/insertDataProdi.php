<?php

include '../config/koneksi.php';

if (isset($_POST['submit'])) {
  $kode = $_POST['kode-prodi'];
  $nama = $_POST['nama-prodi'];
  $query = "INSERT INTO tb_prodi(prodi_kode, prodi_nama) VALUES ('" . $kode . "', '" . $nama . "')";
  $eksekusi = mysqli_query($koneksi, $query);
  if ($eksekusi) {
    header('location:prodi.php', true, 301);
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
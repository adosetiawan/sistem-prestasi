<?php

include '../config/koneksi.php';
include '../config/session.php';
if (isset($_POST['submit'])) {
    $kode = $_POST['kode-prodi'];
    $nama = $_POST['nama-prodi'];
    $query = "UPDATE tb_prodi SET prodi_nama = '" . $nama . "' WHERE prodi_kode = '".$kode."'";
    $eksekusi = mysqli_query($koneksi, $query);
  if ($eksekusi) {
    header('location:prodi.php', true, 301);
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


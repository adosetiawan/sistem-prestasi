<?php
include '../config/koneksi.php';

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    $query = "DELETE FROM `tb_prodi` WHERE `tb_prodi`.`prodi_kode` ='" . $kode . "'";
    $eksekusi = mysqli_query($koneksi, $query);
  
    if ($eksekusi) {
        header('location:prodi.php', true, 301);
    }
} else {
    echo '<script>
    alert("data gagal di hapus query anda");
    window.history.back()</script>';
    exit;
}

?>
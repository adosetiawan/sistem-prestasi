<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM `tb_tingkat` WHERE `tb_tingkat`.`tingkat_id` ='" . $id . "'";
    $eksekusi = mysqli_query($koneksi, $query);
  
    if ($eksekusi) {
        header('location:tingkat.php', true, 301);
    }
} else {
    echo '<script>
    alert("data gagal di hapus query anda");
    window.history.back()</script>';
    exit;
}

?>
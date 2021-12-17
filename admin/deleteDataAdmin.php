<?php
include '../config/koneksi.php';
include '../config/session.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // print_r($id);
    // exit;
    $query = "DELETE FROM `tb_admin` WHERE `tb_admin`.`admin_id` ='" . $id . "'";
    $eksekusi = mysqli_query($koneksi, $query);
  
    if ($eksekusi) {
        header('location:admin.php', true, 301);
    }
} else {
    echo '<script>
    alert("data gagal di hapus query anda");
    window.history.back()</script>';
    exit;
}

?>
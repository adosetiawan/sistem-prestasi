<?php
include '../config/koneksi.php';
include '../config/session.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM `tb_prestasi` WHERE `tb_prestasi`.`prs_id` ='" . $id . "'";
    $eksekusi = mysqli_query($koneksi, $query);
  
    if ($eksekusi) {
        header('location:prestasi.php', true, 301);
    }
} else {
    echo 'data gagal dihapus';
}

?>
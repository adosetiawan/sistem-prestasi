<?php
include '../config/koneksi.php';
include '../config/session.php';
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query = "DELETE FROM `tb_prestasi` WHERE `tb_mahasiswa`.`prs_mhs_nim` ='" . $nim . "'";
    $eksekusi = mysqli_query($koneksi, $query);
  
    if ($eksekusi) {
        header('location:prestasi.php', true, 301);
    }
} else {
    echo 'data gagal dihapus';
}

?>
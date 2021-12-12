<?php
include '../config/koneksi.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query = "DELETE FROM `tb_mahasiswa` WHERE `tb_mahasiswa`.`mhs_nim` ='" . $nim . "'";
    $eksekusi = mysqli_query($koneksi, $query);
  
    if ($eksekusi) {
        header('location:mahasiswa.php', true, 301);
    }
} else {
    echo '<script>
    alert("data gagal di hapus query anda");
    window.history.back()</script>';
    exit;
}

?>
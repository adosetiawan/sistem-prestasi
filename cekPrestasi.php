<?php
include 'config/koneksi.php';
if (isset($_POST['nim'])) {
    $nim = (int)$_POST['nim'];
    $query = 'SELECT * FROM tb_mahasiswa WHERE mhs_nim = ' . $nim . '';
    $countuser = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($countuser)>0) {
        header('location:detail.php?nim='.$_POST['nim'], true, 301);
    } else {
        echo '<script>
        alert("NIM Mahasiswa tidak ditemukan.");
        window.history.back()</script>';
        exit;
    }
} else {
    echo '<script>
    alert("inputan ditolak");
    window.history.back()</script>';
    exit;
}

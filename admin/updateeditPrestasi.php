<?php

include '../config/koneksi.php';
include '../config/session.php';
if (isset($_POST['submit'])) {
  $mahasiswaid = $_POST['mahasiswa-id'];
  $tgllomba = $_POST['tgl-lomba'];
  $tingkat = $_POST['tingkat'];
  $jenislomba = $_POST['jenis-lomba'];
  $bukti = $_POST['bukti'];
  $namaprestasi = $_POST['nama-prestasi'];
  $peringkat = $_POST['peringkat'];
  $query = "UPDATE tb_prestasi SET prs_nama = '" . $namaprestasi . "', prs_tgl_lomba ='" . $tgllomba . "' , prs_tingkat_id = '" . $tingkat . "' , prs_jenis_lomba =  '" . $jenislomba . "' , prs_peringkat = '" . $peringkat . "' , prs_bukti = '" . $bukti . "', prs_mhs_nim = '" . $mahasiswaid . "' WHERE prs_mhs_nim = '".$mahasiswaid."'";
  $eksekusi = mysqli_query($koneksi, $query);

  if ($eksekusi) {
    header('location:prestasi.php', true, 301);
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
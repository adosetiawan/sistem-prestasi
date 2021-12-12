<?php

include '../config/koneksi.php';

if (isset($_POST['submit'])) {
  $mahasiswaid = $_POST['mahasiswa-id'];
  $tgllomba = $_POST['tgl-lomba'];
  $tingkat = $_POST['tingkat'];
  $jenislomba = $_POST['jenis-lomba'];
  $bukti = $_POST['bukti'];
  $namaprestasi = $_POST['nama-prestasi'];
  $peringkat = $_POST['peringkat'];
  
  $query = "INSERT INTO tb_prestasi(prs_nama, prs_tgl_lomba, prs_tingkat_id, prs_jenis_lomba, prs_peringkat, prs_bukti, prs_mhs_nim) VALUES ('" . $namaprestasi . "', '" . $tgllomba . "', '" . $tingkat . "',  '" . $jenislomba . "','" . $peringkat . "',  '" . $bukti . "', '" . $mahasiswaid . "')";
//   print_r($query);
//   exit;
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
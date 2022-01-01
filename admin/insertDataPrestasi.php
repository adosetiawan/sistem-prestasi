<?php

include '../config/koneksi.php';
include '../config/session.php';
require_once '../library/cart.php';
$cart = new Cart;

if (isset($_POST['submit'])) {
  $mahasiswaid = $_POST['mahasiswa-id'];
  $tgllomba = $_POST['tgl-lomba'];
  $tingkat = $_POST['tingkat'];
  $jenislomba = $_POST['jenis-lomba'];
  $bukti = $_POST['bukti'];
  $namaprestasi = $_POST['nama-prestasi'];
  $peringkat = $_POST['peringkat'];
  
  $query = "INSERT INTO tb_prestasi(prs_nama, prs_tgl_lomba, prs_tingkat_id, prs_jenis_lomba, prs_peringkat, prs_bukti, prs_mhs_nim) VALUES ('" . $namaprestasi . "', '" . $tgllomba . "', '" . $tingkat . "',  '" . $jenislomba . "','" . $peringkat . "',  '" . $bukti . "', '" . $mahasiswaid . "')";
  $eksekusi = mysqli_query($koneksi, $query);
  if ($eksekusi) {
    $id = mysqli_insert_id($koneksi);
    if($cart->total_items()>0){
      foreach($cart->contents() as $filename){
      $file = 'INSERT INTO `tb_prestasi_file` (`prs_file_prsid`, `prs_file_nama`, `prs_file_size`, `prs_file_extension`,`prs_file_date`) VALUES ("'.$id.'", "'.$filename['name'].'", "'.$filename['price'].'", "'.pathinfo($filename['name'],FILEINFO_EXTENSION).'","'.DATE('Y-m-d').'")';
        $eksekusi = mysqli_query($koneksi,$file);
      }
      $cart->destroy();
    }
    header('location:prestasi.php', true, 301);
    exit;
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
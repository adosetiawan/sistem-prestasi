<?php

include '../config/koneksi.php';
include '../config/session.php';
if (isset($_POST['submit'])) {
  $nimMahasiswa = $_POST['nim'];
  $namaMahasiswa = $_POST['nama'];
  $tanggalLahir = $_POST['tgl_lahir'];
  $alamat = $_POST['alamat'];
  $prodi = $_POST['prodi'];
  $telpon = $_POST['telp'];
  $email = $_POST['email'];

  $query = "INSERT INTO tb_mahasiswa(mhs_nim, mhs_nama, mhs_tgl_lahir, mhs_alamat, mhs_prodi_kode, mhs_telp, mhs_email) VALUES ('" . $nimMahasiswa . "', '" . $namaMahasiswa . "', '" . $tanggalLahir . "',  '" . $alamat . "', '" . $prodi . "', '" . $telpon . "', '" . $email . "')";
  $eksekusi = mysqli_query($koneksi, $query);

  if ($eksekusi) {
    header('location:mahasiswa.php', true, 301);
  }else{
    echo '<script>
    alert("data gagal di hapus query anda");
    window.history.back()</script>';
    exit;
  }
} else {
  echo '<script>
  alert("inputan ditolak");
  window.history.back()</script>';
  exit;
  }

?>
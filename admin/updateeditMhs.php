<?php

include '../config/koneksi.php';

if (isset($_POST['submit'])) {
  $nimMahasiswa = $_POST['nim'];
  $namaMahasiswa = $_POST['nama'];
  $tanggalLahir = $_POST['tgl_lahir'];
  $alamat = $_POST['alamat'];
  $prodi = $_POST['prodi'];
  $telpon = $_POST['telp'];
  $email = $_POST['email'];

  $query = "UPDATE tb_mahasiswa SET mhs_nama='" . $namaMahasiswa . "', mhs_tgl_lahir='" . $tanggalLahir . "', mhs_alamat='" . $alamat . "', mhs_prodi_kode='" . $prodi . "', mhs_telp='" . $telpon . "', mhs_email='" . $email . "' WHERE mhs_nim = '" . $nimMahasiswa . "'";
  $eksekusi = mysqli_query($koneksi, $query);
  
  if ($eksekusi) {
    header('location:mahasiswa.php', true, 301);
  }else{
    echo '<script>
    alert("data gagal di update periksa query anda");
    window.history.back()</script>';
    exit;
  }
} else {
    echo '<script>
    alert("inputan ditolak");
    window.history.back()</script>';
    exit;
  }


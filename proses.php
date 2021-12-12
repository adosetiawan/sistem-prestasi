<?php
if(isset($_POST['submit'])){
  session_start();
    // koneksi ke DB
    $database = 'prestasi_mahasiswa';
    $username = 'root';
    $password = 'rootroot';
    $server = '127.0.0.1';
    $db_port = 3306;

    $koneksi = mysqli_connect($server, $username, $password, $database, $db_port);
    
    // // Check connection
    if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $querySelectUser = "SELECT * FROM tb_admin WHERE admin_username = '" . $_POST['username'] . "' AND admin_password = '" .md5($_POST['password']). "' AND admin_status = 'true'";
    $hasil = mysqli_query($koneksi, $querySelectUser);

    if (mysqli_num_rows($hasil) > 0) {
        $result = mysqli_fetch_array($hasil);
        $_SESSION['id'] = $result['admin_id'];
        $_SESSION['nama'] = $result['admin_nama'];
        $_SESSION['status'] = true;
        header('location:admin/mahasiswa.php');
        exit;
    } else {
      echo '<script>
      alert("Username atau Password salah");
      window.history.back()</script>';
    }
}else{
  echo '<script>
  alert("inputan ditolak");
  window.history.back()</script>';
  exit;
}
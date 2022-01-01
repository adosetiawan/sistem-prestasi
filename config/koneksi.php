<?php
error_reporting(1);
// koneksi ke DB
$database = 'prestasi_mahasiswa';
$username = 'root';
$password = 'rootroot';
$server = '127.0.0.1';
$db_port = 3306;

// Create connection
$koneksi = mysqli_connect($server, $username, $password, $database, $db_port);

// Check connection
if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

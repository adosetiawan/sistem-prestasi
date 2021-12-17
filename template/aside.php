
<?php
  $uri = isset($_SERVER["REQUEST_URI"])?explode('/',$_SERVER["REQUEST_URI"]):array();
?><!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <!-- <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">SISTEM PRESTASI <strong>MHS</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->


    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['nama'];?></a>
        </div>
      </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item menu-open">
        <a href="../admin/dashboard.php" class="nav-link <?=$uri[2]=='dashboard.php'?'active':'';?>">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
    
      </li>
        <li class="nav-header">Data Master</li>
        <li class="nav-item">
          <a href="../admin/prestasi.php" class="nav-link <?=$uri[2]=='prestasi.php'?'active':'';?>">
          <i class="nav-icon  fas fa-trophy"></i>
            <p>
              
              Data Prestasi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../admin/mahasiswa.php" class="nav-link <?=$uri[2]=='mahasiswa.php'?'active':'';?>">
          <i class="nav-icon  fas fa-user-graduate"></i>
            <p>
              Data Mahasiswa
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../admin/prodi.php" class="nav-link <?=$uri[2]=='prodi.php'?'active':'';?>">
          <i class="nav-icon fas fa-code-branch"></i>
            <p>
            Prodi Mahasiswa
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../admin/tingkat.php" class="nav-link <?=$uri[2]=='tingkat.php'?'active':'';?>">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>
            Tingkat Prestasi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../admin/admin.php" class="nav-link <?=$uri[2]=='admin.php'?'active':'';?>">
          <i class="nav-icon  fas fa-user-cog"></i>
            <p>
              Setting Admin
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../admin/logout.php" class="nav-link <?=$uri[2]=='logout.php'?'active':'';?>">
          <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
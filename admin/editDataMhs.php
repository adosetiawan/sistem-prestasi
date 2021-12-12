<?php 
include '../config/koneksi.php';
include '../config/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prestasi Mahasiwa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include '../template/nav.php'; ?>
    <?php include '../template/aside.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Edit Data Mahasiswa</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Biodata Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="updateeditMhs.php" method="POST">
                <?php
                    if(isset($_GET['nim'])){
                        $nim    =$_GET['nim'];
                    }
                    else {
                        die ("Error. No ID Selected!");    
                    }
            
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE mhs_nim='$nim'");
                    $result = mysqli_fetch_array($query);
                ?>

                  <div class="card-body row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIM Mahasiswa</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan NIM" name="nim" value="<?=$result['mhs_nim']?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Mahasiswa</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama" name="nama" value="<?=$result['mhs_nama']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" name="tgl_lahir" value="<?=$result['mhs_tgl_lahir']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Prodi</label>
                      <select class="form-control" name="prodi" id="">
                      <?php
        			            $query = mysqli_query($koneksi, "SELECT * FROM tb_prodi");
       				            while($data = mysqli_fetch_array($query)){
                          if($data['prodi_kode']==$result['mhs_prodi_kode']){
                            echo '<option value="'.$data['prodi_kode'].'" selected>'.$data['prodi_nama'].'</option>';
                          }else{
                            echo '<option value="'.$data['prodi_kode'].'">'.$data['prodi_nama'].'</option>';
                          }
                          }
                          ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <textarea class="form-control" name="alamat" id="" cols="30" rows="5"><?=$result['mhs_alamat']?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">No.Telp</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No.Telp" name="telp" value="<?=$result['mhs_telp']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Email" name="email" value="<?=$result['mhs_email']?>">
                    </div>
            
                  </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>--- Mahasiswa Informasi 2020 ---</a></strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/plugins/jszip/jszip.min.js"></script>
  <script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>
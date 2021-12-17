<?php
include '../config/koneksi.php';
include '../config/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prestasi Mahasiswa</title>

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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Prestasi Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Data Prestasi</a></li>
                <li class="breadcrumb-item active">Tabel Prestasi</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <a class="btn btn-info" data-toggle="collapse" href="#collapseOne">
                        Filter Prestasi <i class="fas fa-search"></i>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <a href="tambahDataPrestasi.php" class="btn bg-gradient-success float-right">Tambah Data Prestasi</a>
                    </div>
                  </div>
                  <div id="accordion">
                    <div class="card card-primary">

                      <div id="collapseOne" class="collapse <?=isset($_GET['tingkat'])?'show':'';?> " data-parent="#accordion">
                        <div class="card-body">
                          <form action="prestasi.php" method="GET">

                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="tingkat">Tingkat</label>
                              <select class="form-control" name="tingkat" id="tingkat">
                                <?php
                                include "../config/koneksi.php";
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_tingkat");
                                while ($data = mysqli_fetch_array($query)) {

                                  if (isset($_GET['tingkat']) && $data['tingkat_id'] == $_GET['tingkat']) {
                                    echo ' <option value="' . $data['tingkat_id'] . '" selected>' . $data['tingkat_nama'] . '
                                        </option>';
                                  } else {
                                    echo ' <option value="' . $data['tingkat_id'] . '">' . $data['tingkat_nama'] . '
                                        </option>';
                                  }
                                ?>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="Peringkat">Peringkat</label>
                              <div class="form-group">
                                <input type="number" class="form-control" id="peringkat" name="peringkat" value="<?=isset($_GET['peringkat'])?$_GET['peringkat']:'1';?>">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="Peringkat">Filter </label>
                              <div class="form-group">
                                <button type="submit" class="btn btn-info">Kirim <i class="fas fa-papper"></i></button>
                              </div>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-sm table-hover">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>NIM Mhs</th>
                        <th>Mahasiswa</th>
                        <th>Nama Prestasi</th>
                        <th>Peringkat</th>
                        <th>Tanggal</th>
                        <th>Tingkat</th>
                        <th>Prodi</th>

                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = '';
                    if(isset($_GET['tingkat'])){
                      $sql .= ' WHERE prs_tingkat_id = '.$_GET['tingkat'];
                    }

                    if(isset($_GET['peringkat'])){
                      $sql .= ' AND prs_peringkat = '.$_GET['peringkat'];
                    }

                    $query = 'SELECT * FROM tb_prestasi JOIN tb_mahasiswa ON prs_mhs_nim = mhs_nim JOIN tb_prodi ON prodi_kode = mhs_prodi_kode JOIN tb_tingkat ON tingkat_id = prs_tingkat_id '.$sql;
                    $mahasiswa = $koneksi->query($query);

                    ?>
                    <tbody>
                      <?php
                      $no = 1;
                      while ($data = $mahasiswa->fetch_array()) {
                      ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data['mhs_nim']; ?></td>
                          <td><?= $data['mhs_nama']; ?></td>
                          <td><?= $data['prs_nama']; ?></td>
                          <td class="text-center">
                            <span class="badge badge-info text-center">
                              <i class="fas fa-trophy"></i> Juara ke
                              <b style="font-size:17px"><?= $data['prs_peringkat']; ?></b>
                            </span>
                          </td>
                          <td><?= date('D,m-Y', strtotime($data['prs_tgl_lomba'])); ?></td>
                          <td><?= $data['tingkat_nama']; ?></td>
                          <td><?= $data['prodi_nama']; ?></td>

                          <td class="text-center"><a href="editDataPrestasi.php?nim=<?= $data['prs_mhs_nim']; ?>" class="btn btn-sm   bg-gradient-primary">EDIT</a> |
                            <a href="deleteDataPrestasi.php?nim=<?= $data['prs_mhs_nim']; ?>" class="btn  btn-sm  bg-gradient-danger">DELETE</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th>

                        <th>NIM Mhs</th>
                        <th>Nama Mhs</th>
                        <th>Nama Prestasi</th>
                        <th>Peringkat</th>
                        <th>Tanggal</th>
                        <th>Tingkat</th>
                        <th>Prodi</th>

                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
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
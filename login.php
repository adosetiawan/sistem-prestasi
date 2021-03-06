<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prestasi Mahasiswa</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background: url(assets/dist/img/bg.png);">
  <div class="login-box" style="width:400px">
    
    <!-- /.login-logo -->
    <div class="card shadow p-2" style="border: 3px solid #dee2e6;border-radius:12px">
      <div class="card-body login-card-body">
        <div class="login-logo">
          <a href=""><b>Sistem Informasi Prestasi Mahasiswa</b></a>
        </div>
        <form action="proses.php" method="post">
          <div class="form-group">
            <label for="">Username</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <div class="input-group mb-3">
              <input type="password" id="password" class="form-control" placeholder="Masukan Password" name="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                <input type="checkbox" id="show-password">
                <label for="show-password">
                  Lihat Password
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12 mt-4">
              <button type="submit" name="submit" style="background: #006e19;" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <div class="card-footer">

      </div>
      </div>
        <!-- jQuery -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <script>
          $(document).ready(function(){
            $('#show-password').click(function(){
              if(this.checked){
                $('#password').attr('type','text');
              }else{
                $('#password').attr('type','password');

              }
            });
          });
        </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    include 'config/koneksi.php';
} else {
    die("Error. No ID Selected!");
}
$query = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa JOIN tb_prodi ON prodi_kode = mhs_prodi_kode WHERE mhs_nim='$nim'");
$result = mysqli_fetch_array($query);

$query = 'SELECT * FROM tb_prestasi JOIN tb_mahasiswa ON prs_mhs_nim = mhs_nim JOIN tb_prodi ON prodi_kode = mhs_prodi_kode JOIN tb_tingkat ON tingkat_id = prs_tingkat_id WHERE  mhs_nim=' . $nim . '';

$prestasi = $koneksi->query($query);
?>

<head>
    <title>Sistem Prestasi Mahasiswa</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Documentation Template For Software Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- FontAwesome JS-->
    <script defer src="assets/web/fontawesome/js/all.min.js"></script>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="assets/web/plugins/simplelightbox/simple-lightbox.min.css">

    <link id="theme-style" rel="stylesheet" href="assets/web/css/theme.css">

</head>

<body>
<!-- <button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible me-2 d-xl-none" type="button">
    <span></span>
    <span></span>
    <span></span>
</button>
<div id="docs-sidebar" class="docs-sidebar"></div> -->
    <header class="header fixed-top">
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
                    <div class="site-logo"><a class="navbar-brand" href="index.php"><img class="logo-icon me-2" src="assets/web/images/unu-jogja.png" alt="logo">
                            <span class="logo-text">PRESTASI<span class="text-alt"> MAHASISWA</span></span></a></div>
                </div>
                <!--//docs-logo-wrapper-->
                <div class="docs-top-utilities d-flex justify-content-end align-items-center">

                    <ul class="social-list list-inline mx-md-3 mx-lg-5 mb-0 d-none d-lg-flex">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                    </ul>
                    <!--//social-list-->
                </div>
                <!--//docs-top-utilities-->
            </div>
            <!--//container-->
        </div>
        <!--//branding-->
    </header>
    <!--//header-->


    <!--//page-header-->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if($prestasi->num_rows>0){ ?>
                    <div class="callout-block callout-block-success">
                        <div class="content">
                            <h4 class="callout-title">
                                <i class="fas fas fa-info-circle"></i>
                                Informasi
                            </h4>
                            <p>Berhasil. Mahasiswa atas nama <b><?= !empty($result['mhs_nama']) ? $result['mhs_nama'] : ''; ?></b> memiliki <b><?=$prestasi->num_rows;?></b> Prestasi. Untuk informasi lebih lanjut silahkan klik detail. </p>
                        </div>
                    </div>
                    <?php } else {?>
                        <div class="callout-block callout-block-warning">
                        <div class="content">
                            <h4 class="callout-title">
                                <i class="fas fas fa-info-circle"></i>
                                Informasi
                            </h4>
                            <p>Prestasi Mahasiswa atas nama <b><?= !empty($result['mhs_nama']) ? $result['mhs_nama'] : ''; ?></b> tidak memiliki Prestasi. </p>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-header alert-primary">
                            <h6 class="card-title">
                                Biodata
                            </h6>
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td style="width: 150px;">NIM</td>
                                        <td>:</td>
                                        <td><?= !empty($result['mhs_nim']) ? $result['mhs_nim'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= !empty($result['mhs_nama']) ? $result['mhs_nama'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>TGL Lahir</td>
                                        <td>:</td>
                                        <td><?= !empty($result['mhs_tgl_lahir']) ? $result['mhs_tgl_lahir'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Prodi</td>
                                        <td>:</td>
                                        <td><?= !empty($result['prodi_nama']) ? $result['prodi_nama'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Telpon</td>
                                        <td>:</td>
                                        <td><?= !empty($result['mhs_telp']) ? $result['mhs_telp'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= !empty($result['mhs_email']) ? $result['mhs_email'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= !empty($result['mhs_alamat']) ? $result['mhs_alamat'] : ''; ?></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="simplelightbox-gallery row mb-3">
							<div class="col-12 col-md-4 mb-3">
						        <a href="assets/web/images/coderpro-home.png">
                                    <img class="figure-img img-fluid shadow rounded" src="assets/web/images/coderpro-home-thumb.png" alt="" title="CoderPro Home Page"/>
                                </a>
							</div>
							<div class="col-12 col-md-4 mb-3">
						        <a href="assets/web/images/coderpro-features.png">
                                    <img class="figure-img img-fluid shadow rounded" src="assets/web/images/coderpro-features-thumb.png" alt="" title="CoderPro Features Page"/>
                                </a>
							</div><!--//col-->
							<div class="col-12 col-md-4 mb-3">
						        <a href="assets/web/images/coderpro-pricing.png">
                                    <img class="figure-img img-fluid shadow rounded" src="assets/web/images/coderpro-pricing-thumb.png" alt="" title="CoderPro Pricing Page"/>
                                </a>
							</div><!--//col-->
						</div><!--//gallery-->
                    <div class="card mt-4">
                        <div class="card-header alert-primary">
                            <h6 class="card-title">Daftar Prestasi Mahasiswa</h6>
                        </div>
                        <div class="card-body ">
                            <table id="example2" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Prestasi</th>
                                        <th>Peringkat</th>
                                        <th>Tanggal</th>
                                        <th>Tingkat</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($data = $prestasi->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['prs_nama']; ?></td>
                                            <td class="text-center">
                                                <span class="badge bg-info">
                                                    <i class="fas fas fa-trophy"></i> Juara ke
                                                    <b style="font-size:17px"><?= $data['prs_peringkat']; ?></b>
                                                </span>
                                            </td>
                                            <td><?= date('D,m-Y', strtotime($data['prs_tgl_lomba'])); ?></td>
                                            <td><?= $data['tingkat_nama']; ?></td>
                                            <td><button class="btn btn-info btn-sm" onclick="preViewImg()">Detail</button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--//container-->
    </div>

    <footer class="footer">

        <div class="footer-bottom text-center py-5">

            <ul class="social-list list-unstyled pb-4 mb-0">
                <li class="list-inline-item"><a href="#"><i class="fab fa-github fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-slack fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-product-hunt fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-fw"></i></a></li>
            </ul>
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Mahasiswa Informasi 2020 <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="theme-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> </small>


        </div>

    </footer>

  <!-- Javascript -->          
    <script src="assets/web/plugins/popper.min.js"></script>
    <script src="assets/web/plugins/bootstrap/js/bootstrap.min.js"></script>  
    

    <!-- Page Specific JS -->
    <script src="assets/web/plugins/smoothscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
    <script src="assets/web/js/highlight-custom.js"></script> 
    <script src="assets/web/plugins/simplelightbox/simple-lightbox.min.js"></script>      
    <script src="assets/web/plugins/gumshoe/gumshoe.polyfills.min.js"></script> 
    <script src="assets/web/js/docs.js"></script> 
    <script>
        const lightboxdiv = document.querySelector('.simplelightbox-gallery');
        const preViewImg = function(){
            let element = '';
            for (let index = 0; index < 1; index++) {
                element += `<div class="col-12 col-md-4 mb-3">
                             <a href="assets/web/images/coderpro-home.png">
                                    <img class="figure-img img-fluid shadow rounded" src="assets/web/images/coderpro-home-thumb.png" alt="" title="CoderPro Home Page"/>
                                </a>
                            </div>`;
                }
            lightboxdiv.innerHTML = element
        var lightbox = new SimpleLightbox('.simplelightbox-gallery a', {/* options */});
        // var lightbox = new SimpleLightbox(imgpreview, {/* options */});
        //     console.log(imgpreview)
        }
    </script>
</body>

</html>
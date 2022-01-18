<!DOCTYPE html>
<html lang="en">

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

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/web/css/theme.css">

</head>

<body>
    <header class="header fixed-top">

        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
                    <div class="site-logo"><a class="navbar-brand" href="index.php"><img class="logo-icon me-2" src="assets/web/images/unu-jogja.png" alt="logo"><span class="logo-text">PRESTASI<span class="text-alt"> MAHASISWA</span></span></a></div>
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


    <div class="page-header theme-bg-dark py-5 text-center position-relative">
        <div class="theme-bg-shapes-right"></div>
        <div class="theme-bg-shapes-left"></div>
        <div class="container">
            <h1 class="page-heading single-col-max mx-auto">Cari Prestasi</h1>
            <div class="page-intro single-col-max mx-auto">Silahkan masukan NIM mahasiswa disini.</div>
            <div class="main-search-box pt-3 d-block mx-auto">
                <form method="POST" action="cekPrestasi.php" enctype="multipart/form-data" class="search-form w-100"> 
                    <input type="text" placeholder="Cari berdasarkan NIM mahasiswa..." name="nim" class="form-control search-input">
                    <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!--//page-header-->
    <div class="page-content">
        <div class="container">
            <div class="docs-overview py-5">
            <h6 class="text-center">
                Sistem ini Memberikan Kemudahan
            </h6>
            <hr>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-4 py-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">
                                    <span class="theme-icon-holder card-icon-holder me-2">
                                        <i class="fas fas fa-trophy"></i>
                                    </span>
                                    <!--//card-icon-holder-->
                                    <span class="card-title-text">Dokumentasi Prestasi.</span>
                                </h5>
                                <div class="card-text text-center">
                                    Sistem ini dilengkapi dengan dokumentasi prestasi berupa bukti gambar.
                                </div>
                                <a class="card-link-mask" href="docs-page.html#section-1"></a>
                            </div>
                            <!--//card-body-->
                        </div>
                        <!--//card-->
                    </div>
                    <!--//col-->
                    <div class="col-12 col-lg-4 py-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">
                                    <span class="theme-icon-holder card-icon-holder me-2">
                                        <i class="fas fa-arrow-down"></i>
                                    </span>
                                    <!--//card-icon-holder-->
                                    <span class="card-title-text">Share Prestasi.</span>
                                </h5>
                                <div class="card-text text-center">
                                    Fitur share memberikan momen prestasi mahasiswa kepada publik.
                                </div>
                                <a class="card-link-mask" href="docs-page.html#section-2"></a>
                            </div>
                            <!--//card-body-->
                        </div>
                        <!--//card-->
                    </div>
                    <!--//col-->
                    <div class="col-12 col-lg-4 py-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">
                                    <span class="theme-icon-holder card-icon-holder me-2">
                                        <i class="fas fa-box fa-fw"></i>
                                    </span>
                                    <!--//card-icon-holder-->
                                    <span class="card-title-text">User Friendly.</span>
                                </h5>
                                <div class="card-text text-center">
                                    Sistem ini di bangun dengan fitur yang user friendly dengan kemudahan fiturnya.
                                </div>
                                <a class="card-link-mask" href="docs-page.html#section-3"></a>
                            </div>
                            <!--//card-body-->
                        </div>
                        <!--//card-body-->
                    </div>
                    <!--//card-body-->
                </div>
                <!--//row-->
            </div>
            <!--//container-->
        </div>
        <!--//container-->
    </div>
    <!--//page-content-->

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
            <!--//social-list-->
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

</body>

</html>
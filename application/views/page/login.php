<!doctype html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#6C388A" >
    <title>PUSTAKA GURU INDONESIA | BIKINKARYA CREATIVE MEDIA</title>
    <meta name="description" content="Bikinkarya Creative Media">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?=base_url()?>/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Masukkan Email dan Password anda</h4>            
        </div>
        <div class="section mb-5 p-2">
		<?php $this->view('message'); ?>
            <form action="<?=site_url('auth/process')?>" method="post" id="FormLogin">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail</label>
                                <input type="email" name="username" class="form-control" id="email" placeholder="Ex: fitrah@bikinkarya.com">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" name="password" class="form-control" id="password1" autocomplete="off"
                                    placeholder="Ex: 0340">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <small>Password default menggunakan 4 digit terakhir nomor HP anda. Rubah setelah login.</small>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="<?= base_url('pendaftaran/tambah/')?>">Daftar Sekarang</a>
                    </div>
                    <div><a href="<?= base_url('pendaftaran/forget')?>" class="text-muted">Lupa Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->



    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?=base_url()?>/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?=base_url()?>/assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?=base_url()?>/assets/js/base.js"></script>


</body>

</html>

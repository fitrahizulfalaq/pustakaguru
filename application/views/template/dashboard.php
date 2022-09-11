<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Edscience - <?= $menu?></title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="manifest" href="<?=base_url()?>/__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?=base_url()?>/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <img src="<?=base_url()?>/assets/img/logo.png" alt="logo" class="logo">
        </div>
        <div class="right">
            <!-- <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a> -->
            <a href="<?=base_url("page/profil")?>" class="headerButton">
                <img src="<?=base_url()?>/assets/img/default/1x1.png" alt="image" class="imaged w32">
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <?= $contents ?>

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?= base_url("")?>" class="item <?=$this->uri->segment(1) == '' ? "active" : ""?>">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="<?= base_url("subtema/pencarian")?>" class="item <?=$this->uri->segment(2) == 'pencarian' ? "active" : ""?>">
            <div class="col">
                <ion-icon name="search-outline"></ion-icon>
                <strong>Search</strong>
            </div>
        </a>
        <a href="<?= base_url("pertanyaan")?>" class="item <?=$this->uri->segment(1) == 'pertanyaan' ? "active" : ""?>">
            <div class="col">
				<ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                <strong>Chat</strong>
            </div>
        </a>
        <a href="<?= base_url("page/profil")?>" class="item <?=$this->uri->segment(2) == 'profil' ? "active" : ""?>">
            <div class="col">
				<ion-icon name="person-circle-outline"></ion-icon>
                <strong>Profil</strong>
            </div>
        </a>        
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img src="<?=base_url()?>/assets/img/default/1x1.png" alt="image" class="imaged  w36">
                        </div>
                        <div class="in">
                            <strong><?= $this->session->nama?></strong>
                            <div class="text-muted"><?= $this->session->email?></div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                    <!-- balance -->
                    <div class="sidebar-balance">
                        <div class="listview-title">Anda Login Sebagai</div>
                        <div class="in">
							<h1 class="amount"> <ion-icon name="person-outline"></ion-icon></ion-icon> <?= $this->fungsi->status($this->session->tipe_user)?></h1>
                        </div>
                    </div>
                    <!-- * balance -->                    

                    <!-- others -->
                    <div class="listview-title mt-1">Sistem</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="<?= base_url("page/petunjuk")?>" class="item">
                                <div class="icon-box bg-primary">
									<ion-icon name="book-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Panduan Penggunaan
                                </div>
                            </a>
                        </li>
						<li>
                            <a href="<?= base_url("page/pembuat")?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="people-circle-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Profil Pengembang
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("auth/logout")?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
                                </div>
                            </a>
                        </li>


                    </ul>
                    <!-- * others -->
                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->



    <!-- iOS Add to Home Action Sheet -->
    <!-- <div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1"><img src="<?=base_url()?>/assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Finapp</strong> on your iPhone's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
    <!-- * iOS Add to Home Action Sheet -->


    <!-- Android Add to Home Action Sheet -->
    <!-- <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1">
                            <img src="<?=base_url()?>/assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Made with love by <strong>Bikinkarya Creative Media</strong>
                        </div>
                        <div>
                            Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- * Android Add to Home Action Sheet -->



    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?=base_url()?>/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?=base_url()?>/assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?=base_url()?>/assets/js/base.js"></script>

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>

</body>

</html>

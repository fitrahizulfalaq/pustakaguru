<!doctype html>
<html lang="en">

<head>
	<meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="Pustakaguru.id - Inovator Pendidikan Indonesia" content="yes" />
    <meta name="Pustakaguru.id - Inovator Pendidikan Indonesia" content="black-translucent">
    <meta name="theme-color" content="#0096FF">
    <title>Pustakaguru - <?= $menu?></title>
    <meta name="description" content="Pustakguru.id">
    <meta name="keywords"
        content="pelatihan, guru, pelatihan guru indonesia, pppkguru" />
    <title>Edscience - <?= $menu ?></title>
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/favicon.png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="manifest" href="<?=base_url()?>/__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?=base_url()?>/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

	<?= $contents ?>

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

<!-- App Capsule -->
<div id="appCapsule">
	<div class="section full gradientSection">
		<div class="in">
			<h5 class="title mb-2">Anda Login Sebagai <?= $this->fungsi->status($this->session->tipe_user) ?></h5>
			<h1 class="total">Selamat Datang <br> <?= $this->session->nama ?></h1>
			<h4 class="caption">
				di APLIKASI EDSCIENCE
			</h4>
		</div>
	</div>

	<?php if ($this->session->tipe_user == "3") { ?>
		<div class="section wallet-card-sections pt-1">
			<div class="wallet-card">
				<!-- Balance -->
				<div class="balance">
					<div class="left">
						<span class="title">Total Pengguna Aktif</span>
						<h1 class="total"><?= $this->fungsi->hitung_rows("tb_user", "status", "1") ?></h1>
						<?= $this->fungsi->hitung_rows_multiple("tb_user","status","1", "tipe_user", "1")?> pelajar, <?= $this->fungsi->hitung_rows_multiple("tb_user","status","1", "tipe_user", "2") ?> relawan dan Admin 
					</div>
					<div class="right">
						<a href="<?= base_url("pendaftaran/data") ?>" class="button">
							<ion-icon name="search-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
						</a>
					</div>
				</div>
				<!-- * Balance -->
			</div>
		</div>
	<?php } ?>

	<div class="section full mt-4 mb-3">
		<div class="section-heading padding">
			<h2 class="title">Ingin belajar apa hari ini ?</h2>
			<!-- <a href="app-blog.html" class="link">View All</a> -->
		</div>

		<!-- carousel multiple -->
		<div class="carousel-multiple splide splide--loop splide--ltr splide--draggable is-active" id="splide03" style="visibility: visible;">
			<div class="splide__track" id="splide03-track" style="padding-left: 16px; padding-right: 16px;">
				<ul class="splide__list" id="splide03-list" style="transform: translateX(-589px);">
					<li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 91.5px;">
						<a href="<?= base_url("page/petunjuk") ?>">
							<div class="blog-card">
								<img src="assets/img/petunjuk.png" alt="image" class="imaged w-100">
								<div class="text">
									<h4 class="title">Petunjuk Penggunaan</h4>
								</div>
							</div>
						</a>
					</li>
					<li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 91.5px;">
						<a href="<?= base_url("page/pembuat") ?>">
							<div class="blog-card">
								<img src="assets/img/pembuat.png" alt="image" class="imaged w-100">
								<div class="text">
									<h4 class="title">Profil Pengembang</h4>
								</div>
							</div>
						</a>
					</li>
					<li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 91.5px;">
						<a href="<?= base_url("page/profil") ?>">
							<div class="blog-card">
								<img src="assets/img/profil.png" alt="image" class="imaged w-100">
								<div class="text">
									<h4 class="title">Profil Pengguna</h4>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- * carousel multiple -->
	</div>

	<div class="section mt-4">
		<div class="section-heading">
			<h2 class="title">Pilih Kelasmu</h2>
			<!-- <a href="app-savings.html" class="link">View All</a> -->
		</div>
		<div class="goals">
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="<?= base_url("tema/list/1") ?>">
							<h4>Kelas 1</h4>
						</a>
						<p>Tersedia <?= $this->fungsi->pilihan_advanced("tb_tema", "kelas", "1")->num_rows() ?> Tema</p>
					</div>
					<a href="<?= base_url("tema/list/1") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="<?= base_url("tema/list/2") ?>">
							<h4>Kelas 2</h4>
						</a>
						<p>Tersedia <?= $this->fungsi->pilihan_advanced("tb_tema", "kelas", "2")->num_rows() ?> Tema</p>
					</div>
					<a href="<?= base_url("tema/list/2") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="<?= base_url("tema/list/3") ?>">
							<h4>Kelas 3</h4>
						</a>
						<p>Tersedia <?= $this->fungsi->pilihan_advanced("tb_tema", "kelas", "3")->num_rows() ?> Tema</p>
					</div>
					<a href="<?= base_url("tema/list/3") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="<?= base_url("tema/list/4") ?>">
							<h4>Kelas 4</h4>
						</a>
						<p>Tersedia <?= $this->fungsi->pilihan_advanced("tb_tema", "kelas", "4")->num_rows() ?> Tema</p>
					</div>
					<a href="<?= base_url("tema/list/4") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="<?= base_url("tema/list/5") ?>">
							<h4>Kelas 5</h4>
						</a>
						<p>Tersedia <?= $this->fungsi->pilihan_advanced("tb_tema", "kelas", "5")->num_rows() ?> Tema</p>
					</div>
					<a href="<?= base_url("tema/list/5") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="<?= base_url("tema/list/6") ?>">
							<h4>Kelas 6</h4>
						</a>
						<p>Tersedia <?= $this->fungsi->pilihan_advanced("tb_tema", "kelas", "6")->num_rows() ?> Tema</p>
					</div>
					<a href="<?= base_url("tema/list/6") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
		</div>
	</div>
	<br>
	<br>
</div>
<!-- * App Capsule -->
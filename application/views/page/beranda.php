<!-- App Capsule -->
<div id="appCapsule">
	<div class="section full gradientSection">
		<div class="in">
			<h5 class="title mb-2">Anda Login Sebagai <?= $this->fungsi->status($this->session->tipe_user) ?></h5>
			<h1 class="total">Selamat Datang <br> <?= $this->session->nama ?></h1>
			<h4 class="caption">
				di PLATFORM PUSTAKA GURU INDONESIA (BETA VERSION)
			</h4>
		</div>
	</div>

	<!-- Wallet Card -->
	<div class="section wallet-card-section pt-1">
		<div class="wallet-card">
			<!-- Balance -->
			<div class="balance">
				<div class="left">
					<span class="title">Total Poin</span>
					<h1 class="total">
						<ion-icon name="cash-outline"></ion-icon> <?= $this->fungsi->getSaldo($this->session->id) ?>
					</h1>
				</div>
				<div class="right">
					<a href="<?= base_url("topup") ?>" class="button">
						<ion-icon name="add-outline"></ion-icon>
					</a>
				</div>
			</div>
			<!-- * Balance -->
			<!-- Wallet Footer -->
			<div class="wallet-footer">
				<div class="item">
					<a href="<?= base_url("topup/riwayat") ?>">
						<div class="icon-wrapper bg-danger">
							<ion-icon name="arrow-down-outline"></ion-icon>
						</div>
						<strong>Riwayat Pembelian</strong>
					</a>
				</div>
				<div class="item">
					<a href="<?= base_url("topup/paymentHistory") ?>">
						<div class="icon-wrapper">
							<ion-icon name="arrow-forward-outline"></ion-icon>
						</div>
						<strong>Riwayat Top UP</strong>
					</a>
				</div>
				<div class="item">
					<a href="<?= base_url("page/menu") ?>">
						<div class="icon-wrapper bg-success">
							<ion-icon name="card-outline"></ion-icon>
						</div>
						<strong>Materi Saya</strong>
					</a>
				</div>
				<div class="item">
					<a href="https://tryout.pustakaguru.id">
						<div class="icon-wrapper bg-warning">
							<ion-icon name="swap-vertical"></ion-icon>
						</div>
						<strong>Tryout</strong>
					</a>
				</div>

			</div>
			<!-- * Wallet Footer -->
		</div>
	</div>
	<!-- Wallet Card -->

	<div class="section mt-4">
		<?php $this->view('message') ?>
	</div>

	<div class="section full mt-4 mb-3">
		<div class="disabled disabled-link">
			<!-- <script src="https://cdn.logwork.com/widget/countdown.js"></script>
			<a href="https://logwork.com/countdown-w6o2s" class="countdown-timer" style="color: currentColor;cursor: not-allowed;pointer-events: none;opacity: 0.5;text-decoration: none;" data-timezone="Asia/Jakarta" data-date="2022-10-02 23:00">PROMO TIKET TIKTOK BERHAKHIR PADA</a> -->
			<?php if ($this->session->tipe_user == "3") { ?>
				<div class="section wallet-card-sections pt-1">
					<div class="wallet-card">
						<!-- Balance -->
						<div class="balance">
							<div class="left">
								<span class="title">Total Pengguna Aktif</span>
								<h1 class="total"><?= $this->fungsi->hitung_rows("tb_user", "status", "1") ?></h1>
								<?= $this->fungsi->hitung_rows_multiple("tb_user", "status", "1", "tipe_user", "1") ?> pelajar, <?= $this->fungsi->hitung_rows_multiple("tb_user", "status", "1", "tipe_user", "2") ?> relawan dan Admin
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
		</div>
		<!-- * App Capsule -->
	</div>

	<div class="section full mt-4">
		<div class="carousel-single splide splide--loop splide--ltr splide--draggable is-active" id="splide02" style="visibility: visible;">
			<div class="splide__track" id="splide02-track" style="padding-left: 16px; padding-right: 16px;">
				<ul class="splide__list" id="splide02-list" style="transform: translateX(-1979.97px);">
					<li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 332.667px;">
						<div class="card">
							<a href="https://member.pustakaguru.id/subtema/detail/36">
								<img src="https://member.pustakaguru.id/assets/img/foto/pelatihantiktok.jpg" class="card-img-top" alt="image">
							</a>
						</div>
						<div class="card-footer">
							<span class="badge badge-warning">Telah Selesai di Laksanakan</span>
							<br> Klik Gambar untuk melihat materi dan rekaman video.
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="section mt-4">
		<div class="section-heading">
			<h2 class="title">Fitur Gratis</h2>
			<!-- <a href="app-savings.html" class="link">View All</a> -->
		</div>
		<div class="goals">
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="https://instagram.com/pppkguru" target="_blank">
							<h4>Informasi PPPK Guru</h4>
						</a>
						<p>Tersedia</p>
					</div>
					<a href="https://instagram.com/pppkguru" target="_blank">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="https://t.me/infoPPPKGuru" target="_blank">
							<h4>Grup Telegram PPPK Guru</h4>
						</a>
						<p>Tersedia</p>
					</div>
					<a href="https://t.me/infoPPPKGuru" target="_blank">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="https://pustakaguru.id" target="_blank">
							<h4>Website Update Seputar Guru Indonesia</h4>
						</a>
						<p>Tersedia</p>
					</div>
					<a href="https://pustakaguru.id" target="_blank">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="<?= base_url("page/menu") ?>">
							<h4>Update Info Webinar</h4>
						</a>
						<p>Dalam tahap pengembangan</p>
					</div>
					<a href="<?= base_url("page/menu") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
		</div>
	</div>

	<div class="section mt-4">
		<div class="section-heading">
			<h2 class="title">Fitur Premium</h2><br>
			<!-- <small>Dalam Pengembangan</small> -->
			<!-- <a href="app-savings.html" class="link">View All</a> -->
		</div>
		<div class="goals">
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="https://mentoring.pustakaguru.id/">
							<h4>Mentoring Ekslusif PPPK & CPNS</h4>
						</a>
						<p>Tersedia paket mandiri dan berkelompok</p>
					</div>
					<a href="https://mentoring.pustakaguru.id/">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="https://tryout.pustakaguru.id/">
							<h4>Tryout Bersama</h4>
						</a>
						<p>Tersedia paket mandiri dan berkelompok</p>
					</div>
					<a href="https://tryout.pustakaguru.id/">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="https://wa.me/+6281231390340" target="_blank">
							<h4>Pembuatan Media Pembelajaran</h4>
						</a>
						<p>Klik untuk konsultasi</p>
					</div>
					<a href="https://wa.me/+6281231390340" target="_blank">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="https://bikinkarya.com">
							<h4>Kelas Guru Digital</h4>
						</a>
						<p>Klik untuk infromasi lebih lanjut</p>
					</div>
					<a href="https://bikinkarya.com">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="https://bikinkarya.com">
							<h4>Kelas Siswa Berprestasi</h4>
						</a>
						<p>Klik untuk infromasi lebih lanjut</p>
					</div>
					<a href="https://bikinkarya.com">
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
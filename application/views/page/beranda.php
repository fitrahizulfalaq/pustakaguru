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

	<div class="section mt-4">
		<?php $this->view('message') ?>
	</div>

	<div class="section full mt-4 mb-3">
		<div class="section-heading padding">
			<h2 class="title">Pelatihan Terbaru</h2>
			<!-- <a href="app-blog.html" class="link">View All</a> -->
		</div>

		<div class="carousel-full splide splide--loop splide--ltr splide--draggable is-active" id="splide01" style="visibility: visible;">
			<div class="splide__track" id="splide01-track">
				<ul class="splide__list" id="splide01-list" style="transform: translateX(-2433px);">
					<li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="width: 811px;">
						<a href="#">
							<div class="blog-card">
								<!-- <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w-100"> -->
								<div class="card card-with-icon">
									<div class="card-body pt-3 pb-3 text-left">
										<!-- <div class="card-icon bg-success mb-2">
											<ion-icon name="link" role="img" class="md hydrated" aria-label="link"></ion-icon>
										</div> -->
										<h3 class="card-titlde mb-1">TikTok Hack: Cara Mendapatkan 10.000 Followers dan 1 Juta Views Tiktok Organik dalam 3 Bulan Pertama</h3>
										<p align="left">
											<ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="link"></ion-icon> Tiket Harga Rp. 10.000 <br>
											<ion-icon name="person-outline" role="img" class="md hydrated" aria-label="user"></ion-icon> 100 seat max <br>
											<ion-icon name="time" role="img" class="md hydrated" aria-label="calendar"></ion-icon> 10 Sep 2022, mulai 19.30 <br>
											Spesial Launching Pustakguru.id
										</p>
										<hr>
										<?php if ($this->fungsi->hitung_rows_multiple("tb_riwayat_transaksi","user_id",$this->session->id,"created",date("Y-m-d h")) != null && $this->fungsi->hitung_rows("tb_pembelian","user_id",$this->session->id) == null) {?>
										<div class="row">
											<div class="row">
												<div class="col-6">
												<a href="<?= base_url("bayar?")."username=" . $this->session->username . "&email=" . $this->session->email . "&userid=" . $this->session->id . "&hp=" . $this->session->hp ?>" class="btn btn-block btn-primary">
													LANJUTKAN PEMBAYARAN
												</a>
												</div>
												<div class="col-6">
												<a href="https://wa.me/+6281231390340" class="btn btn-block btn-success">
													BUTUH BANTUAN
												</a>
												</div>
											</div>											
										</div>
										<?php } else if ($this->fungsi->hitung_rows("tb_pembelian","email",$this->session->email) == null) { ?>
										<div class="row">
											<div class="row">
												<div class="col-6">
													<a href="<?=base_url("bayar/konfirmasiOnline")?>" class="btn btn-block btn-success">
														BELI TIKET (OTOMATIS)
													</a>
												</div>
												<div class="col-6">
													<a href="<?= base_url("bayar/manual")?>" class="btn btn-secondary btn-outline">
														BELI TIKET (MANUAL)
													</a>
												</div>
											</div>
										</div>
										<?php } else { ?>
											<div class="row">
												<div class="col-6">
												<a href="#" class="btn btn-block btn-primary">
													ANDA MEMILIKI TIKET
												</a>
												</div>
												<div class="col-6">
												<a href="#" class="btn btn-block btn-success">
													JOIN ZOOM (HARI-H ACARA)
												</a>
												</div>
											</div>											
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</a>
					</li>
				</ul>
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
							<a href="#" onclick="alert(`dalam tahap pengembangan`)">
								<h4>Update Info Webinar</h4>
							</a>
							<p>Dalam tahap pengembangan</p>
						</div>
						<a href="#">
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
							<a href="#" onclick="alert(`dalam tahap pengembangan`)">
								<h4>Mentoring Ekslusif PPPK & PPG</h4>
							</a>
							<p>Dalam tahap pengembangan</p>
						</div>
						<a href="#">
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
							<a href="#" onclick="alert(`dalam tahap pengembangan`)">
								<h4>Kelas Guru Digital</h4>
							</a>
							<p>Dalam tahap pengembangan</p>
						</div>
						<a href="#">
							<h1>
								<ion-icon name="arrow-forward-circle-outline"></ion-icon>
							</h1>
						</a>
					</div>
					<div class="in">
						<div>
							<a href="#" onclick="alert(`dalam tahap pengembangan`)">
								<h4>Kelas Siswa Berprestasi</h4>
							</a>
							<p>Dalam tahap pengembangan</p>
						</div>
						<a href="#">
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

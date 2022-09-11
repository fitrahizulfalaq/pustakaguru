<!-- App Capsule -->
<div id="appCapsule" class="full-height">

	<div class="section mt-2 mb-2">
		<?php $this->view('message') ?>
		<div class="listed-detail mt-3">
			<div class="icon-wrapper">
				<div class="iconbox">
					<ion-icon name="star-outline"></ion-icon>
				</div>
			</div>
			<h3 class="text-center mt-2">Hasil Quiz</h3>
		</div>

		<ul class="listview flush transparent simple-listview no-space mt-3">
			<li>
				<strong>Benar</strong>
				<span><?= $benar == null ? "0" : $benar ?></span>
			</li>
			<li>
				<strong>Salah</strong>
				<span><?= $salah == null ? "0" : $salah ?></span>
			</li>
			<li>
				<strong>Kosong</strong>
				<span><?= $kosong == null ? "0" : $kosong ?></span>
			</li>
			<li>
				<strong>Jumlah Soal</strong>
				<span><?= $jumlah_soal ?></span>
			</li>
		</ul>

		<div class="listed-detail mt-3">
			<h2 class="text-center mt-2">Nilai Kamu :</h2>
			<h1 class="text-center"><?= $hasil == null ? "0" : $hasil ?></h1>
		</div>


	</div>

	<div class="carousel-button-footer">
		<div class="row">
			<div class="col-12">
				<a href="<?= base_url("subtema/detail/" . $this->uri->segment(3)) ?>" class="btn btn-outline-secondary btn-lg btn-block">Kembali</a>
			</div>			
		</div>
	</div>

</div>
<!-- * App Capsule -->

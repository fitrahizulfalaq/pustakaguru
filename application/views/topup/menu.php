<div id="appCapsule">
	<div class="section full gradientSection">
		<div class="in">
			<h1 class="total">Pembelian Koin</h1>
		</div>
	</div>

	<div class="section mt-4">
		<?php $this->view('message') ?>
		<div class="goals">
			
			<h1>Pembelian Koin</h1>
			<hr>
			<h2><?= $this->session->nama ?></h2>
			<h4>Poin Anda : <?= $this->fungsi->getSaldo($this->session->id) ?></h4>
			<hr>
			<div class="text mb-5">
				<a href="<?= base_url("topup/confirm?coin=10") ?>" class="btn btn-warning btn-block">
					<ion-icon name="star-outline"></ion-icon> 10 Koin / Rp. 10.000
				</a>
				<br><br>
				<a href="<?= base_url("topup/confirm?coin=50") ?>" class="btn btn-warning btn-block">
					<ion-icon name="star-outline"></ion-icon> 50 Koin / Rp. 45.000
				</a>
				<br><br>
				<a href="<?= base_url("topup/confirm?coin=100") ?>" class="btn btn-warning btn-block">
					<ion-icon name="star-outline"></ion-icon> 100 Koin / Rp. 90.000
				</a>
				<br><br>
				<a href="<?= base_url("topup/confirm?coin=150") ?>" class="btn btn-warning btn-block">
					<ion-icon name="star-outline"></ion-icon> 150 Koin / Rp. 130.000
				</a>
			</div>
		</div>

	</div>
</div>
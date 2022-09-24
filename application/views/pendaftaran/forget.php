<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
	<div class="left">
		<a href="#" class="headerButton goBack">
			<ion-icon name="chevron-back-outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle"></div>
	<div class="right">
		<a href="<?= base_url('auth/login') ?>" class="headerButton">
			Login
		</a>
	</div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

	<div class="section mt-2 text-center">
		<h1>Lupa Password</h1>
		<h4>Identitas akun akan dikirim melalui No HP Terdaftar</h4>
	</div>

	<div class="section mb-5 p-2">
		<?= form_open_multipart('') ?>
		<div class="card">
			<div class="card-body">
				<?php $this->view('message') ?>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="hp">HP</label>
						<input type="text" name="hp" class="form-control" id="hp" placeholder="081231390340" maxlength="15" minlength="11" value="<?= set_value('hp'); ?>" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('hp') ?>
				</div>
				
				<div class="custom-control custom-checkbox mt-2 mb-1">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="customCheckb1" required>
						<label class="form-check-label" for="customCheckb1">
							Nomor benar sudah saya daftarkan
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-button-group transparent">
		<button type="submit" class="btn btn-primary btn-block btn-lg">Kirim Password</button>
	</div>

	<?= form_close() ?>
</div>

</div>
<!-- * App Capsule -->
<div id="appCapsule">

	<div class="section mt-2">
	<?php $this->view('message'); ?>
		<div class="card">
			<div class="card-body">
				<div class="p-1">
					<div class="text-center">
						<h2 class="text-primary">Konfirmasi WA</h2>
						<p>Kirim Pesan Konfirmasi</p>
					</div>
					<?= form_open_multipart('') ?>
					<div class="form-group basic animated">
						<div class="input-wrapper">
							<label class="label" for="nama">Nama</label>
							<input type="text" name="nama" class="form-control" id="nama" placeholder="Fitrah Izul Falaq" value="<?= set_value('nama');?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('nama')?>
					</div>
                    <div class="form-group basic animated">
						<div class="input-wrapper">
							<label class="label" for="hp">No HP</label>
							<input type="text" name="hp" class="form-control" id="hp" placeholder="081231390340" value="<?= set_value('hp');?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('hp')?>
					</div>


					<div class="mt-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Kirim Pesan</button>
					</div>

					</form>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>	


</div>

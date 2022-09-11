<div id="appCapsule">

	<div class="section mt-2">
		<div class="card">
			<div class="card-body">
				<div class="p-1">
					<div class="text-center">
						<h2 class="text-primary">Tambah Data Tema</h2>
						<p>Penambahan Tema untuk Kelas <?= $this->uri->segment("3")?></p>
					</div>
					<?= form_open_multipart('') ?>
					<input type="hidden" name="kelas" value="<?= $this->uri->segment("3")?>">
					<div class="form-group basic animated">
						<div class="input-wrapper">
							<label class="label" for="deskripsi">Deskripsi</label>
							<input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Judul Tema Kamu" value="<?= set_value('deskripsi');?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('deskripsi')?>
					</div>

					<div class="mt-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Tambah Data</button>
					</div>

					</form>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>	


</div>

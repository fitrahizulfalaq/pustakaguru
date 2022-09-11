<div id="appCapsule">

	<div class="section mt-2">
		<div class="card">
			<div class="card-body">
				<div class="p-1">
					<div class="text-center">
						<h2 class="text-primary">Tambah Data Soal</h2>
						<p>Untuk Subtema: <?= $keterangan->deskripsi ?></p>
					</div>
					<?= form_open_multipart('') ?>
					<input type="hidden" name="id" value="<?= $this->uri->segment("3") ?>">
					<div class="form-group basic animated">
						<div class="input-wrapper">
							<label class="label" for="textarea">Pertanyaan</label>
							<textarea id="textarea" name="soal" rows="4" class="form-control" placeholder="Tulis pertanyaan"></textarea>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
					</div>
					<div class="form-group basic">
						<div class="input-wrapper">
							<label class="label" for="pil_a">Pilihan A</label>
							<input type="text" name="pil_a" class="form-control" id="pil_a" placeholder="Pilihan A" value="<?= set_value('pil_a'); ?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('pil_a') ?>
					</div>
					<div class="form-group basic">
						<div class="input-wrapper">
							<label class="label" for="pil_b">Pilihan B</label>
							<input type="text" name="pil_b" class="form-control" id="pil_b" placeholder="Pilihan B" value="<?= set_value('pil_b'); ?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('pil_b') ?>
					</div>
					<div class="form-group basic">
						<div class="input-wrapper">
							<label class="label" for="pil_c">Pilihan C</label>
							<input type="text" name="pil_c" class="form-control" id="pil_c" placeholder="Pilihan C" value="<?= set_value('pil_c'); ?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('pil_c') ?>
					</div>
					<div class="form-group basic">
						<div class="input-wrapper">
							<label class="label" for="pil_d">Pilihan D</label>
							<input type="text" name="pil_d" class="form-control" id="pil_d" placeholder="Pilihan D" value="<?= set_value('pil_d'); ?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('pil_d') ?>
					</div>
					<div class="form-group basic">
						<div class="input-wrapper">
							<label class="label" for="pil_e">Pilihan E</label>
							<input type="text" name="pil_e" class="form-control" id="pil_e" placeholder="Pilihan E" value="<?= set_value('pil_e'); ?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('pil_e') ?>
					</div>
					<div class="form-group basic">
						<div class="input-wrapper">
							<label class="label" for="kunci">Kunci Jawaban</label>
							<select name="kunci" class="form-control custom-select" id="kunci">
								<option value="pil_a">Pilihan A</option>
								<option value="pil_b">Pilihan B</option>
								<option value="pil_c">Pilihan C</option>
								<option value="pil_d">Pilihan D</optiion>
								<option value="pil_e">Pilihan E</optiion>
							</select>
						</div>
					</div>

					<div class="mt-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Proses</button>
					</div>

					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>


</div>

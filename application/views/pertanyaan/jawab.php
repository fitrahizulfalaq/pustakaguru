<div id="appCapsule">

	<div class="section mt-2">
		<div class="card">
			<div class="card-body">
				<div class="p-1">
					<div class="text-center">
						<h2 class="text-primary">Jawab Pertanyaan</h2>
						<div class="alert alert-info mb-1" role="alert">
							<p align="left">Pertanyaan : <br> <?= $row->pertanyaan ?></p>
						</div>
					</div>
					<?= form_open_multipart('') ?>
					<input type="hidden" name="kelas" value="<?= $this->uri->segment("3")?>">
					<div class="form-group basic animated">
						<input type="hidden" name="id" value="<?=$row->id?>">
						<div class="input-wrapper">
							<label class="label" for="jawaban">Jawaban</label>
							<input type="text" name="jawaban" class="form-control" id="jawaban" placeholder="Tulis Jawaban kamus" value="<?= set_value('jawaban');?>" required>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
						<?php echo form_error('jawaban')?>
					</div>

					<div class="mt-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Jawab Pertanyaan</button>
					</div>

					</form>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>


</div>

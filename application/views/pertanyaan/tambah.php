<div id="appCapsule">

	<div class="section mt-2">
		<div class="card">
			<div class="card-body">
				<?php $this->view('message') ?>
				<div class="p-1">
					<div class="text-center">
						<h2 class="text-primary">Ajukan Pertanyaan</h2>
						<p>Pertanyaan kamu nantinya akan dijawab oleh relawan</p>
					</div>
					<?= form_open_multipart('') ?>
					<input type="hidden" name="kelas" value="<?= $this->uri->segment("3") ?>">
					<div class="form-group basic animated">
						<div class="input-wrapper">
							<label class="label" for="textarea">Pertanyaan</label>
							<textarea id="textarea" name="pertanyaan" rows="4" class="form-control" placeholder="Tulis pertanyaanmu disini"></textarea>
							<i class="clear-input">
								<ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
							</i>
						</div>
					</div>

					<div class="mt-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Proses</button>
					</div>

					</form>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section mt-2">
		<div class="section-title">Riwayat Pertanyaan Kamu</div>
		<div class="card">

			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col" width="30%">Tanggal</th>
							<th scope="col" width="50%">Pertanyaan</th>
							<th scope="col" class="text-end" width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tanya->result() as $key => $data) {; ?>
							<tr>
								<th scope="row"><?= $data->created?></th>
								<td><?= $data->pertanyaan?></td>
								<td class="text-end text-primary"><a href="<?=base_url("pertanyaan/detail/".$data->id)?>"> Lihat</a></td>
							</tr>						
						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
<br>
<br>

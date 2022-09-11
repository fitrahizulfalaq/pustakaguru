<div id="appCapsule">

	<div class="section mt-2">
		<div class="section-heading">
			<h2 class="title">Pertanyaan Belum Terjawab</h2>
			<a href="<?=base_url("pertanyaan/semua/")?>" class="link">Semua</a>
		</div>
		<div class="card">
			<?php $this->view('message') ?>
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
								<th scope="row"><?= $data->created ?></th>
								<td><?= $data->pertanyaan ?></td>
								<?php if ($data->jawaban == null) {?> 
									<td class="text-end text-primary"><a href="<?= base_url("pertanyaan/jawab/" . $data->id) ?>"> Jawab</a></td>
								<?php } else {?>
									<td class="text-end text-primary"><a href="<?= base_url("pertanyaan/hapus/" . $data->id) ?>"> Hapus</a></td>
								<?php } ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>

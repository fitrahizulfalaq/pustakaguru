<div id="appCapsule">
	<div class="section full gradientSection">
		<div class="in">
			<h1 class="total">List Subtema: <?= $keterangan ?></h1>
		</div>
	</div>

	<div class="section mt-4">
		<div class="goals">
			<?php foreach ($row->result() as $key => $data) {; ?>
				<!-- item -->
				<div class="item bg-success">
					<div class="in">
						<div>
							<a href="<?= base_url("subtema/detail/" . $data->id) ?>">
								<h2><?= $data->deskripsi ?></h2>
								<p class="text-white"><?= $keterangan ?></p>
							</a>
						</div>
						<h1>
							<?php if ($this->session->tipe_user == 2) { ?>
							<a href="<?= base_url("subtema/hapus/" . $data->id."/tema/".$data->tema_id) ?>" class="text-black" onclick="return confirm('Yakin Mau Dihapus?')">
								<ion-icon name="trash-outline"></ion-icon></ion-icon>
							</a>
							<?php } ?>
							<a href="<?= base_url("subtema/detail/" . $data->id) ?>" class="text-black">
								<ion-icon name="arrow-forward-circle-outline"></ion-icon>
							</a>
						</h1>
					</div>
				</div>
				<!-- * item -->
			<?php } ?>
		</div>
		<?php if ($row->num_rows() == null) { ?>
			<div class="alert alert-danger mb-1" role="alert">
				Tidak ada data
			</div>
		<?php } ?>

		<?php if ($this->session->tipe_user == 2) { ?>
			<div>
				<br><a href="<?=base_url("subtema/tambah/".$tema)?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
			</div>
		<?php } ?>
	</div>
</div>

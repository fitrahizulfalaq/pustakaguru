<div id="appCapsule">
	<div class="section mt-2">
		<div class="section-title">Data Soal untuk Sub Tema : <br><?= $this->fungsi->pilihan_selected("tb_subtema",$id)->row("deskripsi")?></div>
		<div class="card">
			<?php $this->view('message') ?>
			<div class="table-responsive">
				<?php if($this->session->tipe_user == 2) {?>
					<a href="<?= base_url("soal/tambah/".$id)?>" class="btn btn-outline-info me-1 mb-1">TAMBAH SOAL</a>
				<?php } ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col" width="80%">Pertanyaan</th>
							<th scope="col" class="text-end" width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tanya->result() as $key => $data) {; ?>
							<tr>
								<td><?= $data->soal ?></td>
								<td class="text-end text-primary">
									<?php if($this->session->tipe_user == 2) {?>
									<a href="<?= base_url("soal/hapus/" . $data->id."/subtema/".$this->uri->segment(3)) ?>"> Hapus</a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>

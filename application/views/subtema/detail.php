<!-- App Capsule -->
<div id="appCapsule">
	<div class="section full gradientSection">
		<div class="in">
			<h1 class="total"><?= $data->deskripsi ?></h1>
		</div>
	</div>

	<div class="section mt-3 mb-3">
		<div class="card">
			<div class="card-body">
				<h1 class="card-title">Video</h1>
				<p>Silahkan klik tombol dibawah untuk menonton video</p>
				<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalVideo">
					<ion-icon name="videocam-outline"></ion-icon> Tonton Video
				</a>
			</div>
		</div>
	</div>

	<div class="section mt-3 mb-3">
		<div class="card">
			<div class="card-body">
				<h1 class="card-title">Modul</h1>
				<p>Silahkan klik tombol dibawah untuk membaca modul</p>
				<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalModul">
					<ion-icon name="book-outline"></ion-icon> Baca Modul
				</a>
			</div>
		</div>
	</div>

	<div class="section mt-3 mb-3">
		<div class="card">
			<div class="card-body">
				<h1 class="card-title">Kuis</h1>
				<p>Silahkan klik tombol dibawah untuk mengerjakan quis</p>
				<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalKuis">
					<ion-icon name="reader-outline"></ion-icon> Kerjakan Kuis
				</a>
			</div>
		</div>
	</div>

</div>
<!-- * App Capsule -->

<!-- Modal Video -->
<div class="modal fade modalbox" id="ModalVideo" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Video <?= $data->deskripsi ?></h5>
				<div>
					<a href="<?= base_url("subtema/tambahvideo/" . $data->id) ?>"><?= $data->video != "" && $this->session->tipe_user == "2" ? "Edit" : ""; ?></a>
					<a href="#" data-bs-dismiss="modal">Close</a>
				</div>
			</div>
			<div class="modal-body">
				<?php if ($data->video == null) { ?>
					<div class="alert alert-danger mb-1" role="alert">
						Tidak ada data
					</div>
					<?php if ($this->session->tipe_user == 2) { ?>
						<div>
							<br><a href="<?= base_url("subtema/tambahvideo/" . $data->id) ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
						</div>
					<?php } ?>
				<?php } else { ?>
					<iframe class="rounded" width="100%" height="600px" src="https://www.youtube.com/embed/<?= $data->video ?>?rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- * Modal Video -->

<!-- Modal Modul -->
<div class="modal fade modalbox" id="ModalModul" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modul <?= $data->deskripsi ?></h5>
				<div>
					<a href="<?= base_url("subtema/tambahmodul/" . $data->id) ?>"><?= $data->modul != "" && $this->session->tipe_user == "2" ? "Edit" : ""; ?></a>
					<a href="#" data-bs-dismiss="modal">Close</a>
				</div>
			</div>
			<div class="modal-body">
				<?php if ($data->modul == null) { ?>
					<div class="alert alert-danger mb-1" role="alert">
						Tidak ada data
					</div>
					<?php if ($this->session->tipe_user == 2) { ?>
						<div>
							<br><a href="<?= base_url("subtema/tambahmodul/" . $data->id) ?>" class="btn btn-outline-success me-1 mb-1">Tambah Data</a>
						</div>
					<?php } ?>
				<?php } else { ?>
					<iframe src="https://drive.google.com/file/d/<?= $data->modul ?>/preview" frameborder="0" width="100%" height="700px"></iframe>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- * Modal Modul -->

<!-- Modal Kuis -->
<div class="modal fade modalbox" id="ModalKuis" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Kuis <?= $data->deskripsi ?></h5>
				<div>
					<a href="#" data-bs-dismiss="modal">Close</a>
				</div>
			</div>
			<div class="modal-body">
				<?php if ($this->session->tipe_user == "1") { ?>
					<h5><strong>PETUNJUK PENGERJAAN:</strong></h5>
					<ol start="1" type="1">
						<li>Berdoalah sebelum mengerjakan soal.</li>
						<li>Teliti soal terlebih dahulu.</li>
						<li>Untuk soal pilihan ganda, klik pada pilihan a, b, c, dan d pada jawaban yang Anda anggap benar.</li>
						<li>Setelah semua pertanyaan selesai dijawab, nilai skor soal Pilihan Ganda secara otomatis akan langsung keluar </li>
					</ol>
					<?php if ($this->fungsi->pilihan_advanced("tb_soal","subtema_id",$data->id)->num_rows() != null) { ?>
						<a href="<?= base_url("quiz/startQUiz/".$data->id)?>" class="btn btn-outline-info me-1 mb-1">KERJAKAN KUIS</a>
					<?php } else { ?>
						<div class="alert alert-danger mb-1" role="alert">
							Mohon Maaf, Saat Ini Tidak ada soal
						</div>
					<?php } ?>
				<?php } else if ($this->session->tipe_user == "2") { ?>
					<h5><strong>PETUNJUK PENAMBAHAN SOAL:</strong></h5>
					<ol start="1" type="1">
						<li>Soal terdiri dari pilihan ganda.</li>
						<li>Masukkan data soal anda.</li>
						<li>Klik simpan.</li>
					</ol>
					<a href="<?= base_url("soal/data/".$data->id)?>" class="btn btn-outline-info me-1 mb-1">TAMBAH SOAL</a>
				<?php } else { ?>
					<h5><strong>ANDA ADALAH ADMIN</strong></h5>
					<a href="<?= base_url("soal/data/".$data->id)?>" class="btn btn-outline-info me-1 mb-1">LIHAT SOAL</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- * Modal Kuis -->

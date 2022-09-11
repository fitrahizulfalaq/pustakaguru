<!-- Extra Header -->
<div class="extraHeader">
	<form class="search-form" action="<?= base_url("subtema/pencarian") ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
		<div class="form-group searchbox">
			<input name="katakunci" type="text" class="form-control">
			<i class="input-icon">
				<ion-icon name="search-outline"></ion-icon>
			</i>
		</div>
	</form>
</div>
<!-- * Extra Header -->

<!-- App Capsule -->
<div id="appCapsule" class="extra-header-active full-height">


	<div class="section mt-1 mb-2">
		<div class="section-title">Ditemukan <?= $row->num_rows();?> hasil untuk "<span class="text-primary"><?= $katakunci?></span>"</div>
		<div class="card">
			<ul class="listview image-listview media transparent flush">
				<?php foreach ($row->result() as $key => $data) {; ?>
				<li>
					<a href="<?= base_url("subtema/go/".$data->id)?>" class="item">
						<div class="imageWrapper">
							<img src="<?= base_url()?>/assets/img/default/1x1.png" alt="image" class="imaged w64">
						</div>
						<div class="in">
							<div>
								<?= $data->deskripsi?>
								<div class="text-muted">Sub Tema Dari: <?= $this->fungsi->pilihan_selected("tb_tema",$data->tema_id)->row("deskripsi") ?></div>
							</div>
						</div>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>




</div>
<!-- * App Capsule -->

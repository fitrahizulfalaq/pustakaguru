<!-- App Capsule -->
<div id="appCapsule">
<?= form_open_multipart('quiz/quizResult')?>
		<!-- carousel slider -->
		<div class="carousel-slider splide">
			<div class="splide__track">
				<ul class="splide__list">
					<?php
						$no = null;
						foreach ($row->result() as $key => $dataso) {;
					?>
					<li class="splide__slide p-2">
						<!-- <img src="assets/img/sample/photo/vector1.png" alt="alt" class="imaged w-100 square mb-4"> -->
						<h2>Soal No <?= ++$no?></h2>
						<div class="alert alert-info mb-1" role="alert">
							<p align="left"><?=$dataso->soal?></p>
						</div>
						<p align="left">
							<input type="hidden" name="id[]" value="<?=$dataso->id?>">
							<input type="radio" name="pilihan[<?=$dataso->id?>]" value="A<?= $dataso->pil_a?>" required> A.  <?= $dataso->pil_a?> <br>
							<input type="radio" name="pilihan[<?=$dataso->id?>]" value="B<?= $dataso->pil_b?>"> B.  <?= $dataso->pil_b?> <br>
							<input type="radio" name="pilihan[<?=$dataso->id?>]" value="C<?= $dataso->pil_c?>"> C.  <?= $dataso->pil_c?> <br>
							<input type="radio" name="pilihan[<?=$dataso->id?>]" value="D<?= $dataso->pil_d?>"> D.  <?= $dataso->pil_d?> <br>
							<input type="radio" name="pilihan[<?=$dataso->id?>]" value="E<?= $dataso->pil_e?>"> E.  <?= $dataso->pil_e?> <br>
						</p>
					</li>
					
					<?php }?>					
				</ul>
			</div>
		</div>
		<!-- * carousel slider -->

		<div class="carousel-button-footer">
			<div class="row">
				<div class="col-6">
					<a href="<?=base_url("subtema/detail/".$this->uri->segment(3))?>" class="btn btn-outline-secondary btn-lg btn-block">Kembali</a>
				</div>
				<div class="col-6">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Nilai</button>
				</div>
			</div>
		</div>
	<input type="hidden" name="jumlah" value="<?=$row->num_rows()?>">
	<input type="hidden" name="subtema_id" value="<?=$this->uri->segment(3)?>">
	<?= form_close() ?>



</div>
<!-- * App Capsule -->

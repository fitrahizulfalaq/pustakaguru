<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
	<div class="left">
		<a href="#" class="headerButton goBack">
			<ion-icon name="chevron-back-outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle"></div>
	<div class="right">
		<a href="<?= base_url('auth/login') ?>" class="headerButton">
			Login
		</a>
	</div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

	<div class="section mt-2 text-center">
		<h1>Pendaftaran Akun</h1>
		<h4>Silahkan Mengisi Form Data Berikut</h4>
	</div>

	<div class="section mb-5 p-2">
		<?= form_open_multipart('') ?>
		<div class="card">
			<div class="card-body">
				<?php $this->view('message') ?>
				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="username">Username</label>
						<input type="username" name="username" class="form-control" id="username" placeholder="Ex: fitrahizulfalaq" value="<?= set_value('username'); ?>" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('username') ?>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="password">Password</label>
						<input type="password" name="password" class="form-control" id="password" autocomplete="off" placeholder="Password Kamu" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('password') ?>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="nama">Nama</label>
						<input type="nama" name="nama" class="form-control" id="username" placeholder="Ex: Fitrah Izul Falaq" value="<?= set_value('nama'); ?>" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('nama') ?>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="email">E-mail</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="fitrah@bikinkarya.com" value="<?= set_value('email'); ?>" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('email') ?>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="hp">HP</label>
						<input type="text" name="hp" class="form-control" id="hp" placeholder="081231390340" maxlength="15" minlength="11" value="<?= set_value('hp'); ?>" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('hp') ?>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="tgl_lahir">Tanggal Lahir</label>
						<input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('tgl_lahir') ?>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="tempat_lahir">Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Probolinggo" value="<?= set_value('tempat_lahir'); ?>" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
					<?php echo form_error('tempat_lahir') ?>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="kunci">Mendaftar Sebagai</label>
						<select name="tipe_user" onchange="ShowSyaratRelawan(this.value)" class="form-control custom-select" id="tipe">
							<option value="1">Pelajar</option>
							<option value="2">Relawan</option>
						</select>
					</div>
				</div>

				<div class="custom-control custom-checkbox mt-2 mb-1">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="customCheckb1" required>
						<label class="form-check-label" for="customCheckb1">
							Seluruh data yang saya inputkan sudah benar
						</label>
					</div>
				</div>

				<div class="custom-control custom-checkbox mt-2 mb-1" style="display: none;" id="syarat-relawan">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" checked>
						<label class="form-check-label" for="customCheckb2">
						Saya tidak akan menghapus video, modul atau hal lain yang telah dibuat oleh volunteer tanpa izin dari admin EDScience atau menggunakan aplikasi ini untuk hal yang tidak pantas. Apabila saya melakukannya, saya bersedia mendapatkan sanksi sesuai dengan Undang-Undang yang berlaku.
						</label>
					</div>
				</div>
			</div>



		</div>
	</div>



	<div class="form-button-group transparent">
		<button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
	</div>

	<?= form_close() ?>
</div>

</div>
<!-- * App Capsule -->

<script type="text/javascript">
      function ShowSyaratRelawan(val)
      {
        console.log(val);
		var x = document.getElementById("syarat-relawan");
		if (val === "1") {
			x.style.display = "none";
			console.log("Pelajar");
		} if (val === "2") {
			x.style.display = "block";
			console.log("Relawan");
		}			
      }
 </script>
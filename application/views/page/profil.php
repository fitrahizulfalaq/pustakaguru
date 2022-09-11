<!-- App Capsule -->
<div id="appCapsule">

	<div class="section mt-3 text-center">
		<div class="avatar-section">
			<a href="#">
				<img src="<?= base_url() ?>/assets/img/default/1x1.png" alt="avatar" class="imaged w100 rounded">
			</a>		
		</div>
	</div>
	<div class="section mt-3 text-center">
		<div class="avatar-section">
			<p><?= $this->session->nama?></p>
		</div>
	</div>

	<div class="listview-title mt-1">Theme</div>
	<ul class="listview image-listview text inset no-line">
		<li>
			<div class="item">
				<div class="in">
					<div>
						Dark Mode
					</div>
					<div class="form-check form-switch  ms-2">
						<input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
						<label class="form-check-label" for="darkmodeSwitch"></label>
					</div>
				</div>
			</div>
		</li>
	</ul>

	<div class="listview-title mt-1">Menu</div>
	<ul class="listview image-listview text inset">
		<!-- <li>
		<a href="#" class="item">
			<div class="in">
				<div>Perbarui Profil</div>
			</div>
		</a>
	</li> -->
		<li>
			<a href="<?= base_url("page/pembuat") ?>" class="item">
				<div class="in">
					<div>Tentang Pengembang</div>
				</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url("auth/logout") ?>" class="item">
				<div class="icon-box bg-primary">
					<ion-icon name="log-out-outline"></ion-icon>
				</div>
				<div class="in">
					Log out
				</div>
			</a>
		</li>
	</ul>



</div>
<!-- * App Capsule -->

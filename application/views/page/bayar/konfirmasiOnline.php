<!-- App Capsule -->
<div id="appCapsule">

	<div class="section">
		<div class="splash-page mt-5 mb-5">
			<h2 class="mb-2 mt-2">Petunjuk Pembayaran Otomatis</h2>
			<br>
			<p align="left">
				Sistem pembayaran ini akan secara otomatis mengaktifkan layanan yang akan bapak/ibu beli. Sebelum melakukan pembayaran pastikan beberapa hal berikut : <br><br>

				1. Pastikan Mengingat Akun Login (Terdiri dari : Email dan 4 digit terakhir nomor HP)<br>
				2. Batas waktu pembayaran berlansung selama <b>15 menit</b>.<br>
				3. Pembayaran dapat dilakukan melaui <b><u>Virtual Account (VA) Bank BCA, BNI, BRI, Mandiri, BSI Syariah, dan Bank Muamalat</b></u><br>
				4. Pembayaran E-Wallet bisa melaui QRIS melalui <b><u>Scan Aplikasi DANA, LinkAja, OVO, ShopeePay, Jenius, GoPay, dan Mobile Banking QRIS (BNI, BCA, BRI, dll yang mendukung fitur QRIS)</b></u><br>
				5. <b>TIDAK ADA BIAYA ADMIN.</b><br>
				6. Jangan Tutup Laman Pembayaran sebelum selesai melakukan pembayaran (Minimize Chrome / Broser Anda)<br>
				7. Jangan mengganti Nama, HP, dan Alamat Email Saat Pendaftaran<br>
			</p>
			<div class="alert alert-secondary mb-1" role="alert">
				Infromasi: Pembayaran optimal jika dilakukan melalui QRIS. Apabila ada kendala bisa menghubungi admin di nomor <a href="https://wa.me/+6289523832229" target="_blank">089523832229</a>  
			</div>
		</div>
	</div>

	<div class="fixed-bar">
		<div class="row">
			<div class="col-6">
				<a onclick="window.history.go(-1)" class="btn btn-lg btn-outline-secondary btn-block">Kembali</a>
			</div>
			<div class="col-6">
				<a href="https://project.bikinkarya.com/bayar?<?= "username=" . $this->session->username . "&email=" . $this->session->email . "&userid=" . $this->session->id . "&hp=" . $this->session->hp ?>" class="btn btn-lg btn-primary btn-block">LANJUT BAYAR</a>
			</div>
		</div>
	</div>
</div>
<!-- * App Capsule -->
<br><br>

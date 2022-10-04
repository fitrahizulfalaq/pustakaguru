<div id="appCapsule">
	<div class="section full gradientSection">
		<div class="in">
			<h1 class="total">Konfirmasi Pembelian</h1>
		</div>
	</div>

	<div class="section mt-4">
		<?php $this->view('message') ?>
		<div class="goals">
        <h2>Pembelian Koin Seharga Rp. <?= $harga ?></h2>
        <h4>Anda akan mendapatkan poin sebanyak <span class="badge badge-success">++<?= $koin ?></span></h4>
        <hr>        
		<div class="text text-left mb-5">
			<p>
				Petunjuk Pembayaran :
                <ol>
                    <li>Batas waktu pembayaran berlansung selama <b>50 menit</b>.</li>
                    <li>Pembelian hanya dapat dilakukan setiap 1 jam sekali</li>
                    <li>Pembayaran dapat dilakukan melaui <b><u>Virtual Account (VA) Bank BCA, BNI, BRI, Mandiri, BSI Syariah, dan Bank Muamalat</b></u>.</li>
                    <li>Pembayaran E-Wallet bisa melaui QRIS melalui <b><u>Scan Aplikasi DANA, LinkAja, OVO, ShopeePay, Jenius, GoPay, dan Mobile Banking QRIS (BNI, BCA, BRI, dll yang mendukung fitur QRIS)</b></u></li>
                    <li>TIDAK ADA BIAYA ADMIN.</li>
                    <li>Jangan Tutup Laman Pembayaran sebelum selesai melakukan pembayaran (Minimize Chrome / Browser Anda).</li>
                    <li>Jangan mengganti Nama, HP, dan Alamat Email Saat Pembayaran.</li>
                </ol>
            </p>
		</div>

		<div class="fixed-footer">
			<div class="row">
				<div class="col-6">
					<a href="<?=base_url("topup")?>" class="btn btn-secondary btn-lg btn-block"><ion-icon name="arrow-back-outline"></ion-icon> Batal</a>
				</div>
				<div class="col-6">
					<a href="<?=base_url("topup/proses?coin=".$koin)?>" class="btn btn-success btn-lg btn-block" onclick="this.innerHTML='Proses')"><ion-icon name="cash-outline"></ion-icon> Beli Koin</a>
				</div>
			</div>
		</div>
		</div>

	</div>
</div>
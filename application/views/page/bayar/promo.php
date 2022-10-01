<!-- App Capsule -->
<div id="appCapsule">

    <div class="section">
        <div class="splash-page mt-5 mb-5">
            <h2 class="mb-2 mt-2">Harga Promo Sampai</h2>
            <div >
            <script src="https://cdn.logwork.com/widget/countdown.js"></script>
<a href="https://logwork.com/countdown-w6o2s" class="countdown-timer" style="color: currentColor;
  cursor: not-allowed;pointer-events: none;
  opacity: 0.5;
  text-decoration: none;" data-timezone="Asia/Jakarta" data-date="2022-10-02 23:00">PROMO BERHAKHIR PADA</a>
            </div>
            <p align="left">
                <br>
            <h4>Klik Tiket Sesuai Kebutuhan Anda</h4>                
            <div class="alert alert-warning mb-1" role="alert">
                <a href="<?= base_url("bayar?")."username=" . $this->session->username . "&email=" . $this->session->email . "&userid=" . $this->session->id . "&hp=" . $this->session->hp."&harga=25000&jumlah=1" ?>" class="btn btn-warning btn-block">
                    <ion-icon name="star-outline"></ion-icon> 1 Tiket / 25.000
                </a><br>
            </div>
            <div class="alert alert-warning mb-1" role="alert">
                <a href="<?= base_url("bayar?")."username=" . $this->session->username . "&email=" . $this->session->email . "&userid=" . $this->session->id . "&hp=" . $this->session->hp."&harga=15000&jumlah=2" ?>" class="btn btn-warning btn-block">
                    <ion-icon name="star-outline"></ion-icon> 2 Tiket / 30.000
                </a><br>
            </div>
            <div class="alert alert-warning mb-1" role="alert">
                <a href="<?= base_url("bayar?")."username=" . $this->session->username . "&email=" . $this->session->email . "&userid=" . $this->session->id . "&hp=" . $this->session->hp."&harga=10000&jumlah=4" ?>" class="btn btn-warning btn-block">
                    <ion-icon name="star-outline"></ion-icon> 4 Tiket / 40.000
                </a><br>
            </div>
            <div class="alert alert-warning mb-1" role="alert">
                <a href="<?= base_url("bayar?")."username=" . $this->session->username . "&email=" . $this->session->email . "&userid=" . $this->session->id . "&hp=" . $this->session->hp."&harga=25000&jumlah=1" ?>" class="btn btn-warning btn-block disabled">
                    <ion-icon name="star-outline"></ion-icon> 1 Tiket / 45.000
                </a><br>
            </div>
            </p>
            <div class="alert alert-secondary mb-1" role="alert">
                Infromasi: Pembayaran optimal jika dilakukan melalui QRIS. Apabila ada kendala bisa menghubungi admin di nomor <a href="https://wa.me/+6289523832229" target="_blank">089523832229</a>
            </div>
        </div>
    </div>

    <div class="fixed-bar">
        <div class="row">
            <div class="col-12">
                <a href="<?= base_url("")?>" class="btn btn-lg btn-outline-secondary btn-block">Kembali</a>
            </div>            
        </div>
    </div>
</div>
<!-- * App Capsule -->
<br><br>
<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
    <div class="left">
        <a href="<?= base_url() ?>" class="headerButton goBack">
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

    <div class="text-center">
        <img src="https://pustakaguru.id/wp-content/uploads/2022/10/TRYOUT-GRATIS-PPPK-GURU-OLEH-PUSTAKA-GURU-INDONESIA.png" alt="" class="img-fluid">
    </div>

    <div class="section mt-2 text-center">
        <h1>Aktivasi Akses Tryout PPPK</h1>
        <h4>diselenggarakan oleh PUSTAKAGURU.ID</h4>
    </div>

    
    <div class="section mb-5 p-2">
        <?= form_open_multipart('') ?>
        <div class="card">
            <div class="card-body">
                <?php $this->view('message') ?>
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama">Nama</label>
                        <input type="nama" name="nama" class="form-control" id="username" placeholder="Ex: Muhammad Firdaus" value="<?= set_value('nama'); ?>" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <?php echo form_error('nama') ?>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="firdaus@bikinkarya.com" value="<?= set_value('email'); ?>" required>
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
                        <input type="text" name="referal" class="form-control" id="referal" placeholder="kode referal" maxlength="15" minlength="11" value="<?= $this->input->get('ref') ?>" <?= $this->input->get('ref') != null ? "readonly" : "hidden" ?>>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <?php echo form_error('referal') ?>
                </div>

                <div class="custom-control custom-checkbox mt-2 mb-1">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheckb1" required>
                        <label class="form-check-label" for="customCheckb1">
                            Seluruh data yang saya inputkan sudah benar
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
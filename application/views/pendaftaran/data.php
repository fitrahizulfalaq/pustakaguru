<div id="appCapsule">
    <div class="section mt-2">
        <div class="section-heading">
            <h2 class="title">Data Pendaftar Baru</h2>
            <a href="<?= base_url("pendaftaran/dataAll/") ?>" class="link">Semua</a>
        </div>
        <div class="card">
            <?php $this->view('message') ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="80%">Nama</th>
                            <th scope="col" class="text-end" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) {; ?>
                            <tr>
                                <td>
                                    <span class="badge badge-primary"><?= $data->tipe_user == "2" ? "relawan" : "pelajar" ?></span> <?= $data->nama ?><br>
                                </td>
                                <td class="text-end text-primary">
                                    <a href="<?= base_url("pendaftaran/acc/" . $data->id) ?>">ACC</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<br>
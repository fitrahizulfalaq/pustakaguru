<div id="appCapsule">
    <div class="section mt-2">
        <div class="section-heading">
            <h2 class="title">Riwayat Pembelian</h2>
            <!-- <a href="<?= base_url("pendaftaran/dataAll/") ?>" class="link">Semua</a> -->
        </div>
        <div class="card">
            <?php $this->view('message') ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="50%">Nama</th>
                            <th scope="col" width="30%">Poin</th>
                            <th scope="col" width="20%">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) {; ?>
                            <tr>
                                <td><?= $this->fungsi->pilihan_selected("tb_user",$data->user_id)->row("nama") ?></td>                               
                                <td><?= $data->tipe == "debit" ? "++" : "--"?> <?= $data->poin ?> (<?= $data->tipe?>)</td>                               
                                <td><?= $data->created ?></td>                               
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display:flex; justify-content: space-between;">
                    <h4 class="card-title">Daftar Pendaftaran</h4>
                    <div style="display: flex;">
                        <form action="" class="mr-2 " style="display: flex;">
                            <input type="date" class="form-control form-control-sm" style="height: 5px;" name="tanggal">
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                        <a style="display: flex; justify-content: center; align-items: center;" href="<?= base_url("laporan/print?tanggal=" . ($_GET['tanggal'] ?? '')) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Antrian</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($antrian as $index => $antrian) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $antrian->antrian ?></td>
                                    <td><?= $antrian->nama_pasien ?></td>
                                    <td><?= $antrian->nama_dokter ?></td>
                                    <td><?= $antrian->tanggal ?></td>
                                    <td>
                                        <?= $antrian->status_konsul ?? "-" ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
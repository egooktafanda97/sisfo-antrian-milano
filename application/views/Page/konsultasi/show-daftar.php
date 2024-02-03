<div class="row">
    <div class="col-12">
        <div style="display: flex; justify-content: flex-end;" class="mb-2">
            <a style="min-width: 100px;" href="<?= base_url("Konsultasi/next_queues") ?>" class="btn btn-primary btn-sm <?= !empty($antrian_data_act) ? 'disabled' : '' ?>">
                <?php
                if (count($antrian_data) > 0 && empty($antrian_data_act))
                    echo "Antrian Selanjutnya";
                else if (count($antrian_data) == 0)
                    echo "Tidak ada antrian";
                else if (count($antrian_data) > 0 && empty($antrian_data_act))
                    echo "Mulai proses konsultasi";
                else if (!empty($antrian_data_act))
                    echo "selesaikan konsultasi";
                ?>
            </a>
        </div>

        <div class="card card-body">
            <div class="table-responsive">
                <?php if (!empty($antrian_data_act)) : ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Antrian</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $antrian_data_act->antrian ?></td>
                                <td><?= $antrian_data_act->nama_pasien ?></td>
                                <td><?= $antrian_data_act->nama_dokter ?></td>
                                <td><?= $antrian_data_act->tanggal ?></td>
                                <td>
                                    <div class="flex text-white">
                                        <a href="<?= base_url("Konsultasi/reject/" . $antrian_data_act->id_antrian) ?>" class="btn btn-secondary btn-sm">Batal</a>
                                        <a href="<?= base_url("Konsultasi/done/" . $antrian_data_act->id_antrian) ?>" class="btn btn-success btn-sm">Selesai</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                <?php else : ?>
                    <p>Belum ada antrian yang diproses</p>
                <?php endif ?>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">Daftar Pendaftaran</h4>

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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($antrian_data as $index => $antrian) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $antrian->antrian ?></td>
                                    <td><?= $antrian->nama_pasien ?></td>
                                    <td><?= $antrian->nama_dokter ?></td>
                                    <td><?= $antrian->tanggal ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
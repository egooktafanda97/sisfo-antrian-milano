<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="card-title">Data Dokter</h4>
                    <div>
                        <a href="<?= base_url("Dokter/store") ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th><?= ucwords(str_replace('_', ' ', 'kode_doketer')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'nama_dokter')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'tempat_lahir')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'tanggal_lahir')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'alamat')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'jenis_kelamin')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'pendidikan_akhir')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'layanan_id')) ?></th>
                                <th><?= ucwords(str_replace('_', ' ', 'status')) ?></th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dokter as $v) : ?>
                                <tr>
                                    <td><?= $v['kode_dokter'] ?></td>
                                    <td><?= $v['nama_dokter'] ?></td>
                                    <td><?= $v['tempat_lahir'] ?></td>
                                    <td><?= $v['tanggal_lahir'] ?></td>
                                    <td><?= $v['alamat'] ?></td>
                                    <td><?= $v['jenis_kelamin'] ?></td>
                                    <td><?= $v['pendidikan_akhir'] ?></td>
                                    <td><?= $v['layanan_id'] ?></td>
                                    <td><?= $v['status'] ?></td>
                                    <td>
                                        <div style="width: 100%; display: flex;">
                                            <a href="<?= base_url("Dokter/store?id=" . $v['id']) ?>" class="btn btn-success btn-sm mr-1 ml-1"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url("Dokter/delete?id=" . $v['id']) ?>" class="btn btn-danger btn-sm mr-1 ml-1"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
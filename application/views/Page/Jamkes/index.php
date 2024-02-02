<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('jamkes/tambah') ?>" class="btn btn-primary mb-5 float-right">
                    TAMBAH DATA
                </a>
                <h4 class="card-title">Jaminan Kesehatan</h4>
                <div class="table-responsive">
				<table class="table table-striped table-bordered " id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Singkatan</th>
                                <th>Nama Jamkes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jamkes_data as $index => $jamkes): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $jamkes->singkatan ?></td>
                                <td><?= $jamkes->nama_jamkes ?></td>
                                <td>
                                    <a href="<?= base_url('jamkes/edit/' . $jamkes->id_jamkes) ?>" class="btn btn-sm btn-info">Edit</a>
                                    <a href="<?= base_url('jamkes/deleteJamkes/' . $jamkes->id_jamkes) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Singkatan</th>
                                <th>Nama Jamkes</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

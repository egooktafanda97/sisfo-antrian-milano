
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Daftar Pendaftaran</h4>
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
                            <?php foreach ($antrian_data as $index => $antrian): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $antrian->antrian ?></td>
                                    <td><?= $antrian->nama_pasien ?></td>
                                    <td><?= $antrian->nama_dokter ?></td>
                                    <td><?= $antrian->tanggal ?></td>
                                    <td><?= $antrian->status ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

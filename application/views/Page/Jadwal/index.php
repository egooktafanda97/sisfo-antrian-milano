<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<a href="<?= base_url('jadwal/tambah') ?>" class="btn btn-primary mb-5 float-right">
					TAMBAH DATA
				</a>
				<h4 class="card-title">Jadwal</h4>
				<div class="table-responsive">
					<table class="table table-striped table-bordered " id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Dokter</th>
								<th>Bagian</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($jadwal_data as $index => $jadwal): ?>
							<tr>
								<td><?= $index + 1 ?></td>
								<td><?= $jadwal->nama_dokter ?></td>
								<td><?= $jadwal->bagian ?></td>
								<td><?= $jadwal->hari_pertama ?> s/d <?= $jadwal->hari_terakhir ?></td>
								<td><?= $jadwal->jam_pertama ?> s/d <?= $jadwal->jam_terakhir ?></td>
								<td>
									<a href="<?= base_url('jadwal/edit/' . $jadwal->id_jadwal) ?>"
										class="btn btn-sm btn-info">Edit</a>
									<a href="<?= base_url('jadwal/deleteJadwal/' . $jadwal->id_jadwal) ?>"
										class="btn btn-sm btn-danger"
										onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Dokter</th>
								<th>Bagian</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

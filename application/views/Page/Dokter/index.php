<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<a href="<?= base_url('dokter/tambah') ?>" class="btn btn-primary mb-5 float-right">
					TAMBAH DATA
				</a>
				<h4 class="card-title">Dokter</h4>
				<div class="table-responsive">
				<table class="table table-striped table-bordered " id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>Status</th>
								<th>Pendidikan Akhir</th>
								<th>Layanan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($dokter_data as $index => $dokter): ?>
							<tr>
								<td><?= $index + 1 ?></td>
								<td><?= $dokter->nama_dokter ?></td>
								<td><?= $dokter->tempat_lahir ?></td>
								<td><?= $dokter->tanggal_lahir ?></td>
								<td><?= $dokter->alamat ?></td>
								<td><?= $dokter->jenis_kelamin ?></td>
								<td><?= $dokter->status ?></td>
								<td><?= $dokter->pendidikan_akhir ?></td>
								<td><?= $dokter->layanan_nama ?></td>
								<td>
									<a href="<?= base_url('dokter/edit/' . $dokter->id_dokter) ?>"
										class="btn btn-sm btn-info">Edit</a>
									<!-- Add this link/button in the loop where you display dokter data -->
									<a href="<?= base_url('dokter/deleteDokter/' . $dokter->id_dokter) ?>"
										class="btn btn-sm btn-danger"
										onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>

								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>Status</th>
								<th>Pendidikan Akhir</th>
								<th>Layanan</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

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
								<th>Nama</th>
								<th>Alamat</th>
								<th>No. WA</th>
								<th>Jenis Kelamin</th>
								<th>Umur</th>
								<th>Berat Badan</th>
								<th>Tanggal Besuk</th>
								<th>Penyakit</th>
								<th>Dokter</th>
								<th>Jamkes</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($daftar_data as $index => $daftar): ?>
							<tr>
								<td><?= $index + 1 ?></td>
								<td><?= $daftar->nama ?></td>
								<td><?= $daftar->alamat ?></td>
								<td><?= $daftar->nowa ?></td>
								<td><?= $daftar->jenis_kelamin ?></td>
								<td><?= $daftar->umur ?></td>
								<td><?= $daftar->berat_badan ?></td>
								<td><?= $daftar->tanggal_besuk ?></td>
								<td><?= $daftar->penyakit ?></td>
								<td><?= $daftar->nama_dokter ?></td>
								<td><?= $daftar->singkatan ?> (<?= $daftar->nama_jamkes ?>)</td>
								<td>
									<?php if (!$daftar->id_antrian): ?>
									<a href="<?= base_url('pendaftaran/konfirmasiPendaftaran/' . $daftar->id_daftar) ?>"
										class="btn btn-sm btn-info">Konfirmasi</a>
									<?php else: ?>
									<!-- Tombol akan disembunyikan jika id_antrian sudah terisi -->
									<button class="btn btn-sm btn-secondary" disabled>Konfirmasi</button>
									<?php endif; ?>
								</td>

							</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No. WA</th>
								<th>Jenis Kelamin</th>
								<th>Umur</th>
								<th>Berat Badan</th>
								<th>Tanggal Besuk</th>
								<th>Penyakit</th>
								<th>Dokter</th>
								<th>Jamkes</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

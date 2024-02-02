<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
			<a href="<?= base_url('layanan/tambah') ?>" class="btn btn-primary mb-5 float-right">
                    TAMBAH DATA
                </a>
				<h4 class="card-title">Layanan</h4>
				<div class="table-responsive">
				<table class="table table-striped table-bordered " id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Layanan Medis</th>
								<th>Info Medis</th>
								<th>Kode Layanan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($layanan_data as $index => $layanan): ?>
							<tr>
								<td><?= $index + 1 ?></td> 
								<td><?= $layanan->nama ?></td>
								<td><?= $layanan->layanan_medis ?></td>
								<td><?= $layanan->info_medis ?></td>
								<td><?= $layanan->kode_layanan ?></td>
								<td>
								<a href="<?= base_url('layanan/edit/' . $layanan->id_layanan) ?>" class="btn btn-sm btn-info">Edit</a>
								<a href="<?= base_url('layanan/deleteLayanan/' . $layanan->id_layanan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Layanan Medis</th>
								<th>Info Medis</th>
								<th>Kode Layanan</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

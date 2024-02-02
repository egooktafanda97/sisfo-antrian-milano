<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<!-- Edit Form -->
				<form action="<?= base_url('layanan/updateLayanan') ?>" method="post">
					<input type="hidden" name="id_layanan" value="<?= $layanan->id_layanan ?>">
					<div class="form-group">
						<label for="nama">Nama:</label>
						<input type="text" class="form-control" name="nama" value="<?= $layanan->nama ?>" required>
					</div>
					<div class="form-group">
						<label for="layanan_medis">Layanan Medis:</label>
						<input type="text" class="form-control" name="layanan_medis"
							value="<?= $layanan->layanan_medis ?>" required>
					</div>
					<div class="form-group">
						<label for="info_medis">Info Medis:</label>
						<input type="text" class="form-control" name="info_medis" value="<?= $layanan->info_medis ?>"
							required>
					</div>
					<div class="form-group">
						<label for="kode_layanan">Kode Layanan:</label>
						<input type="text" class="form-control" name="kode_layanan"
							value="<?= $layanan->kode_layanan ?>" required>
					</div>
					<!-- Tambahkan field lainnya sesuai kebutuhan -->

					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

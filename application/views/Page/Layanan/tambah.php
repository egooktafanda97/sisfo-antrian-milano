<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('layanan/tambahLayanan') ?>" method="post">
					<div class="form-group">
						<label for="nama">Nama:</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="form-group">
						<label for="layanan_medis">Layanan Medis:</label>
						<input type="text" class="form-control" name="layanan_medis" required>
					</div>
					<div class="form-group">
						<label for="info_medis">Info Medis:</label>
						<input type="text" class="form-control" name="info_medis" required>
					</div>
					<div class="form-group">
						<label for="kode_layanan">Kode Layanan:</label>
						<input type="text" class="form-control" name="kode_layanan" required>
					</div>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>

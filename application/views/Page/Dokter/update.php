<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<!-- Edit Form -->
				<form action="<?= base_url('dokter/editDokter') ?>" method="post">
					<input type="hidden" name="id_dokter" value="<?= $dokter->id_dokter ?>">
					<div class="form-group">
						<label for="nama_dokter">Nama Dokter:</label>
						<input type="text" class="form-control" name="nama_dokter" value="<?= $dokter->nama_dokter ?>" required>
					</div>
					<div class="form-group">
						<label for="tempat_lahir">Tempat Lahir:</label>
						<input type="text" class="form-control" name="tempat_lahir" value="<?= $dokter->tempat_lahir ?>" required>
					</div>
					<div class="form-group">
						<label for="tanggal_lahir">Tanggal Lahir:</label>
						<input type="date" class="form-control" name="tanggal_lahir" value="<?= $dokter->tanggal_lahir ?>" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat:</label>
						<input type="text" class="form-control" name="alamat" value="<?= $dokter->alamat ?>" required>
					</div>
					<div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" required>
                            <option value="Laki-laki" <?= ($dokter->jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($dokter->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
					<div class="form-group">
						<label for="status">Status:</label>
						<input type="text" class="form-control" name="status" value="<?= $dokter->status ?>" required>
					</div>
					<div class="form-group">
						<label for="pendidikan_akhir">Pendidikan Akhir:</label>
						<input type="text" class="form-control" name="pendidikan_akhir" value="<?= $dokter->pendidikan_akhir ?>" required>
					</div>
					<div class="form-group">
						<label for="id_layanan">Layanan:</label>
						<select class="form-control" name="id_layanan" required>
							<?php foreach ($layanan_data as $layanan): ?>
								<option value="<?= $layanan->id_layanan ?>" <?= ($dokter->id_layanan == $layanan->id_layanan) ? 'selected' : '' ?>>
									<?= $layanan->nama ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<!-- Tambahkan field lainnya sesuai kebutuhan -->

					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

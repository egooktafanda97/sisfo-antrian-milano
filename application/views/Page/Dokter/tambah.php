<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('dokter/tambahDokter') ?>" method="post">
					<div class="form-group">
						<label for="nama_dokter">Nama Dokter:</label>
						<input type="text" class="form-control" name="nama_dokter" required>
					</div>
					<div class="form-group">
						<label for="tempat_lahir">Tempat Lahir:</label>
						<input type="text" class="form-control" name="tempat_lahir" required>
					</div>
					<div class="form-group">
						<label for="tanggal_lahir">Tanggal Lahir:</label>
						<input type="date" class="form-control" name="tanggal_lahir" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat:</label>
						<input type="text" class="form-control" name="alamat" required>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin:</label>
						<select class="form-control" name="jenis_kelamin" required>
							<option value="">--- JENIS KELAMIN ---</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="status">Status:</label>
						<input type="text" class="form-control" name="status" required>
					</div>
					<div class="form-group">
						<label for="pendidikan_akhir">Pendidikan Terakhir </label>
						<select name="pendidikan_akhir" class="form-control" placeholder="Pendidikan Terakhir" required="">
							<option disabled="" readonly>Pendidikan Terakhir</option>
							<option value="">--- PENDIDIKAN AKHIR ---</option>
							<option value="Doktor">Doktor (S3)</option>
							<option value="Magister">Magister (S2)</option>
							<option value="Sarjana">Sarjana (S1)</option>
							<option value="Diploma 3">Diploma 3</option>
							<option value="Diploma 2">Diploma 2</option>
							<option value="Diploma 1">Diploma 1</option>
							<option value="SMA">SMA</option>
							<option value="SMK">SMK</option>
							<option value="SMP">SMP</option>
							<option value="SD">SD</option>
						</select>
					</div>
					<div class="form-group">
						<label for="id_layanan">Layanan:</label>
						<select class="form-control" name="id_layanan" required>
							<option value="">--- LAYANAN ---</option>

							<?php foreach ($layanan_data as $layanan): ?>
							<option value="<?= $layanan->id_layanan ?>"><?= $layanan->nama ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<!-- Tambahkan field lainnya sesuai kebutuhan -->

					<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>

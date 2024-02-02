<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<!-- Daftar Form -->
				<form action="<?= base_url('website/daftar/simpanDaftar') ?>" method="post">
					<div class="form-group">
						<label for="nama">Nama:</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat:</label>
						<input type="text" class="form-control" name="alamat" required>
					</div>
					<div class="form-group">
						<label for="nowa">Nomor WhatsApp:</label>
						<input type="text" class="form-control" name="nowa" placeholder="628" required>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin:</label>
						<select class="form-control" name="jenis_kelamin" required>
                        <option value="">--- PILIH JENIS KELAMIN ---</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="umur">Umur:</label>
						<input type="text" class="form-control" name="umur" required>
					</div>
					<div class="form-group">
						<label for="berat_badan">Berat Badan:</label>
						<input type="text" class="form-control" name="berat_badan" required>
					</div>
					<div class="form-group">
						<label for="tanggal_besuk">Tanggal Besuk:</label>
						<input type="date" class="form-control" name="tanggal_besuk" required>
					</div>
					<div class="form-group">
						<label for="penyakit">Penyakit:</label>
						<input type="text" class="form-control" name="penyakit" required>
					</div>
					<div class="form-group">
						<label for="id_dokter">Dokter:</label>
						<select class="form-control" name="id_dokter" required>
							<option value="">--- PILIH DOKTER ---</option>
							<?php foreach ($dokter_data as $dokter): ?>
							<option value="<?= $dokter->id_dokter ?>"><?= $dokter->nama_dokter ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id_jamkes">Jamkes:</label>
						<select class="form-control" name="id_jamkes">
							<option value="">--- PILIH JAMKES ---</option>
							<?php foreach ($jamkes_data as $jamkes): ?>
							<option value="<?= $jamkes->id_jamkes ?>"><?= $jamkes->singkatan ?>
								(<?= $jamkes->nama_jamkes ?>)</option>
							<?php endforeach; ?>
						</select>
					</div>
					<br>
					<br>
					<button type="submit" class="btn btn-primary">Daftar</button>
				</form>
			</div>
		</div>
	</div>
</div>

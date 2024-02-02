<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<!-- Edit Form for Jamkes -->
				<form action="<?= base_url('jamkes/updateJamkes') ?>" method="post">
					<input type="hidden" name="id_jamkes" value="<?= $jamkes->id_jamkes ?>">
					<div class="form-group">
						<label for="singkatan">Singkatan:</label>
						<input type="text" class="form-control" name="singkatan" value="<?= $jamkes->singkatan ?>" required>
					</div>
					<div class="form-group">
						<label for="nama_jamkes">Nama Jamkes:</label>
						<input type="text" class="form-control" name="nama_jamkes" value="<?= $jamkes->nama_jamkes ?>" required>
					</div>
					<!-- Tambahkan field lainnya sesuai kebutuhan -->

					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

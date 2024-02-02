<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('jamkes/tambahJamkes') ?>" method="post">
                    <div class="form-group">
                        <label for="singkatan">Singkatan:</label>
                        <input type="text" class="form-control" name="singkatan" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_jamkes">Nama Jamkes:</label>
                        <input type="text" class="form-control" name="nama_jamkes" required>
                    </div>
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

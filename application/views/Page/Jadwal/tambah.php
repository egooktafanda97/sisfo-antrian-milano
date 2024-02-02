<div class="row">
    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('jadwal/tambahJadwal') ?>" method="post">
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
                        <label for="bagian">Bagian:</label>
                        <input type="text" class="form-control" name="bagian" required>
                    </div>
                    <div class="form-group text-center">
                        <label class="d-block">HARI:</label>
                        <div class="row">
                            <div class="col-6">
                                <label for="hari_pertama">Hari Pertama:</label>
                                <select class="form-control" name="hari_pertama" required>
                                    <option value="">--- PILIH HARI ---</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="hari_terakhir">Hari Terakhir:</label>
                                <select class="form-control" name="hari_terakhir" required>
                                    <option value="">--- PILIH HARI ---</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label class="d-block">JAM:</label>
                        <div class="row">
                            <div class="col-6">
                                <label for="jam_pertama">Jam Pertama:</label>
                                <input type="time" class="form-control" name="jam_pertama" required>
                            </div>
                            <div class="col-6">
                                <label for="jam_terakhir">Jam Terakhir:</label>
                                <input type="time" class="form-control" name="jam_terakhir" required>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

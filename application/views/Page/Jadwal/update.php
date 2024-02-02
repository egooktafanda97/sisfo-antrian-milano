<div class="row">
    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                <!-- Update Form -->
                <form action="<?= base_url('jadwal/updateJadwal') ?>" method="post">
                    <input type="hidden" name="id_jadwal" value="<?= $jadwal->id_jadwal ?>">
                    <div class="form-group">
                        <label for="id_dokter">Dokter:</label>
                        <select class="form-control" name="id_dokter" required>
                            <?php foreach ($dokter_data as $dokter): ?>
                                <option value="<?= $dokter->id_dokter ?>" <?= ($jadwal->id_dokter == $dokter->id_dokter) ? 'selected' : '' ?>>
                                    <?= $dokter->nama_dokter ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bagian">Bagian:</label>
                        <input type="text" class="form-control" name="bagian" value="<?= $jadwal->bagian ?>" required>
                    </div>
                    <div class="form-group text-center">
                        <label class="d-block">HARI:</label>
                        <div class="row">
                            <div class="col-6">
                                <label for="hari_pertama">Hari Pertama:</label>
                                <select class="form-control" name="hari_pertama" required>
                                    <option value="Senin" <?= ($jadwal->hari_pertama == 'Senin') ? 'selected' : '' ?>>Senin</option>
                                    <option value="Selasa" <?= ($jadwal->hari_pertama == 'Selasa') ? 'selected' : '' ?>>Selasa</option>
                                    <option value="Rabu" <?= ($jadwal->hari_pertama == 'Rabu') ? 'selected' : '' ?>>Rabu</option>
                                    <option value="Kamis" <?= ($jadwal->hari_pertama == 'Kamis') ? 'selected' : '' ?>>Kamis</option>
                                    <option value="Jumat" <?= ($jadwal->hari_pertama == 'Jumat') ? 'selected' : '' ?>>Jumat</option>
                                    <option value="Sabtu" <?= ($jadwal->hari_pertama == 'Sabtu') ? 'selected' : '' ?>>Sabtu</option>
                                    <option value="Minggu" <?= ($jadwal->hari_pertama == 'Minggu') ? 'selected' : '' ?>>Minggu</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="hari_terakhir">Hari Terakhir:</label>
                                <select class="form-control" name="hari_terakhir" required>
                                    <option value="Senin" <?= ($jadwal->hari_terakhir == 'Senin') ? 'selected' : '' ?>>Senin</option>
                                    <option value="Selasa" <?= ($jadwal->hari_terakhir == 'Selasa') ? 'selected' : '' ?>>Selasa</option>
                                    <option value="Rabu" <?= ($jadwal->hari_terakhir == 'Rabu') ? 'selected' : '' ?>>Rabu</option>
                                    <option value="Kamis" <?= ($jadwal->hari_terakhir == 'Kamis') ? 'selected' : '' ?>>Kamis</option>
                                    <option value="Jumat" <?= ($jadwal->hari_terakhir == 'Jumat') ? 'selected' : '' ?>>Jumat</option>
                                    <option value="Sabtu" <?= ($jadwal->hari_terakhir == 'Sabtu') ? 'selected' : '' ?>>Sabtu</option>
                                    <option value="Minggu" <?= ($jadwal->hari_terakhir == 'Minggu') ? 'selected' : '' ?>>Minggu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label class="d-block">JAM:</label>
                        <div class="row">
                            <div class="col-6">
                                <label for="jam_pertama">Jam Pertama:</label>
                                <input type="time" class="form-control" name="jam_pertama" value="<?= $jadwal->jam_pertama ?>" required>
                            </div>
                            <div class="col-6">
                                <label for="jam_terakhir">Jam Terakhir:</label>
                                <input type="time" class="form-control" name="jam_terakhir" value="<?= $jadwal->jam_terakhir ?>" required>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

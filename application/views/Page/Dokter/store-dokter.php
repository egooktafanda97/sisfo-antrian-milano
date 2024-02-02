<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Dokter</h4>
                <form method="POST" action="<?= base_url("Dokter") ?>">
                    <input type="hidden" name="id" value="<?= $dokter->id ?? null ?>">
                    <div class="w-full">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="kode_dokter">Kode Dokter</label>
                                <input type="text" name="kode_dokter" id="kode_dokter" class="form-control" required value="<?= $dokter->kode_dokter ?? null ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="nama_dokter">Nama Dokter</label>
                                <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" required value="<?= $dokter->nama_dokter ?? null ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required value="<?= $dokter->tempat_lahir ?? null ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="<?= $dokter->tanggal_lahir ?? null ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" required value="<?= $dokter->alamat ?? null ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="pendidikan_akhir">Pendidikan Akhir</label>
                                <input type="text" name="pendidikan_akhir" id="pendidikan_akhir" class="form-control" required value="<?= $dokter->pendidikan_akhir ?? null ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="layanan_id">Layanan ID</label>
                                <input type="text" name="layanan_id" id="layanan_id" class="form-control" required value="<?= $dokter->layanan_id ?? null ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 text-right">
                        <a href="<?= base_url("Dokter") ?>" class="btn btn-secondary btn-sm">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
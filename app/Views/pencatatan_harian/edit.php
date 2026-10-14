<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Data Pencatatan Harian</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Pencatatan Harian</h3>
                        </div>
                        <div class="card-body">
                            <form
                                action="<?= base_url('pencatatan_harian/update/' . $pencatatan['id_pencatatan_harian']); ?>"
                                method="post">
                                <div class="form-group">
                                    <label for="id_kandang">Nama Kandang</label>
                                    <select name="id_kandang" class="form-control" required>
                                        <?php foreach ($kandangMap as $id => $nama): ?>
                                            <option value="<?= $id; ?>" <?= $pencatatan['id_kandang'] == $id ? 'selected' : ''; ?>>
                                                <?= $nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_siklus_ayam">Siklus Ayam</label>
                                    <select name="id_siklus_ayam" class="form-control" required>
                                        <?php foreach ($siklusMap as $id => $nama): ?>
                                            <option value="<?= $id; ?>" <?= $pencatatan['id_siklus_ayam'] == $id ? 'selected' : ''; ?>>
                                                <?= $nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_pencatatan">Tanggal Pencatatan</label>
                                    <input type="date" name="tanggal_pencatatan" class="form-control"
                                        value="<?= $pencatatan['tanggal_pencatatan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="tambahan_ayam">Tambahan Ayam</label>
                                    <input type="number" name="tambahan_ayam" class="form-control"
                                        value="<?= $pencatatan['tambahan_ayam']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="ayam_mati">Ayam Mati</label>
                                    <input type="number" name="ayam_mati" class="form-control"
                                        value="<?= $pencatatan['ayam_mati']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="utuh_butir_pencatatan">Telur Utuh (Butir)</label>
                                    <input type="number" name="utuh_butir_pencatatan" class="form-control"
                                        value="<?= $pencatatan['utuh_butir_pencatatan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="utuh_kg_pencatatan">Telur Utuh (Kg)</label>
                                    <input type="text" name="utuh_kg_pencatatan" class="form-control"
                                        value="<?= $pencatatan['utuh_kg_pencatatan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="retak_butir_pencatatan">Telur Retak (Butir)</label>
                                    <input type="number" name="retak_butir_pencatatan" class="form-control"
                                        value="<?= $pencatatan['retak_butir_pencatatan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="retak_kg_pencatatan">Telur Retak (Kg)</label>
                                    <input type="text" name="retak_kg_pencatatan" class="form-control"
                                        value="<?= $pencatatan['retak_kg_pencatatan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="putih_butir_pencatatan">Telur Putih (Butir)</label>
                                    <input type="number" name="putih_butir_pencatatan" class="form-control"
                                        value="<?= $pencatatan['putih_butir_pencatatan']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="putih_kg_pencatatan">Telur Putih (Kg)</label>
                                    <input type="text" name="putih_kg_pencatatan" class="form-control"
                                        value="<?= $pencatatan['putih_kg_pencatatan']; ?>" required>
                                </div>

                                <!-- Total butir dan total kg di-update otomatis melalui fungsi controller -->
                                <div class="form-group">
                                    <label for="total_butir_pencatatan">Total Telur (Butir)</label>
                                    <input type="text" name="total_butir_pencatatan" class="form-control"
                                        value="<?= $pencatatan['total_butir_pencatatan']; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="total_kg_pencatatan">Total Telur (Kg)</label>
                                    <input type="text" name="total_kg_pencatatan" class="form-control"
                                        value="<?= $pencatatan['total_kg_pencatatan']; ?>" readonly>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="<?= base_url('pencatatan_harian'); ?>"
                                        class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
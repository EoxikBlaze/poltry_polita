<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data <?php echo $title; ?></h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('kandang/add'); ?>">
                                <div class="form-group">
                                    <label for="nama_kandang">Nama Kandang</label>
                                    <input type="text" name="nama_kandang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_kandang">Nama Penanggung jawab</label>
                                    <select name="id_pekerja" class="form-control" required>
                                        <option value="">-- Pilih Penanggung Jawab --</option>
                                                <?php foreach ($pekerjaMap as $id_pekerja => $nama_penanggung_jawab): ?>
                                            <option value="<?= $id_pekerja; ?>"><?= $nama_penanggung_jawab; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="Text" name="lokasi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="kapasitas">Kapasitas</label>
                                    <input type="text" name="kapasitas" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
                                    <input type="date" name="tanggal_pembuatan" class="form-control" required>
                                </div>
                                <div class="card-header">
                                    <a href="<?= base_url('kandang'); ?>" class="btn btn-primary mb-2">Kembali</a>
                                    <button class="btn btn-success mb-2" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div><!-- /.content-wrapper -->
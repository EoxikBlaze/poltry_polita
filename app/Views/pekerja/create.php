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
                            <form method="post" action="<?= base_url('pekerja/add'); ?>">
                                <div class="form-group">
                                    <label for="nama_pekerja">Nama Pekerja</label>
                                    <input type="text" name="nama_pekerja" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp_pekerja">No. HP</label>
                                    <input type="text" name="no_hp_pekerja" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gajih_pekerja">Gaji</label>
                                    <input type="number" name="gajih_pekerja" class="form-control" required>
                                </div>
                                <div class="card-header">
                                    <a href="<?= base_url('pekerja'); ?>" class="btn btn-primary mb-2">Kembali</a>
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

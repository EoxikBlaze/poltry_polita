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
                            <form method="post" action="<?= base_url('user/add'); ?>">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" name="nomor_telepon" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" class="form-control" required>
                                        <option value="">pilih level</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Pemilik">Pemilik</option>
                                        <option value="Penjaga">Peternak</option>
                                    </select>
                                </div>
                                <a href="<?= base_url('user'); ?>" class="btn btn-primary">Kembali</a>
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div><!-- /.content-wrapper -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data User</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('user/update/' . $user['id_user']); ?>">
                                <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="<?= $user['nama_lengkap']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" name="nomor_telepon" class="form-control"
                                        value="<?= $user['nomor_telepon']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="<?= $user['username']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Biarkan kosong jika tidak ingin mengganti password">
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" class="form-control" required>
                                        <option value="">pilih level</option>
                                        <option value="Admin" <?= $user['level'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="Pemilik" <?= $user['level'] == 'Pemilik' ? 'selected' : ''; ?>>Pemilik</option>
                                        <option value="Penjaga" <?= $user['level'] == 'Penjaga' ? 'selected' : ''; ?>>Peternak</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Edit</button>
                                <a href="<?= base_url('user'); ?>" class="btn btn-primary">Kembali</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div><!-- /.content-wrapper -->

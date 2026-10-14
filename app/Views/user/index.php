<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>adminLTE/dist/img/logo_politala.png" alt="AdminLTELogo"
        height="170" width="170">
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $title; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nomor Telepon</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($getUser as $isi): ?>
                                        <tr>
                                            <td style="text-align: center;"><?= str_pad($no, 2, '0', STR_PAD_LEFT); ?></td>
                                            <td><?= $isi['nama_lengkap']; ?></td>
                                            <td><?= $isi['nomor_telepon']; ?></td>
                                            <td><?= $isi['username']; ?></td>
                                            <td><?= $isi['level']; ?></td>
                                            <td>
                                                <a href="<?= base_url('user/edit/' . $isi['id_user']); ?>"
                                                    class="btn btn-success ms-2"><i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="<?= base_url('user/delete/' . $isi['id_user']); ?>"
                                                    class="btn btn-danger ms-2">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++; // Increment nomor urut
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <a href="<?= base_url('user/create'); ?>" class="btn btn-success ms-2">Tambah Data</a>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
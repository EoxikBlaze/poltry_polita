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
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
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
                            <a href="<?= base_url('pekerja/create'); ?>" class="btn btn-success ms-2"> Tambah Data </a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Pekerja</th>
                                        <th>No. HP</th>
                                        <th>Gaji</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($getPekerja as $isi): ?>
                                        <tr>
                                            <td style="text-align: center;"><?= str_pad($no, 2, '0', STR_PAD_LEFT); ?></td>
                                            <td><?= esc($isi['nama_pekerja']); ?></td>
                                            <td><?= esc($isi['no_hp_pekerja']); ?></td>
                                            <td>Rp <?= number_format((float) ($isi['gajih_pekerja'] ?? 0), 0, ',', '.'); ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('pekerja/edit/' . $isi['id_pekerja']); ?>"
                                                    class="btn btn-warning btn-sm">Ubah</a>
                                                <a href="<?= base_url('pekerja/delete/' . $isi['id_pekerja']); ?>"
                                                    class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

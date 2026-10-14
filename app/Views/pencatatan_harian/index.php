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
                            <h3 class="card-title">Data Pencatatan Harian</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="<?= base_url('pencatatan_harian/create'); ?>" class="btn btn-success ms-2"> Tambah
                                Data </a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kandang</th>
                                        <th>Minggu Siklus</th>
                                        <th>Tanggal Pencatatan</th>
                                        <th>Tambahan Ayam</th>
                                        <th>Ayam Mati</th>
                                        <th>Utuh (Butir)</th>
                                        <th>Utuh (Kg)</th>
                                        <th>Retak (Butir)</th>
                                        <th>Retak (Kg)</th>
                                        <th>Putih (Butir)</th>
                                        <th>Putih (Kg)</th>
                                        <th>Total (Butir)</th>
                                        <th>Total (Kg)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if (!function_exists('hariIndo')) {
function hariIndo($day)
                                    {
                                        $days = [
                                            'Sunday' => 'Minggu',
                                            'Monday' => 'Senin',
                                            'Tuesday' => 'Selasa',
                                            'Wednesday' => 'Rabu',
                                            'Thursday' => 'Kamis',
                                            'Friday' => 'Jumat',
                                            'Saturday' => 'Sabtu'
                                        ];
                                        return $days[$day];
                                    }
}
                                    foreach ($getPencatatan as $data): ?>
                                        <tr>
                                            <td style="text-align: center;"><?= str_pad($no++, 2, '0', STR_PAD_LEFT); ?>
                                            </td>
                                            <td><?= $data['nama_kandang_pencatatan']; ?></td>
                                            <td style="text-align: center;"><?= $data['minggu_siklus_pencatatan']; ?></td>
                                            <td style="text-align: center;">
                                                <?= hariIndo(date('l', strtotime($data['tanggal_pencatatan']))) . ', ' . date('d F Y', strtotime($data['tanggal_pencatatan'])); ?>
                                            </td>
                                            <td style="text-align: center;"><?= $data['tambahan_ayam']; ?></td>
                                            <td style="text-align: center;"><?= $data['ayam_mati']; ?></td>
                                            <td style="text-align: center;"><?= $data['utuh_butir_pencatatan']; ?></td>
                                            <td style="text-align: center;">
                                                <?= number_format((float) ($data['utuh_kg_pencatatan'] ?? 0), 2); ?>
                                            </td>
                                            <td style="text-align: center;"><?= $data['retak_butir_pencatatan']; ?></td>
                                            <td style="text-align: center;">
                                                <?= number_format((float) ($data['retak_kg_pencatatan'] ?? 0), 2); ?>
                                            </td>
                                            <td style="text-align: center;"><?= $data['putih_butir_pencatatan']; ?></td>
                                            <td style="text-align: center;">
                                                <?= number_format((float) ($data['putih_kg_pencatatan'] ?? 0), 2); ?>
                                            </td>
                                            <td style="text-align: center;"><?= $data['total_butir_pencatatan']; ?></td>
                                            <td style="text-align: center;">
                                                <?= number_format((float) ($data['total_kg_pencatatan'] ?? 0), 2); ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('pencatatan_harian/edit/' . $data['id_pencatatan_harian']); ?>"
                                                    class="btn btn-warning btn-sm">Ubah</a>
                                                <a href="<?= base_url('pencatatan_harian/delete/' . $data['id_pencatatan_harian']); ?>"
                                                    class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
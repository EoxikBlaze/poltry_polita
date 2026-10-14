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
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Siklus Ayam</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="<?= base_url('siklus_ayam/create'); ?>" class="btn btn-success mb-3">Tambah
                                Data</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Kandang</th>
                                        <th>Minggu Siklus</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th> <!-- Tambahkan kolom untuk tanggal_selesai -->
                                        <th>Jumlah Ayam</th>
                                        <th>Total Telor Utuh</th>
                                        <th>Jumlah Ikat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; // Inisialisasi nomor urut
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
                                    foreach ($getSiklusAyam as $siklus):
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?= str_pad($no++, 2, '0', STR_PAD_LEFT); ?>
                                            </td>
                                            <td><?= $siklus['nama_kandang_siklus']; ?></td>
                                            <td style="text-align: center;"><?= $siklus['minggu_siklus']; ?></td>
                                            <td style="text-align: center;">
                                                <?= hariIndo(date('l', strtotime($siklus['tanggal_mulai']))) . ', ' . date('d F Y', strtotime($siklus['tanggal_mulai'])); ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?= hariIndo(date('l', strtotime($siklus['tanggal_selesai']))) . ', ' . date('d F Y', strtotime($siklus['tanggal_selesai'])); ?>
                                            </td>
                                            <td style="text-align: center;"><?= $siklus['jumlah_ayam']; ?></td>
                                            <td style="text-align: center;"><?= $siklus['total_telor_utuh']; ?></td>
                                            <td style="text-align: center;"><?= $siklus['jumlah_ikat']; ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('siklus_ayam/edit/' . $siklus['id_siklus']); ?>"
                                                    class="btn btn-warning btn-sm">Ubah</a>
                                                <a href="<?= base_url('siklus_ayam/delete/' . $siklus['id_siklus']); ?>"
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
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
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
            <?php
            // Ringkasan dari data pencatatan harian
            $totalButir = 0;
            $totalKg = 0;
            $totalAyamMati = 0;
            foreach ($pencatatan as $row) {
                $totalButir += (int) ($row['total_butir_pencatatan'] ?? 0);
                $totalKg += (float) ($row['total_kg_pencatatan'] ?? 0);
                $totalAyamMati += (int) ($row['ayam_mati'] ?? 0);
            }
            ?>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlahKandang; ?></h3>
                            <p>Data Kandang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-place-of-worship"></i>
                        </div>
                        <a href="<?= base_url('kandang') ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlahSiklus; ?></h3>
                            <p>Siklus Ayam</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-arrows-spin"></i>
                        </div>
                        <a href="<?= base_url('siklus_ayam') ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlahPekerja; ?></h3>
                            <p>Data Pekerja</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="<?= base_url('pekerja') ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= number_format($totalKg, 2); ?> <small>kg</small></h3>
                            <p>Total Berat Telur</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-egg"></i>
                        </div>
                        <a href="<?= base_url('pencatatan_harian') ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ringkasan Produksi</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Total Butir Telur</th>
                                    <td><?= number_format($totalButir); ?> butir</td>
                                </tr>
                                <tr>
                                    <th>Total Berat Telur</th>
                                    <td><?= number_format($totalKg, 2); ?> kg</td>
                                </tr>
                                <tr>
                                    <th>Total Ayam Mati</th>
                                    <td><?= number_format($totalAyamMati); ?> ekor</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Pencatatan</th>
                                    <td><?= count($pencatatan); ?> data</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Selamat Datang</h3>
                        </div>
                        <div class="card-body">
                            <p>Sistem Pendataan Ayam dan Produksi Telur <b>Politry Polita</b> - Kelompok 17 PBL
                                Politeknik Negeri Tanah Laut.</p>
                            <p>Gunakan menu di sebelah kiri untuk mengelola data kandang, siklus ayam, dan
                                pencatatan harian.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

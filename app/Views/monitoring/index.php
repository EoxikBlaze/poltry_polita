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
                <?php foreach ($getKandang as $isi): ?>
                    <div class="col-md-4">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= esc($isi['nama_kandang']); ?></h3>
                            </div>
                            <div class="card-body">
                                <p><b>Penanggung Jawab:</b> <?= esc($isi['nama_penanggung_jawab']); ?></p>
                                <p><b>Lokasi:</b> <?= esc($isi['lokasi']); ?></p>
                                <p><b>Kapasitas:</b> <?= esc($isi['kapasitas']); ?> ekor</p>
                                <p><b>Tanggal Pembuatan:</b>
                                    <?= date('d F Y', strtotime($isi['tanggal_pembuatan'])); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($getKandang)): ?>
                    <div class="col-12">
                        <div class="alert alert-info">Belum ada data kandang.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

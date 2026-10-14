<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Pencatatan Harian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('pencatatan_harian'); ?>">Pencatatan
                                Harian</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
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
                            <h3 class="card-title">Form Tambah Data Pencatatan Harian</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('pencatatan_harian/add'); ?>" method="post">
                                <!-- Dropdown Kandang -->
                                <div class="form-group">
                                    <label for="id_kandang">Nama Kandang</label>
                                    <select name="id_kandang" id="id_kandang" class="form-control" required>
                                        <option value="">-- Pilih Kandang --</option>
                                        <?php foreach ($kandangMap as $id => $nama): ?>
                                            <option value="<?= $id; ?>"><?= $nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Dropdown Siklus Ayam -->
                                <div class="form-group">
                                    <label for="id_siklus_ayam">Siklus Ayam</label>
                                    <select name="id_siklus_ayam" id="id_siklus_ayam" class="form-control" required>
                                        <option value="">-- Pilih Siklus Ayam --</option>
                                        <?php foreach ($siklusMap as $id => $nama): ?>
                                            <option value="<?= $id; ?>"><?= $nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Tanggal Pencatatan -->
                                <div class="form-group">
                                    <label for="tanggal_pencatatan">Tanggal Pencatatan</label>
                                    <input type="date" name="tanggal_pencatatan" id="tanggal_pencatatan"
                                        class="form-control" required>
                                </div>

                                <!-- Input Tambahan Ayam -->
                                <div class="form-group">
                                    <label for="tambahan_ayam">Tambahan Ayam</label>
                                    <input type="number" name="tambahan_ayam" id="tambahan_ayam" class="form-control"
                                        required>
                                </div>

                                <!-- Input Ayam Mati -->
                                <div class="form-group">
                                    <label for="ayam_mati">Ayam Mati</label>
                                    <input type="number" name="ayam_mati" id="ayam_mati" class="form-control" required>
                                </div>

                                <!-- Input Utuh Butir dan KG -->
                                <div class="form-group">
                                    <label for="utuh_butir_pencatatan">Telur Utuh (Butir)</label>
                                    <input type="number" name="utuh_butir_pencatatan" id="utuh_butir"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="utuh_kg_pencatatan">Telur Utuh (KG)</label>
                                    <input type="number" step="0.01" name="utuh_kg_pencatatan" id="utuh_kg"
                                        class="form-control" required>
                                </div>

                                <!-- Input Retak Butir dan KG -->
                                <div class="form-group">
                                    <label for="retak_butir_pencatatan">Telur Retak (Butir)</label>
                                    <input type="number" name="retak_butir_pencatatan" id="retak_butir"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="retak_kg_pencatatan">Telur Retak (KG)</label>
                                    <input type="number" step="0.01" name="retak_kg_pencatatan" id="retak_kg"
                                        class="form-control" required>
                                </div>

                                <!-- Input Putih Butir dan KG -->
                                <div class="form-group">
                                    <label for="putih_butir_pencatatan">Telur Putih (Butir)</label>
                                    <input type="number" name="putih_butir_pencatatan" id="putih_butir"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="putih_kg_pencatatan">Telur Putih (KG)</label>
                                    <input type="number" step="0.01" name="putih_kg_pencatatan" id="putih_kg"
                                        class="form-control" required>
                                </div>

                                <!-- Total Butir dan KG -->
                                <div class="form-group">
                                    <label for="total_butir_pencatatan">Total Butir</label>
                                    <input type="number" name="total_butir_pencatatan" id="total_butir"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="total_kg_pencatatan">Total Berat (KG)</label>
                                    <input type="number" step="0.01" name="total_kg_pencatatan" id="total_kg"
                                        class="form-control" readonly>
                                </div>

                                <!-- Tombol -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="<?= base_url('pencatatan_harian'); ?>"
                                        class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

<script>
    const utuhButir = document.getElementById('utuh_butir');
    const retakButir = document.getElementById('retak_butir');
    const putihButir = document.getElementById('putih_butir');
    const utuhKg = document.getElementById('utuh_kg');
    const retakKg = document.getElementById('retak_kg');
    const putihKg = document.getElementById('putih_kg');
    const totalButir = document.getElementById('total_butir');
    const totalKg = document.getElementById('total_kg');

    function calculateTotal() {
        const totalB = (parseInt(utuhButir.value) || 0) +
            (parseInt(retakButir.value) || 0) +
            (parseInt(putihButir.value) || 0);
        const totalK = (parseFloat(utuhKg.value) || 0) +
            (parseFloat(retakKg.value) || 0) +
            (parseFloat(putihKg.value) || 0);

        totalButir.value = totalB;
        totalKg.value = totalK.toFixed(2);
    }

    // Tambahkan event listener untuk menghitung ulang saat input berubah
    [utuhButir, retakButir, putihButir, utuhKg, retakKg, putihKg].forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
</script>
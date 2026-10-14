<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Siklus Ayam</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('siklus_ayam/add'); ?>">
                                <div class="form-group">
                                    <label for="minggu_siklus">Minggu Siklus</label>
                                    <input type="text" name="minggu_siklus" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_kandang">Nama Kandang</label>
                                    <select name="id_kandang" class="form-control" required>
                                        <option value="">-- Pilih Kandang --</option>
                                        <?php foreach ($kandangMap as $id_kandang => $nama_kandang): ?>
                                            <option value="<?= $id_kandang; ?>"><?= $nama_kandang; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_ayam">Jumlah Ayam</label>
                                    <input type="number" name="jumlah_ayam" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="total_telor_utuh">Total Telor Utuh</label>
                                    <input type="number" name="total_telor_utuh" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_ikat">Jumlah Ikat</label>
                                    <input type="number" name="jumlah_ikat" class="form-control" required>
                                </div>

                                <div class="card-header">
                                    <a href="<?= base_url('siklus_ayam'); ?>" class="btn btn-primary mb-2">Kembali</a>
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

<script>
    // Script untuk otomatis mengisi tanggal_selesai berdasarkan tanggal_mulai
    document.getElementById('tanggal_mulai').addEventListener('change', function () {
        const tanggalMulai = new Date(this.value);
        tanggalMulai.setDate(tanggalMulai.getDate() + 7); // Tambahkan 7 hari
        const tanggalSelesai = tanggalMulai.toISOString().split('T')[0]; // Ambil tanggal saja (YYYY-MM-DD)
        document.getElementById('tanggal_selesai').value = tanggalSelesai;
    });
</script>
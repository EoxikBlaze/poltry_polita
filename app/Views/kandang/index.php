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
							<a href="<?= base_url('kandang/create'); ?>" class="btn btn-success ms-2"> Tambah Data </a>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>NO</th>
										<th>Nama Kandang</th>
										<th>Nama Penanggung Jawab</th>
										<th>Lokasi</th>
										<th>Kapasitas</th>
										<th>Tanggal Pembuatan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($getKandang as $isi): ?>
										<tr>
											<td style="text-align: center;"><?= str_pad($no, 2, '0', STR_PAD_LEFT); ?></td>
											<td><?= $isi['nama_kandang']; ?></td>
											<td><?= $isi['nama_penanggung_jawab']; ?></td>
											<td><?= $isi['lokasi']; ?></td>
											<td><?= $isi['kapasitas']; ?></td>
											<td style="text-align:
												center;"><?= date('d F Y', strtotime($isi['tanggal_pembuatan'])); ?>
											</td>
											<td style="text-align: center;">
												<a href="<?= base_url('kandang/edit/' . $isi['id_kandang']); ?>"
													class="btn btn-warning btn-sm">Ubah</a>
												<a href="<?= base_url('kandang/delete/' . $isi['id_kandang']); ?>"
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
<script>
	window.setTimeout(function() {
		$("#alert-suc").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 5000);
</script>
<div class="space-hig-top">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body box-hubungi pad-rata">
					<div class="row">
						<div class="col-md-12">
							<div class="space-med">
								<span class="txt-title-desc">Data Mitra Belum Verifikasi </span>
							</div>
						</div>
						<?php if (@$_GET["status"] == "success_verifikasi") { ?>
							<div class="col-md-12" id="alert-suc">
								<div class="alert alert-success">
									<strong>Success!</strong> Akun Mitra Berhasil di Verifikasi
								</div>
							</div>
						<?php } ?>
						<?php if (@$_GET["status"] == "failed_verifikasi") { ?>
							<div class="col-md-12" id="alert-suc">
								<div class="alert alert-danger">
									<strong>Failed!</strong>  Data Mitra Gagal di Verifikasi. Silahkan Coba Lagi..
								</div>
							</div>
						<?php } ?>
						<div class="col-md-12">
							<div class="table-responsive box">
								<!-- /.box-header -->
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Username</th>
												<th>Email</th>
												<th>Nama Lengkap</th>
												<th>Telepon</th>
												<th>Nama Hotel</th>
												<th>Jabatan</th>
												<th>Terdaftar</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($user_ver as $row) { ?>
												<tr>
													<td><?= $row["f_username"] ?></td>
													<td><?= $row["f_email"] ?></td>
													<td><?= $row["f_nama"] ?></td>
													<td><?= $row["f_telepon"] ?></td>
													<td><?= $row["f_nama_properti"] ?></td>
													<td>Owner</td>
													<td><?= $row["f_registered"] ?></td>
													<td>Menunggu Verifikasi</td>
													<td>
														<a href="<?= site_url('Admin/Akun/verifikasi/' . $row["f_kode"]); ?>" class="btn btn-block btn-primary">Verifikasi</a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="space-med">
								<span class="txt-title-desc">Data Mitra Aktif</span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="table-responsive box">
								<!-- /.box-header -->
								<div class="box-body">
									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Username</th>
												<th>Email</th>
												<th>Nama Lengkap</th>
												<th>Telepon</th>
												<th>Nama Hotel</th>
												<th>Jabatan</th>
												<th>Terdaftar</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($user_all as $row) { ?>
												<tr>
													<td><?= $row["f_username"] ?></td>
													<td><?= $row["f_email"] ?></td>
													<td><?= $row["f_nama"] ?></td>
													<td><?= $row["f_telepon"] ?></td>
													<td><?= $row["f_nama_properti"] ?></td>
													<td>Owner</td>
													<td><?= $row["f_registered"] ?></td>
													<td>Aktif</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
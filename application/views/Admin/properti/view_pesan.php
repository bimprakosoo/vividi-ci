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
                                <span class="txt-title-desc">Data Pesanan Tamu </span>
                            </div>
                        </div>
                        <?php if (@$_GET["status"] == "accept_success") { ?>
							<div class="col-md-12" id="alert-suc">
								<div class="alert alert-success">
									<strong>Success!</strong> Data Pesanan Telah Berhasil Disetujui
								</div>
							</div>
						<?php } ?>
                        <?php if (@$_GET["status"] == "reject_success") { ?>
							<div class="col-md-12" id="alert-suc">
								<div class="alert alert-warning">
									<strong>Success!</strong> Data Pesanan Telah Berhasil Ditolak
								</div>
							</div>
						<?php } ?>
						<?php if (@$_GET["status"] == "reject_failed") { ?>
							<div class="col-md-12" id="alert-suc">
								<div class="alert alert-danger">
									<strong>Failed!</strong>  Data Pesanan Gagal di Setujui/Tolak. Silahkan Coba Lagi..
								</div>
							</div>
						<?php } ?>
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <?php
                                    $seg = $this->uri->segment(4);
                                    if ($seg == 'tab_1' || $seg == '') { ?>
                                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Semua</a></li>
                                    <?php } else { ?>
                                        <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Semua</a></li>
                                    <?php }
                                    if ($seg == 'tab_2') { ?>
                                        <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Menunggu</a></li>
                                    <?php } else { ?>
                                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Menunggu</a></li>
                                    <?php }

                                    if ($seg == 'tab_3') { ?>
                                        <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Sukses</a></li>
                                    <?php } else { ?>
                                        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Sukses</a></li>
                                    <?php }

                                    if ($seg == 'tab_4') { ?>
                                        <li class="active"><a href="#tab_4" data-toggle="tab" aria-expanded="true">Batal</a></li>
                                    <?php } else { ?>
                                        <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="true">Batal</a></li>
                                    <?php } ?>
                                </ul>
                                <div class="table-responsive tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <!-- all pesanan  -->
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No Booking</th>
                                                    <th>Pemesan</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Properti</th>
                                                    <th>Tipe Kamar</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Tanggal Pesan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data_semua as $all_data) { ?>
                                                    <tr>
                                                        <td><?= $all_data["booking_no"] ?></td>
                                                        <td><?= $all_data["nama"] ?></td>
                                                        <td><?= $all_data["check_in"] ?></td>
                                                        <td><?= $all_data["check_out"] ?></td>
                                                        <td><?= $all_data["properti"] ?></td>
                                                        <td><?= $all_data["tipe_kamar"] ?></td>
                                                        <td><?= $all_data["jumlah"] ?></td>
                                                        <td><?= $all_data["harga"] ?></td>
                                                        <td><?= $all_data["pesan"] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($all_data["status"] == 0) {
                                                                echo "Dibatalkan";
                                                            }
                                                            if ($all_data["status"] == 1) {
                                                                echo "Sukses";
                                                            }
                                                            if ($all_data["status"] == 2) {
                                                                echo "Menunggu";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <!-- pesanan delay  -->
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No Booking</th>
                                                    <th>Pemesan</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Properti</th>
                                                    <th>Tipe Kamar</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Tanggal Pesan</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                        foreach ($book_dly as $all_data) { ?>
                                                    <tr>
                                                        <td><?= $all_data["booking_no"] ?></td>
                                                        <td><?= $all_data["nama"] ?></td>
                                                        <td><?= $all_data["check_in"] ?></td>
                                                        <td><?= $all_data["check_out"] ?></td>
                                                        <td><?= $all_data["properti"] ?></td>
                                                        <td><?= $all_data["tipe_kamar"] ?></td>
                                                        <td><?= $all_data["jumlah"] ?></td>
                                                        <td><?= $all_data["harga"] ?></td>
                                                        <td><?= $all_data["pesan"] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($all_data["status"] == 0) {
                                                                echo "Dibatalkan";
                                                            }
                                                            if ($all_data["status"] == 1) {
                                                                echo "Sukses";
                                                            }
                                                            if ($all_data["status"] == 2) {
                                                                echo "Menunggu";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= site_url('Admin/Pesan/sukses/' . $all_data["booking_no"]); ?>" class="btn btn-block btn-primary">Setujui</a>
                                                            <a href="<?= site_url('Admin/Pesan/gagal/' . $all_data["booking_no"]); ?>" class="btn btn-block btn-danger">Batalkan</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <!-- pesanan sukses  -->
                                        <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No Booking</th>
                                                    <th>Pemesan</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Properti</th>
                                                    <th>Tipe Kamar</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Tanggal Pesan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($book_suc as $all_data) { ?>
                                                    <tr>
                                                        <td><?= $all_data["booking_no"] ?></td>
                                                        <td><?= $all_data["nama"] ?></td>
                                                        <td><?= $all_data["check_in"] ?></td>
                                                        <td><?= $all_data["check_out"] ?></td>
                                                        <td><?= $all_data["properti"] ?></td>
                                                        <td><?= $all_data["tipe_kamar"] ?></td>
                                                        <td><?= $all_data["jumlah"] ?></td>
                                                        <td><?= $all_data["harga"] ?></td>
                                                        <td><?= $all_data["pesan"] ?></td>
                                                        <td>
                                                            <?php
                                                                        if ($all_data["status"] == 1) {
                                                                            echo "Sukses";
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        <!-- pesanan cancel  -->
                                        <table id="example4" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No Booking</th>
                                                    <th>Pemesan</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Properti</th>
                                                    <th>Tipe Kamar</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Tanggal Pesan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($book_ccl as $all_data) { ?>
                                                    <tr>
                                                        <td><?= $all_data["booking_no"] ?></td>
                                                        <td><?= $all_data["nama"] ?></td>
                                                        <td><?= $all_data["check_in"] ?></td>
                                                        <td><?= $all_data["check_out"] ?></td>
                                                        <td><?= $all_data["properti"] ?></td>
                                                        <td><?= $all_data["tipe_kamar"] ?></td>
                                                        <td><?= $all_data["jumlah"] ?></td>
                                                        <td><?= $all_data["harga"] ?></td>
                                                        <td><?= $all_data["pesan"] ?></td>
                                                        <td>
                                                            <?php
                                                                        if ($all_data["status"] == 0) {
                                                                            echo "Cancel";
                                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

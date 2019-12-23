<div class="col-md-12 space-small ftco-animate">
	<div class="box-breadcumb ftco-animate">
		<span>Home >> Hotel >> <?= $hotel["f_nama_provinsi"] ?> >> <?= $hotel["f_nama_kota"] ?> >> <?= $hotel["f_nama_properti"] ?> </span>
	</div>
</div>
<div class="col-md-3 sidebar ftco-animate">
	<div class="sidebar-wrap bg-light ftco-animate">
		<h3 class="heading mb-4">Filter Pencairan</h3>
		<form action="<?= base_url("front/search") ?>" method="get">
			<script type="text/javascript">
				var site = "<?php echo site_url(); ?>";
				$(function() {
					$("#autocomplete1").autocomplete({
						// serviceUrl berisi URL ke controller/fungsi yang menangani request kita
						serviceUrl: sitel,
						; + "/front/json_search",

						formatResult: function(suggestion, currentValue) {
							return suggestion.label;
						},

						// fungsi ini akan dijalankan ketika user memilih salah satu hasil request
						onSelect: function(suggestion) {
							$("#autocomplete1").val("" + suggestion.nama); // membuat id "v_jurusan" untuk ditampilkan
							$("#f_id_produk").val("" + suggestion.kode); // membuat id "v_jurusan" untuk ditampilkan
						}
					});
					//check in - check out
					var date = new Date();
					$("#datecheckin").datepicker({
							format: "yyyy-mm-dd",
							todayBtn: true,
							autoclose: true,
							startDate: new Date()
						})
						.on("changeDate", function(e) {
							var checkInDate = e.date,
								$checkOut = $("#datecheckout");
							checkInDate.setDate(checkInDate.getDate() + 1);
							$checkOut.datepicker("setStartDate", checkInDate);
							$checkOut.datepicker("setDate", checkInDate).focus();
						});

					$("#datecheckout").datepicker({
						format: "yyyy-mm-dd",
						todayBtn: true,
						autoclose: true
					});
				});
			</script>
			<div class="fields">
				<div class="form-group">
					<input type="search" name="q" id="autocomplete1" value="" class="form-control" placeholder="Kota, Hotel, Tempat tujuan">
				</div>
				<div class="form-group">
					<input type="text" id="datecheckin" name="ci" value="<?= $_GET['ci'] ?>" class="form-control" placeholder="Date from" data-provide="datepicker">
				</div>
				<div class="form-group">
					<input type="text" id="datecheckout" name="co" value="<?= $_GET['co'] ?>" class="form-control" placeholder="Date to" data-provide="datepicker">
				</div>
				<div class="form-group">
					<div class="input-group flex-nowrap">
						<input type="number" name="g" value="<?= $_GET['g'] ?>" class="form-control" min="1">
						<div class="input-group-append">
							<span class="input-group-text">Orang</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group flex-nowrap">
						<input type="number" name="cr" value="<?= $_GET['cr'] ?>" class="form-control" min="1">
						<div class="input-group-append">
							<span class="input-group-text">Kamar</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Search" class="btn btn-primary btn-cari py-3 px-5">
				</div>
			</div>
		</form>
	</div>
	<div class="sidebar-wrap bg-light ftco-animate">
		<h3 class="heading mb-4">Star Rating</h3>
		<form method="post" class="star-rating">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">
					<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
				</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">
					<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
				</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">
					<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
				</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">
					<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
				</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">
					<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
				</label>
			</div>
		</form>
	</div>
</div>
<div class="col-md-9 ftco-animate">
	<?php
	if (count($detailhotel) <= 0) { ?>
		<div class="col-md-12">
			<div class="alert alert-warning">Tidak Memiliki Produk</div>
		</div>
	<?php
	} else { ?>
		<div class="box-hotel hotel-single ftco-animate">
			<h2><?= $hotel["f_nama_properti"] ?></h2>
			<p class="rate mb-5">
				<span class="star">
					<?php
						for ($i = 1; $i <= $hotel["f_rate_properti"]; $i++) { ?>
						<i class="icon-star"></i>
					<?php }
						?>
				</span> &nbsp;
				<span class="loc"><a href="#"><i class="icon-map"></i><?= $hotel["f_alamat_properti"] ?></a></span>
			</p>
		</div>
		<!-- Place somewhere in the <body> of your page -->
		<div class="flexslider space-med">
			<ul class="slides">
				<li data-thumb="<?= base_url("assets/images/hotel-1.jpg") ?>">
					<img src="<?= base_url("assets/images/hotel-1.jpg") ?>" class="img-fluid" />
				</li>
				<li data-thumb="<?= base_url("assets/images/hotel-1.jpg") ?>">
					<img src="<?= base_url("assets/images/hotel-1.jpg") ?>" class="img-fluid" />
				</li>
				<li data-thumb="<?= base_url("assets/images/hotel-1.jpg") ?>">
					<img src="<?= base_url("assets/images/hotel-1.jpg") ?>" class="img-fluid" />
				</li>
				<li data-thumb="<?= base_url("assets/images/hotel-1.jpg") ?>">
					<img src="<?= base_url("assets/images/hotel-1.jpg") ?>" class="img-fluid" />
				</li>
			</ul>
		</div>
		<div class="short-info-room space-med">
			<div class="row">
				<div class="col-md-8">
					<div class="txt-companies">
						Vividi
					</div>
					<div class="total-rates" style="font-size:18px; font-weight:300;">
						<i class="fa fa-certificate"></i>&nbsp;&nbsp;7.6 Good Service
					</div>
					<div class="people-rates">
						berdasarkan ulasan 800 orang
					</div>
				</div>
				<div class="col-md-4 booking-tabs">
					<div class="txt-booking">
						Mulai dari <span>Rp <?= number_format($harga["f_harga_akhir"]) ?></span>
					</div>
					<a href="#room" class="btn btn-primary btn-cari btn-room">Pesan sekarang</a>
				</div>
			</div>
		</div>
		<div class="list-group list-detail-room ftco-animate" id="myList" role="tablist" style="flex-direction: row !important;">
			<a class="list-group-item list-group-item-action box-icon" data-toggle="list" href="#desk" role="tab">
				<i class="fa fa-info-circle icon-room-vividi"></i>&nbsp;
				<span class="text-icon-tab">Informasi Umum</span>
			</a>
			<a class="list-group-item list-group-item-action box-icon active" data-toggle="list" href="#room" role="tab">
				<i class="fa fa-map icon-room-vividi"></i>&nbsp;
				<span class="text-icon-tab">Kamar</span>
			</a>
			<a class="list-group-item list-group-item-action box-icon" data-toggle="list" href="#facility" role="tab">
				<i class="fa fa-check-square icon-room-vividi"></i>&nbsp;
				<span class="text-icon-tab">Fasilitas</span>
			</a>
			<a class="list-group-item list-group-item-action box-icon" data-toggle="list" href="#rates" role="tab">
				<i class="fa fa-pencil-square-o icon-room-vividi"></i>&nbsp;
				<span class="text-icon-tab">Ulasan</span>
			</a>
		</div>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane tab-pane-room" id="desk" role="tabpanel">
				<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
					<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>

					<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
				</div>
			</div>
			<div class="tab-pane tab-pane-room active" id="room" role="tabpanel">
				<?php foreach ($detailhotel as $data) { ?>
					<div class="col-md-12 box-product ftco-animate">
						<div class="row">
							<div class="col-sm-4">
								<a href="#">
									<div class="destination">
										<img class="img img-2 d-flex justify-content-center align-items-center img-fluid" src="<?= base_url("assets/images/hotel-1.jpg") ?>">
									</div>
								</a>
							</div>
							<div class="col-md-8">
								<a href="#">
									<div class="box-product-pad">
										<div class="row box-product-title">
											<div class="col-md-8">
												<h3 class="txt-product">
													<a href="#"><?= $data['f_nama_kamar'] ?></a>
												</h3>
												<div class="ket-room">
													<i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Maks. <?= $data['f_max_adult'] ?> Orang
													<br>
													<i class="fa fa-cutlery"></i>&nbsp;&nbsp;Termasuk Sarapan
													<br>
													<i class="fa fa-wifi"></i> Termasuk Koneksi Wifi Gratis
													<br>
													<i class="fa  fa-check-square"></i> Refundable
												</div>
												<div class="detail-pop-room">
													<button type="button" class="" data-toggle="modal" data-target="#exampleModal">
														Detail room
													</button>
												</div>
											</div>
											<div class="col-md-4" style="">
												<div class="box-price">
													<div class="normal-price">
														<span class="txt-diskon">5%</span>
														<span class="txt-diskon-harga">Rp <?= number_format($data['f_harga_akhir']) ?></span>
													</div>
													<div class="diskon-price">
														Rp <?= number_format($data['f_harga_akhir']) ?>
													</div>
													<div class="night" style="font-size: 13px;">
														per malam
													</div>
													<div class="" style="margin-top:15px;">
														<a href="#room" class="btn btn-primary btn-cari btn-room">Pesan sekarang</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												...
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="tab-pane tab-pane-room" id="facility" role="tabpanel">
				fasilitas
			</div>
			<div class="tab-pane tab-pane-room" id="rates" role="tabpanel">
				form review
			</div>
		</div>
	<?php } ?>
</div>
<script>
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>
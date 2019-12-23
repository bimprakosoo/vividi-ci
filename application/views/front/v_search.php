<div class="col-md-12 space-small ftco-animate">
	<div class="box-breadcumb ftco-animate">
		<span>Pencarian terkait <span class="txt-pencarian"><?= $_GET['q'] ?></span></span>
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
					<input type="search" name="q" id="autocomplete1" value="<?= $_GET['q'] ?>" class="form-control" placeholder="Kota, Hotel, Tempat tujuan">
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
						<input type="number" name="cr" value="<?= $_GET['cr'] ?>"  class="form-control" min="1">
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
	if (count($hotel) <= 0) { ?>
		<div class="col-md-12">
			<div class="alert alert-warning">Tidak Memiliki Produk</div>
		</div>
		<?php
		} else {
			foreach ($hotel as $data) { ?>
			<div class="col-md-12 box-product ftco-animate">
				<div class="row">
					<div class="col-sm-4">
						<a href="<?= base_url("front/detail/$data[f_kode_properti]?ci=$_GET[ci]&co=$_GET[co]&g=$_GET[g]&cr=$_GET[cr]") ?>">
							<div class="destination">
								<img class="img img-2 d-flex justify-content-center align-items-center img-fluid" src="<?= base_url("assets/images/hotel-1.jpg") ?>">
							</div>
						</a>
					</div>
					<div class="col-md-8">
						<a href="<?= base_url("front/detail/$data[f_kode_properti]?ci=$_GET[ci]&co=$_GET[co]&g=$_GET[g]&cr=$_GET[cr]") ?>">
							<div class="box-product-pad">
								<div class="row box-product-title">
									<div class="col-md-8">
										<h3 class="txt-product">
											<a href="<?= base_url("front/detail/$data[f_kode_properti]?ci=$_GET[ci]&co=$_GET[co]&g=$_GET[g]&cr=$_GET[cr]") ?>"><?= $data['f_nama_properti'] ?></a>
										</h3>
										<div class="tipe">
											<p class="rate">
												<span>
													<i class="icon-map-o"></i><a href="<?= base_url("front/search/$data[f_id_provinsi]") ?>"><?= $data['f_nama_provinsi'] ?></a>, <a href="<?= base_url("front/search/$data[f_id_kota]") ?>"><?= $data['f_nama_kota'] ?></a></span> <br>
												<?php
														for ($i = 1; $i <= $data["f_rate_properti"]; $i++) { ?>
													<i class="icon-star"></i>
												<?php }
														?>
												<span>8 Rating</span>
											</p>
										</div>
										<div class="short-desc-produk">
											<p>Far far away, behind the word mountains, far from the countries</p>
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
											<div class="bottom-area d-flex">
												<span class="ml-auto btn-detail"><a href="<?= base_url("front/detail/$data[f_kode_properti]?ci=$_GET[ci]&co=$_GET[co]&g=$_GET[g]&cr=$_GET[cr]") ?>">Detail</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
	<?php }
	} ?>
</div>
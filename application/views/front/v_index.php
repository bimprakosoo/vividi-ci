<div class="bg-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-12 pad-greeting1 ftco-animate">
				<h1 class="mb-4 txt-greeting">
					<strong>Explore <br></strong> your amazing city.
				</h1>
				<p class="short-greeting">Find great places to stay, eat, shop, or visit from local experts</p>
			</div>
			<div class="col-md-6 col-xs-12 pad-greeting ftco-animate">
				<div class="" style="background:#074175a6;">
					<script type="text/javascript">
						var site = "<?php echo site_url();?>";
						$(function() {
							$("#autocomplete1").autocomplete({
								// serviceUrl berisi URL ke controller/fungsi yang menangani request kita
								serviceUrl: site+"/front/json_search",

								formatResult: function(suggestion, currentValue){
									return suggestion.label;
								},

								// fungsi ini akan dijalankan ketika user memilih salah satu hasil request
								onSelect: function (suggestion) {
									$("#autocomplete1").val(""+suggestion.nama); // membuat id "v_jurusan" untuk ditampilkan
									$("#f_id_produk").val(""+suggestion.kode); // membuat id "v_jurusan" untuk ditampilkan
								}
							});
							$('#myList a').on('click', function (e) {
								e.preventDefault()
								$(this).tab('show');
							});

							var date = new Date();
							$("#datecheckin").datepicker({
								format: "yyyy-mm-dd",
								todayBtn: true,
								autoclose: true,
								startDate: new Date()
							})
							.on("changeDate", function(e) {
								var checkInDate = e.date, $checkOut = $("#datecheckout");
								checkInDate.setDate(checkInDate.getDate() + 1);
								$checkOut.datepicker("setStartDate", checkInDate);
								$checkOut.datepicker("setDate", checkInDate).focus();
							});

							$("#datecheckout").datepicker({

								format: "yyyy-mm-dd",
								todayBtn: true,
								autoclose: true,
								startDate: "<?=date("Y-m-d",strtotime("+ 1 day"));?>"

							});
						});
					</script>

					<div class="list-group list-searching" id="myList" role="tablist" style="flex-direction: row !important;">
						<a class="list-group-item list-group-item-action box-icon active" data-toggle="list" href="#hotel" role="tab">
							<i class="fa fa-hotel icon-vividi"></i>&nbsp; 
							<span class="text-icon-tab">Hotel</span>
						</a>
						<a class="list-group-item list-group-item-action box-icon" data-toggle="list" href="#tour" role="tab">
							<i class="fa fa-map icon-vividi"></i>&nbsp; 
							<span class="text-icon-tab">Tour Package</span>
						</a>
						<a class="list-group-item list-group-item-action box-icon" data-toggle="list" href="#rental" role="tab">
							<i class="fa fa-car icon-vividi"></i>&nbsp; 
							<span class="text-icon-tab">Car Rentals</span>
						</a>
					</div>

					<!-- Tab panes -->
					<div class="tab-content tab-pad">
						<div class="tab-pane active" id="hotel" role="tabpanel">
							<form action="<?=base_url("front/search")?>" method="get" class="d-block d-flex">
								<div class="block-17 my-4 no-background">
									<div class="row form-cari">
										<div class="col-md-12 textfield-search form-search">
											<div class="input-group flex-nowrap">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-map-pin"></i>
													</span>
												</div>
												<input type="search" name="q" id="autocomplete1" class="form-control input-search" placeholder="Kota, Hotel, Tempat tujuan">
											</div>
										</div>

										<div class="col-md-6 col-xs-12">
											<label style="color:#fff;">Check In </label>
											<div class="input-group flex-nowrap">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-calendar"></i>
													</span>
												</div>
												<input type="text" id="datecheckin" name="ci" class="form-control input-search" placeholder="Date from" data-provide="datepicker" value="<?=date("Y-m-d")?>">
											</div>
										</div>

										<div class="col-md-6 col-xs-12 space-small">
											<label style="color:#fff;">Check Out </label>
											<div class="input-group flex-nowrap">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-calendar"></i>
													</span>
												</div>
												<input type="text" id="datecheckout" name="co" class="form-control input-search" placeholder="Date to" data-provide="datepicker" value="<?=date("Y-m-d", strtotime("+ 1 day"))?>">
											</div>
										</div>

										<div class="col-md-6 col-xs-12">
											<label style="color:#fff;">Jumlah Tamu</label>
											<div class="input-group flex-nowrap">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-user"></i>
													</span>
												</div>
												<input type="number" name="g" value="1" class="form-control input-search" min="1">
												<div class="input-group-append">
													<span class="input-group-text">Orang</span>
												</div>
											</div>
										</div>

										<div class="col-md-6 col-xs-12 space-med">
											<label style="color:#fff;">Jumlah Kamar</label>
											<div class="input-group flex-nowrap">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-bed"></i>
													</span>
												</div>
												<input type="number" name="cr" value="1" class="form-control input-search" min="1">
												<div class="input-group-append">
													<span class="input-group-text">Kamar</span>
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<input type="submit" class="search-submit btn btn-primary btn-cari form-control" value="Search">
										</div>
									</div>
								</div>
							</form>
						</div>
						
						<div class="tab-pane" id="tour" role="tabpanel">
							
						</div>
						<div class="tab-pane" id="rental" role="tabpanel">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section services-section bg-light">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Best Price Guarantee</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Travellers Love Us</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Best Travel Agent</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Our Dedicated Support</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-destination">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Featured</span>
				<h2 class="mb-4"><strong>Featured</strong> Destination</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="destination-slider owl-carousel ftco-animate">
					<div class="item">
						<div class="destination">
							<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-1.jpg")?>);">
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
							</a>
							<div class="text p-3">
								<h3><a href="#">Paris, Italy</a></h3>
								<span class="listing">15 Listing</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="destination">
							<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-2.jpg")?>);">
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
							</a>
							<div class="text p-3">
								<h3><a href="#">San Francisco, USA</a></h3>
								<span class="listing">20 Listing</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="destination">
							<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-3.jpg")?>);">
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
							</a>
							<div class="text p-3">
								<h3><a href="#">Lodon, UK</a></h3>
								<span class="listing">10 Listing</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="destination">
							<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-4.jpg")?>);">
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
							</a>
							<div class="text p-3">
								<h3><a href="#">Lion, Singapore</a></h3>
								<span class="listing">3 Listing</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="destination">
							<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-5.jpg")?>);">
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
							</a>
							<div class="text p-3">
								<h3><a href="#">Australia</a></h3>
								<span class="listing">3 Listing</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="destination">
							<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-6.jpg")?>);">
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
							</a>
							<div class="text p-3">
								<h3><a href="#">Paris, Italy</a></h3>
								<span class="listing">3 Listing</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Special Offers</span>
				<h2 class="mb-4"><strong>Top</strong> Tour Packages</h2>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-1.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-2.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-3.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-4.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/destination-5.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('<?=base_url("assets/images/bg_1.jpg")?>');">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
				<h2 class="mb-4">Some fun facts</h2>
				<span class="subheading">More than 100,000 websites hosted</span>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="100000">0</strong>
								<span>Happy Customers</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="40000">0</strong>
								<span>Destination Places</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="87000">0</strong>
								<span>Hotels</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="56400">0</strong>
								<span>Restaurant</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Special Offers</span>
				<h2 class="mb-4"><strong>Popular</strong> Hotels &amp; Rooms</h2>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/hotel-1.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Hotel, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price per-price">$40<br><small>/night</small></span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> Miami, Fl</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/hotel-2.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Hotel, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price per-price">$40<br><small>/night</small></span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> Miami, Fl</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/hotel-3.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Hotel, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price per-price">$40<br><small>/night</small></span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> Miami, Fl</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/hotel-4.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Hotel, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price per-price">$40<br><small>/night</small></span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> Miami, Fl</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/hotel-5.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Hotel, Italy</a></h3>
								<p class="rate">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-o"></i>
									<span>8 Rating</span>
								</p>
							</div>
							<div class="two">
								<span class="price per-price">$40<br><small>/night</small></span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> Miami, Fl</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-start">
			<div class="col-md-5 heading-section ftco-animate">
				<span class="subheading">Best Directory Website</span>
				<h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
				<p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6 heading-section ftco-animate">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
				<div class="row ftco-animate">
					<div class="col-md-12">
						<div class="carousel-testimony owl-carousel">
							<div class="item">
								<div class="testimony-wrap d-flex">
									<div class="user-img mb-5" style="background-image: url(<?=base_url("assets/images/person_1.jpg")?>);">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
									</div>
									<div class="text ml-md-4">
										<p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Dennis Green</p>
										<span class="position">Guest from italy</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap d-flex">
									<div class="user-img mb-5" style="background-image: url(<?=base_url("assets/images/person_2.jpg")?>);">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
									</div>
									<div class="text ml-md-4">
										<p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Dennis Green</p>
										<span class="position">Guest from London</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap d-flex">
									<div class="user-img mb-5" style="background-image: url(<?=base_url("assets/images/person_3.jpg")?>);">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
									</div>
									<div class="text ml-md-4">
										<p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Dennis Green</p>
										<span class="position">Guest from Philippines</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Special Offers</span>
				<h2 class="mb-4"><strong>Popular</strong> Restaurants</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/restaurant-1.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/restaurant-2.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/restaurant-3.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url("assets/images/restaurant-4.jpg")?>);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Recent Blog</span>
				<h2><strong>Tips</strong> &amp; Articles</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url(<?=base_url("assets/images/image_1.jpg")?>);">
					</a>
					<div class="text p-4 d-block">
						<span class="tag">Tips, Travel</span>
						<h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines that you don't miss out</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url(<?=base_url("assets/images/image_2.jpg")?>);">
					</a>
					<div class="text p-4">
						<span class="tag">Culture</span>
						<h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url(<?=base_url("assets/images/image_3.jpg")?>);">
					</a>
					<div class="text p-4">
						<span class="tag">Tips, Travel</span>
						<h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url(<?=base_url("assets/images/image_4.jpg")?>);">
					</a>
					<div class="text p-4">
						<span class="tag">Tips, Travel</span>
						<h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section-parallax">
	<div class="parallax-img d-flex align-items-center">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2>Subcribe to our Newsletter</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
					<div class="row d-flex justify-content-center mt-5">
						<div class="col-md-8">
							<form action="#" class="subscribe-form">
								<div class="form-group d-flex">
									<input type="text" class="form-control" placeholder="Enter email address">
									<input type="submit" value="Subscribe" class="submit px-3">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

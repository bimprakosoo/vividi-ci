<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vividi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/style.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/vividistyle.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/jquery.autocomplete.css")?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css')?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/open-iconic-bootstrap.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/bower_components/font-awesome/css/font-awesome.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/animate.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap-datepicker.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/jquery.timepicker.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/owl.carousel.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/owl.theme.default.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/magnific-popup.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/aos.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/ionicons.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/flaticon.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/icomoon.css")?>">

	<script src="<?=base_url("assets/js/jquery.min.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery-migrate-3.0.1.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.autocomplete.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap-datepicker.js")?>"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?=base_url("front")?>">Vividi.id</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="<?=base_url("front")?>" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="<?=base_url("front/about")?>" class="nav-link">About</a></li>
					<li class="nav-item"><a href="<?=base_url("index/tour")?>" class="nav-link">Tour</a></li>
					<li class="nav-item"><a href="<?=base_url("front/hotel")?>" class="nav-link">Hotels</a></li>
					<li class="nav-item"><a href="<?=base_url("front/blog")?>" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="<?=base_url("front/contact")?>" class="nav-link">Contact</a></li>
					<li class="nav-item cta cta-button"><a href="<?=base_url("login")?>" class="nav-link"><span>Login</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
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
													<input type="hidden" class="form-control" name="hotel" id="f_id_produk">
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

	<?=$_content?>

	<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5 line-br no-bottom">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Vividi.id</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">About</a></li>
							<li><a href="#" class="py-2 d-block">Service</a></li>
							<li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
							<li><a href="#" class="py-2 d-block">Become a partner</a></li>
							<li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
							<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Customer Support</h2>
					<ul class="list-unstyled">
						<li><a href="#" class="py-2 d-block">FAQ</a></li>
						<li><a href="#" class="py-2 d-block">Payment Option</a></li>
						<li><a href="#" class="py-2 d-block">Booking Tips</a></li>
						<li><a href="#" class="py-2 d-block">How it works</a></li>
						<li><a href="#" class="py-2 d-block">Contact Us</a></li>
					</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">Pondok Blimbing Indah Blok G1 No.3 Pandanwangi,<br>Kec. Blimbing, Kota Malang, Jawa Timur 65124</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">0812-1111-8486</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@vividi.id</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://vividi.id" target="_blank">VIVIDI</a>
					</p>
				</div>
			</div>
		</div>
	</footer>

<!--   loader-->
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
		</svg>
	</div>
	
	<script src="<?=base_url("assets/js/jquery.timepicker.min.js")?>"></script>
	<script src="<?=base_url("assets/js/popper.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.easing.1.3.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.waypoints.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.stellar.min.js")?>"></script>
	<script src="<?=base_url("assets/js/owl.carousel.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.magnific-popup.min.js")?>"></script>
	<script src="<?=base_url("assets/js/aos.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.animateNumber.min.js")?>"></script>
	<script src="<?=base_url("assets/js/scrollax.min.js")?>"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="<?=base_url("assets/js/google-map.js")?>"></script>
	<script src="<?=base_url("assets/js/main.js")?>"></script>
</body>
</html>

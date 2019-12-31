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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css')?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/open-iconic-bootstrap.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/flexslider.css")?>">
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
	<link rel="stylesheet" href="<?=base_url("assets/css/style.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/vividistyle.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/jquery.autocomplete.css")?>" />

	<script src="<?=base_url("assets/js/jquery.min.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery-migrate-3.0.1.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.autocomplete.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap-datepicker.js")?>"></script>
</head>
<body>
<!--header-->
<?php $this->load->view('inc/headerfront'); ?>
<!-- content -->
<div class="bg-short">
	<div class="box-bg-short">
		<span>lorem</span>
	</div>
</div>
<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			<?=$_content?>
		</div>
	</div>
</section>
<!-- footer -->
<?php $this->load->view('inc/footerfront'); ?>

<!--   loader-->
<div id="ftco-loader" class="show fullscreen">
	<svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
	</svg>
</div>

<script src="<?=base_url("assets/js/jquery.flexslider.js")?>"></script>
<script type="text/javascript">
	$(function(){
		SyntaxHighlighter.all();
	});
	$(window).load(function(){
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails",
			start: function(slider){
				$('body').removeClass('loading');
			}
		});
	});
</script>
<script src="<?=base_url("assets/js/popper.min.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.easing.1.3.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.waypoints.min.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.stellar.min.js")?>"></script>
<script src="<?=base_url("assets/js/owl.carousel.min.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.magnific-popup.min.js")?>"></script>
<script src="<?=base_url("assets/js/aos.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.animateNumber.min.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.timepicker.min.js")?>"></script>
<script src="<?=base_url("assets/js/scrollax.min.js")?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?=base_url("assets/js/google-map.js")?>"></script>
<script src="<?=base_url("assets/js/main.js")?>"></script>
</body>
</html>

<!DOCTYPE html>
<?php
if (isset($_SESSION['username'])) {
    redirect(base_url('home'));
}
?>
<html>
<head>
    <title>Vividi.id - Login Mitra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('../wp-content/uploads/2019/09/favicon-vividi-3.png'); ?>"
          type="image/x-icon"/>
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/login-vividistyle.css")?>">

	<script src="<?=base_url("assets/js/jquery.min.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#mylogin').modal('show');
        });
		window.setTimeout(function(){
			$("#alert-suc").fadeTo(500,0).slideUp(500, function(){
				$(this).remove();
			});
		}, 5000);
    </script>
</head>
<body>
	<!-- Modal login -->
	<div id="mylogin" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-pop col-xs-12">
			<!-- Modal content-->
			<div class="modal-content modal-login">
				<div class="modal-header">
					<div class="logo">
						<a href="<?=base_url("Front")?>"><img src="<?php echo base_url('assets/new-logo.png'); ?>" class="img-fluid img-logo"></a>
						<p class="text-companies">
							MITRA <span>DASHBOARD</span>
						</p>
					</div>
				</div>
				<div class="modal-body">
				<?php if(@$_GET["status"]=="register_success"){?>
					<div class="alert alert-success" id="alert-suc"><strong>Success!</strong> Pendaftaran anda berhasil. Silahkan tunggu pihak Vividi mengaktifkan akun anda. Cek E-mail anda untuk mendapatkan password jika sudah akun sudah aktif.</div>
				<?php } ?>
				<?php if(@$_GET["status"]=="login_failed"){?>
					<div class="alert alert-danger" id="alert-suc"><strong>Failed!</strong> Username/Email atau Password anda Salah.<br> Silahkan Coba Lagi.</div>
				<?php } ?>
				<?php if(@$_GET["status"]=="login_first"){?>
					<div class="alert alert-warning" id="alert-suc"><strong>Failed!</strong> Anda harus login terlebih dahulu untuk melakukan proses booking!</div>
				<?php } ?>
				<?php echo form_open(base_url('login/ceklogin')); ?>
					<div class="form-group">
						<label for="exampleInputEmail1">Username / Email</label>
						<input type="text" name="username" class="form-control" placeholder="Username / Email" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary btn-submit" value="Login" name="submit">
					<span class="txt-daftar">
						Belum punya akun ?
						<a href="<?php echo base_url('Register')?>">Daftar</a>
					</span>
				</div>
				<br>
				<?php echo form_close(); ?>
			</div>
			<p class="txt-companies-bot">
				&copy; <?=date("Y")?> PT. VIVIDI TRANSINDO UTAMA
				<span>Ver 1.9.10 </span>
			</p>
		</div>
	</div>
	<!-- End Modal Login -->
</body>
</html>

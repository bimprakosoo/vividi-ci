<!-- <link rel="stylesheet" href="https://vividi.id/mitra/assets/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
<?php
foreach ($data as $row) {
	$jml = $row->jum_kamar;
	//	$satuan = number_format($row->harga_total,0,"",".");
	$satuan = $row->harga_total;
	$total = $jml * $satuan;
	$jamcheckin = date("G:i", strtotime($row->checkin));
	?>

	<div style="width: 800px; margin:0 auto;">
		<div class="row">
			<div class="col-sm-6 col-md-8" style="background-color: #cccccc">
				<img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45" style="margin-top: 10px;margin-bottom: 10px; margin-left: 5px" />
				<span>E-Receipt</span>
				<span style="margin-right: 15px; margin-top: 10px; color: #000000; font-family: arial; font-size: 20px; font-weight: bold;float: right">BOOKING ID<br>
					<span style="display: inline-block;color: #003580; font-family: arial; font-size: 20px; font-weight: bold; margin-bottom: 10px"><?= $row->booking_no ?></span>
				</span>
			</div>
		</div>

		<div class="row" style="margin-top: 10px">
			<div class="col-sm-6 col-md-6" style="height: 125px; width: 500px;float: left; background-color: #F5F4F4">
				<b><span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 20px">Detail Pembayaran</span></b>
				<br>
				<span style="margin-top: 5px; color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
					No. Kwitansi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold; color: #003580;"><?= $row->id ?></span></span><br>
				<span style="margin-top: 5px; color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
					Sistem Pembayaran &nbsp;&nbsp;<span style="font-weight: bold; color: #003580;">Cash</span></span><br>
				<span style="margin-top: 5px; color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
					Status Pembayaran &nbsp;&nbsp;&nbsp;<span style="font-weight: bold; color: #003580;">Lunas</span></span><br>
				<span style="margin-bottom: 10px; margin-top: 5px; color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px"></span>
			</div>
			<div class="col-sm-6 col-md-6" style="width: 285px; float: left; margin-left: 10px;">
				<img style="width: 200px; height: 125px; margin:0px auto; display:block;" src="https://vividi.id/mitra/assets/images/email/paid.jpg">
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6" style="min-height: 150px; margin-top: 10px;width: 395px;float: left; background-color: #F5F4F4">
				<b><span style="color: #003580; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 25px">
						Detail Pemesan
					</span></b><br>
				<b><span style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
						<?= $row->nama_awal . " " . $row->nama_akhir ?></span></b><br>
				<span style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
					Email</span><br>
				<span style="color: #003580; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
					<?= $row->cust_email ?></span><br>
				<span style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
					Telepon</span><br>
				<span style="color: #003580; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
					<?= $row->cust_phone; ?>
				</span>
			</div>
			<div class="col-sm-6 col-md-6" style="margin-top: 10px;width: 395px; min-height: 150px;float: left; background-color: #F5F4F4; margin-left: 10px; margin-bottom:10px;">
				<b><span style="color: #003580; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 25px">
						Detail Mitra Transportasi
					</span></b><br>
				<b><span style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
						VIVIDI TRANSWISATA MALANG</span></b><br>
				<span style="color: #003580; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
					Kota Araya, Malang, Jawa Timur, Indonesia</span><br>
				<span style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
					Telepon</span><br>
				<span style="color: #003580; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
					(0341) 4382253
				</span><br>
			</div>
		</div>
		<br>
		<div class="row" style="margin-top: 10px">
			<div class="col-sm-6 col-md-6" style="min-height: 125px; float: left; background-color: #F5F4F4; padding:15px;">
				<b><span style="color: #003580; font-family: arial; display:inline-block; font-size: 25px">
						Detail Pesanan
					</span></b><br>
				<style>
					.dede {
						font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; border-collapse: collapse;
					}

					.dede td, .dede th  {
						border: 1px solid #054175; padding: 8px;
					}

					.dede tr:nth-child(even) {
						background-color: #f2f2f2;
					}

					.dede th { 
						padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #054175; color: white;
					}
				</style>
				<table class="dede">
					<tr>
						<th>No</th>
						<th style=" width: 15%;">Jenis Produk</th>
						<th style=" width: 40%;">Deskripsi</th>
						<th>Jml.</th>
						<th style=" width: 18%;">Satuan (Rp)</th>
						<th style=" width: 18%;">Total (Rp)</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Akomodasi</td>
						<td><?= $row->nama_properti . " Check In " . $row->tglcheckin . " Pukul " . $jamcheckin; ?></td>
						<td></td>
						<td>Rp. <?= number_format($satuan) ?></td>
						<td>Rp. <?= number_format($total) ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?= $row->kamar ?></td>
						<td><?= $jml ?></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td style="font-weight: bold">TOTAL</td>
						<td>Rp. <?= number_format($total) ?></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td style="font-weight: bold">ADMIN</td>
						<td>----</td>
					</tr>
					<tr style="background-color: #054175;color:#fff;">
						<td colspan="4"></td>
						<td style="font-weight: bold">JUMLAH</td>
						<td>Rp. <?= number_format($total) ?></td>
					</tr>
				</table>
			</div>
		</div>

		<!--<div class="row">
			<div class="col-sm-6 col-md-12" style="margin-top: 10px;width: 800px;float: left; background-color: #054175">
				<b><span style="margin-bottom: 5px; color: #ffffff; font-family: arial; margin-left: 20px; margin-top: 5px; display:inline-block; font-size: 16px">
						Catatan Lainnya
					</span></b>
			</div>
		</div>

		 <div class="row">
			<div class="col-sm-6 col-md-12" style="margin-top: 10px;width: 800px;float: left; background-color: #F5F4F4">
				<ul style="font-family: arial; font-size: 12px">
					<li>E-Receipt adalah pemberitahuan otomatis dari sistem pemesanan vividi.id.</li>
					<li>Dalam hal ini pesanan masih dalam status menunggu pembayaran.</li>
					<li>Pesanan dalam status menunggu pembayaran hanya berlaku 120 menit setelah E-Booking diterima.</li>
					<li>Pihak mitra akomodasi dapat mencatat sementara pesanan pelanggan dengan kode booking tercatat.</li>
					<li>Apabila dalam waktu 120 menit, mitra akomodasi tidak dapat email E-Voucher maka pemesanan dibatalkan
						oleh sistem.
					</li>
					<li>Sistem akan membatalkan otomatis apabila pemesan dalam waktu 120 menit dari waktu pemesanan tidak
						melakukan pembayaran.
					</li>
					<li>Apabila ada pesan tambahan yang diminta oleh tamu, maka mitra akomodasi dapat memberitahukan
						langsung.
					</li>
					<li>Status pemesanan tamu dapat dilihat pada dashboard mitra akomodasi.</li>
					<li>Biaya tambahan seperti parkir, deposit, telepon, layanan kamar ditangani langsung antara pihak
						akomodasi dengan tamu.
					</li>
					<li>Biaya penambahan orang dapat berlaku dan berbeda-beda menurut kebijakan akomodasi sendiri.</li>
					<li>Vividi Transwisata tidak bertanggungjawab atas biaya yang timbul diluar dari nilai yang tercantum
						dalam E-Booking.
					</li>
				</ul>
			</div>
		</div> -->

		<div class="row">
			<div class="col-sm-6 col-md-4" style="margin-top: 10px;float: left; background-color: #F5F4F4">
				<span style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Kirim Pesan Cepat</span><br>
				<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-left: 10px; margin-right:5px; margin-top: 10px; margin-bottom: 10px" />
				</a>
				<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6287885124429&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px" />
				</a>
				<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6285933736049&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px" />
				</a>
				<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px" />
				</a>
			</div>

			<div class="col-sm-6 col-md-4" style="margin-left: 20px; margin-top: 10px;float: left; background-color: #F5F4F4">
				<span style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Bantuan Melalui Email</span><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/email.png" alt="" style="margin-left: 10px; height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px" />
				<span style="text-decoration: none;font-family: arial; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right">info@vividi.id</span>
			</div>

			<div class="col-sm-6 col-md-4" style="margin-left: 20px; margin-top: 10px;float: left; background-color: #F5F4F4">
				<span style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan Telepon</span><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt="" style="height: 25px; margin-left: 10px; margin-right:5px;margin-top: 10px; margin-bottom: 10px" />
				<a style="text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right" href="tel:+623414382253">+62 341 438 2253</a>
			</div>

			<div class="col-sm-6 col-md-4" style="margin-left: 20px; margin-top: 10px;float: left; background-color: #F5F4F4">
				<span style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan mendesak 24 jam</span><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt="" style="height: 25px; margin-left: 10px;margin-top: 10px; margin-bottom: 10px" />
				<a style="text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 30px;  float: right" href="tel:+6281211118486">+62 812 1111 8486</a>
			</div>
		</div>

		<div class="row col-sm-6 col-md-12" style="margin-top: 10px;width: 800px;float: left;">
			<hr>
			<div class="col-sm-6 col-md-4" style="width: 200px; margin-top: 10px;float: left; background-color: #cccccc">
				<span style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Total Harga</span><br>
				<span style="margin-bottom: 10px; color: #003580; font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-right: 10px">Rp <?=number_format($total)?></span>
			</div>

			<div class="col-sm-6 col-md-4" style="margin-left: 30px; margin-top: 10px;float: left">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/google.png" style="width: 140px; height: 45px; margin-bottom: 5px"><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/app.png" style="width: 140px; height: 45px; margin-bottom: 5px">
			</div>

			<div class="col-sm-6 col-md-4" style="display: inline-block; margin-left: 30px;float: left">
				<div style="display:inline-block; vertical-align: top">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/logoandroid.png" alt="" style="width: 50px; height: 90px; margin-bottom: 5px; margin-top: 10px" />
				</div>
				<div style="display:inline-block;margin-top: 10px; font-size: 15px; font-family: arial">
					<span>Apabila tamu tidak sempat<br>
						untuk mencetak E-Voucher<br>
						kami mohon kepada mitra<br>
						agar memudahkan proses<br>
						check-in dengan meminta<br>
						ID & Booking ID
					</span>
				</div>
			</div>

			<div class="col-sm-6 col-md-4" style="margin-left: 30px; margin-top: 10px;float: left">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/frame.png" alt="" style="width: 120px; height: 120px; margin-bottom: 10px" />
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-12" style="width: 800px;float: left;text-align: center">
				<hr>
				<span style="font-family: arial; font-size: 15px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">© 2019 PT. Vividi Transindo Utama</span>
			</div>
		</div>
	</div>

<?php } ?>
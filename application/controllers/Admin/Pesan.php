<?php


class Pesan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_email');
		$this->load->model('Model_properti');
		$this->load->model('Model_pesan');
	}

	public function index(){
		$data["active_menu"] = "booking";
		$data['page_heading'] = 'Data Pesanan';

		$data['book_dly'] = $this->Model_pesan->data_pesan_menunggu()->result_array();
		$data['book_ccl'] = $this->Model_pesan->data_pesan_batal()->result_array();
		$data['book_suc'] = $this->Model_pesan->data_pesan_sukses()->result_array();
		$data['data_semua'] = $this->Model_pesan->data_pesan()->result_array();
		$this->theme->panel('Admin/properti/view_pesan', $data);
	}

	public function send_email($booking_no)
	{
		$data['data'] = $this->Model_email->data_email($booking_no);
		$mitra = $this->Model_email->email_owner($booking_no);
		$cust = $this->Model_email->email_custowner($booking_no);
		$admin = 'order@vividi.id';
//		$admin = 'order@vividi.id';
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'devano2019',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'VIVIDI E-Voucher '.$booking_no);

		$list = array($mitra, $cust, $admin);
		// Email penerima
		$this->email->to($list); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('VIVIDI E-Voucher '.$booking_no);
		// Isi email
		$body = $this->load->view('Test/voucher.php',$data,  TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
//			redirect(base_url('Admin/Pesan/pesan'));
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}
	}

	public function email_confirm($booking_no)
	{
//		$mitra = $_SESSION['email'];
		$admin = 'order@vividi.id';
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'devano2019',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'Email Konfirmasi Pembayaran');

//		$list = array($mitra, $admin);
		// Email penerima
		$this->email->to($admin); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('Email Konfirmasi Pembayaran');
		$data['data'] = $this->Model_email->data_email($booking_no);
		// Isi email
		$body = $this->load->view('Test/confirm.php',$data,  TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			redirect('http://localhost/vividi-dev/halaman-member/?ihc_ap_menu=orders');
//			echo 'Sukses';
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}
	}

	public function email_receipt($booking_no)
	{
//		$mitra = $_SESSION['email'];
		$cust = $this->Model_email->email_custowner($booking_no);
		$admin = 'order@vividi.id';
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'devano2019',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'VIVIDI E-Receipt '.$booking_no);

//		$list = array($mitra, $admin);
		// Email penerima
		$list = array($cust, $admin);
		$this->email->to($list); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('VIVIDI E-Receipt '.$booking_no);
		$data['data'] = $this->Model_email->data_email($booking_no);
		// Isi email
		$body = $this->load->view('Test/receipt.php',$data,  TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
//			redirect('http://localhost/vividi-dev/halaman-member/?ihc_ap_menu=orders');
//			redirect(base_url('Admin/Pesan/pesan'));
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}
	}

	public function sukses($id){
		$cekk = $this->Model_email->get_sukses($id);
	
		if($cekk!=TRUE){
			redirect("Admin/Pesan?status=reject_failed", 'refresh');
		} else {
			// $this->send_email($booking_no);
			// $this->email_receipt($booking_no);
			redirect("Admin/Pesan?status=accept_success", 'refresh');
		}
	}

	public function gagal($id){
		$cekk = $this->Model_email->get_cancel($id);
	
		if($cekk!=TRUE){
			redirect("Admin/Pesan?status=reject_failed", 'refresh');
		} else {
			// $this->send_email($booking_no);
			// $this->email_receipt($booking_no);
			redirect("Admin/Pesan?status=reject_success", 'refresh');
		}
	}
}

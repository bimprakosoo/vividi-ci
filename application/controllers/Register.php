<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function send_email($email, $user, $properti, $nama)
	{
		// Konfigurasi email
		$config = [
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'devano2019',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'Pendaftaran Member Baru Mitra Properti');

//        $list = array($mitra, $cust);
		// Email penerima
		$this->email->to($email); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
		//$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject('Pendaftaran Member Baru Mitra Properti');
		// Isi email
		$data['data'] = $email;
		$data['user'] = $user;
		$data['nama'] = $nama;
		$data['properti'] = $properti;
		$body = $this->load->view('Test/email_register.php', $data, TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
		// redirect(base_url(''));
		} else {
			echo 'Error! email Mitra tidak dapat dikirim.';
		}
	}

	public function send_admin($email, $user, $pass, $nama, $jabatan, $properti)
	{
		// Konfigurasi email
		$config = [
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'devano2019',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'Pendaftaran Member Baru Mitra Properti');

		//$list = array($mitra, $cust);
		// Email penerima
		$this->email->to('order@vividi.id'); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
		//$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject('Pendaftaran Member Baru Mitra Properti');
		// Isi email
		$data['data'] = $email;
		$data['user'] = $user;
		$data['pass'] = $pass;
		$data['nama'] = $nama;
		$data['jabatan'] = $jabatan;
		$data['properti'] = $properti;
		$body = $this->load->view('Test/email_register_admin.php', $data, TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
		// redirect(base_url(''));
		} else {
			echo 'Error! email Admin tidak dapat dikirim.';
		}
	}
	
	public function cek_register(){
		$content   = $_POST["dt"];
		$cek_email = $this->Model_profil->check_email($content["f_email"])->row_array();

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Failed</strong> <span>', '</span></div>');
		$this->form_validation->set_rules('dt[nama_awal]', 'Nama Awal', 'required');
		$this->form_validation->set_rules('dt[nama_akhir]', 'Nama Akhir', 'required');
		$this->form_validation->set_rules('dt[f_username]', 'Username', 'required|min_length[5]');
		$this->form_validation->set_rules('dt[f_email]', 'Email', 'required|min_length[6]|is_unique[tb_user_data.f_email]');
		$this->form_validation->set_rules('dt[f_telepon]', 'Telepon', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[13]');
		$this->form_validation->set_rules('dt[f_asal_hotel]', 'Properti', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {
			$content["f_nama"] = $content["nama_awal"]." ".$content["nama_akhir"];
			$content["f_password"] = $this->my_config->generateRandomString();
			$content["f_registered"] = date("Y-m-d h:i:s");
			// $cek_email = $this->Model_register->cek_email($content);
			$cekk = $this->Model_register->save_mitra($content);
			
				// $this->send_email($email, $user, $properti, $nama);
				// $this->send_admin($email, $user, $pass, $nama, $jabatan, $properti);
			if($cekk!=TRUE){
				redirect("Register?status=register_failed", 'refresh');
			} else {
				redirect("Login?status=register_success", 'refresh');
			}
		}
	}
}

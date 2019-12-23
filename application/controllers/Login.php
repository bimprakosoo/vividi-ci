<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_login');
		if($this->session->userdata('login')==TRUE){
			if ($this->session->userdata('level') == 0)
				redirect("Admin/Home");
			if ($this->session->userdata('level') == 1)
				redirect("Admin/Home");
			if ($this->session->userdata('level') == 2)
				redirect("Home");
			if ($data["f_level"] != 0 || $data["f_level"] != 1 || $data["f_level"] != 2)
				redirect("login");
        }
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function ceklogin()
	{
		if (isset($_POST['submit'])) {
//            $pass = md5($this->input->post('password', true));
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			
			$cek = $this->Model_login->cek_login($user, $pass);
			$value = $this->Model_login->cek_login($user,$pass)->row();

			if ($cek->num_rows() > 0) {
				$data = array('login'=>TRUE,
							  'f_username'=>$value->f_username, 
							  'f_id'=> $value->f_id, 
							  'f_kode'=> $value->f_kode, 
							  'f_nama'=> $value->f_nama, 
							  'f_email'=> $value->f_email, 
							  'f_level'=> $value->f_level
							);
				$this->session->set_userdata($data);
				if ($data["login"]==TRUE) {
				 	if($this->session->userdata('level') == 0)
                    	redirect("Admin/Home");
	                if($this->session->userdata('level') == 1)
	                    redirect("Admin/Home");
	                if($this->session->userdata('level') == 2)
	                    redirect("Home");
	                if($data["f_level"] != 0 || $data["f_level"] != 1 || $data["f_level"] != 2 )
	                    redirect("login");
				}	
			} else {
				redirect("Login?status=login_failed", 'refresh');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
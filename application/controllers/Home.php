<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data["active_menu"] = "home";
        $data['page_heading'] = 'Dashboard';

        $id = $this->session->userdata('f_kode');
        $data['all_book'] = $this->Model_pesan->data_pesan()->result_array();
        $data['ccl_book'] = $this->Model_pesan->data_pesan_batal()->result_array();
        $data['dly_book'] = $this->Model_pesan->data_pesan_menunggu()->result_array();
        $data['suc_book'] = $this->Model_pesan->data_pesan_sukses()->result_array();
        $this->theme->panel('index',$data);
    }

    public function edit_profile()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $cek = $this->input->post('cek');
        $depan = $this->input->post('depan');
        $belakang = $this->input->post('belakang');
        $this->form_validation->set_rules('telepon', 'Telephone', 'trim|required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() != FALSE) {
            if ($email != $cek) {
                $cek_email = $this->Model_register->cek_email($email);
                if ($cek_email == true){
                    $this->Model_register->save_new_email($id, $email);
                }
            }
            $this->Model_register->save_profile($id, $depan, $belakang, $telepon);
            $_SESSION['nama'] = $depan . ' ' . $belakang;
        }
        redirect(base_url('home/profile'));
    }

    public function profile()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_profil->data_profile($id);
        $data['folder'] = "profile";
        $data['side'] = "profile";
        $this->load->view('index', $data);
    }

    public function daftar(){
    	$id = $_SESSION['ID'];
		$data['data'] = $this->Model_profil->data_user($id);
		$data['folder'] = "profile";
		$data['side'] = "daftar";
		$this->load->view('index', $data);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}

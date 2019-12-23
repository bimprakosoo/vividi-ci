<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
    }

	public function index(){
        $data["active_menu"] = "home";
        $data['page_heading'] = 'Dashboard';

        $id = $this->session->userdata('f_kode');
        $data['all_book'] = $this->Model_pesan->data_pesan()->result_array();
        $data['ccl_book'] = $this->Model_pesan->data_pesan_batal()->result_array();
        $data['dly_book'] = $this->Model_pesan->data_pesan_menunggu()->result_array();
        $data['suc_book'] = $this->Model_pesan->data_pesan_sukses()->result_array();
        $this->theme->panel('Admin/index',$data);
	}
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}

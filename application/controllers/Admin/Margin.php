<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Margin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data["active_menu"] = "margin";
        $data['page_heading'] = 'Data Margin';

        $data['margin'] = $this->Model_margin->margin()->row_array();
        $this->theme->panel('Admin/margin/view_margin', $data);
    }

    public function ubah_margin(){
        $content = $_POST['dt'];

        $cekk = $this->Model_margin->save_margin($content);
        if ($cekk != TRUE) {
            redirect('Admin/Margin?status=failed_margin', 'refresh');
		} else {
			// $this->email_verifikasi($id);
			//$this->email_receipt($booking_no);
			redirect('Admin/Margin?status=success_margin', 'refresh');
		}
    }

}
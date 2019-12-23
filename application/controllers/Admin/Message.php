<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function penggunaan()
    {
        $data["active_menu"] = "penggunaan";
        $data['page_heading'] = 'Cara Penggunaan';

        $data['post'] = $this->Model_message->penggunaan()->row_array();
        $this->theme->panel('Admin/message/view_penggunaan', $data);
    }

    public function syarat_ketentuan()
    {
        $data["active_menu"] = "snk";
        $data['page_heading'] = 'Syarat dan Ketentuan';

        $data['post'] = $this->Model_message->syarat_ketentuan()->row_array();
        $this->theme->panel('Admin/message/view_syarat_ketentuan', $data); 
    }

    public function hubungi()
    {
        $data["active_menu"] = "hubungi";
        $data['page_heading'] = 'Hubungi Kami';

        $data['post'] = $this->Model_message->hubungi()->row_array();
        $this->theme->panel('Admin/message/view_hubungi', $data); 
    }

    public function tentang()
    {
        $data["active_menu"] = "about";
        $data['page_heading'] = 'Tentang Dashboard Mitra';

        $data['post'] = $this->Model_message->tentang()->row_array();
        $this->theme->panel('Admin/message/view_tentang', $data); 
    }

    public function save_penggunaan()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_penggunaan($text);
        redirect('Admin/Message/penggunaan?status=success_saving');
       
    }

    public function save_syarat_ketentuan()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_syarat_ketentuan($text);
        redirect('Admin/Message/syarat_ketentuan?status=success_saving');
    }

    public function save_hubungi()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_hubungi($text);
        redirect('Admin/Message/hubungi?status=success_saving');
    }

    public function save_tentang()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_tentang($text);
        redirect('Admin/Message/tentang?status=success_saving');
    }

}
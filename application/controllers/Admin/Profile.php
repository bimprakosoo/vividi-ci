<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data["active_menu"] = "profile";
        $data['page_heading'] = 'Detail Profil';

        $id = $this->session->userdata('f_kode');
        $data['profil'] = $this->Model_profil->data_profile($id)->row_array();
        $this->theme->panel('Admin/profile/view_profile', $data);
    }

    public function edit_profile(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Failed</strong> <span>', '</span></div>');
		$this->form_validation->set_rules('dt[nama_awal]', 'Nama Awal', 'required');
		$this->form_validation->set_rules('dt[nama_akhir]', 'Nama Akhir', 'required');
		// $this->form_validation->set_rules('dt[f_email]', 'Email', 'required|min_length[6]|is_unique[tb_user_data.f_email]');
		$this->form_validation->set_rules('dt[f_telepon]', 'Telepon', 'required|min_length[6]|max_length[12]');
		if ($this->form_validation->run() == FALSE) {
            $id = $this->session->userdata('f_kode');
            $data['profil'] = $this->Model_profil->data_profile($id)->row_array();
            $this->theme->panel("Admin/Profile/view_profile",$data);
		} else {
           if ($this->form_validation->run() != FALSE) {
                $content = $_POST["dt"];
                // $this->Model_register->save_new_email($id, $email);
                if ($content["f_email"] != $content["email_lama"]) {
                    $cek_email = $this->Model_register->cek_email($content["f_email"]);
                    if ($cek_email == true) {
                        $content["f_nama"] = $content["nama_awal"] . " " . $content["nama_akhir"];

                        $cekk = $this->Model_register->save_profile($content);
                        if ($cekk != TRUE) {
                            redirect("Admin/Profile?status=edit_failed", 'refresh');
                        } else {
                            redirect("Admin/Profile?status=edit_success", 'refresh');
                        }
                    }else{ 
                        redirect("Admin/Profile?status=email_exist", 'refresh'); 
                    }
                }else{
                    $content["f_nama"] = $content["nama_awal"]." ".$content["nama_akhir"];
                    
                    $cekk = $this->Model_register->save_profile($content);
                    if($cekk!=TRUE){
                        redirect("Admin/Profile?status=edit_failed", 'refresh');
                    } else {
                        redirect("Admin/Profile?status=edit_success", 'refresh');
                    }
                   
                }
            }   
        }
    }

    public function reset_pass(){
        $data["active_menu"] = "profile";
        $data['page_heading'] = 'Reset Password';

        $id = $this->session->userdata('f_kode');
        $data['profil'] = $this->Model_profil->data_profile($id)->row_array();
        $this->theme->panel('Admin/profile/view_reset_pass', $data);
    }


    public function edit_password(){
        $content = $_POST["dt"];
        $pass_lama = $this->Model_profil->pass_lama($content["f_kode"])->row_array();
        
        if ($pass_lama["f_password"] != $content["f_password_lama"] || $content["f_password_baru"] != $content["f_password_confirm"]) {
            redirect("Admin/Profile/Reset_pass?status=passchange_failed", 'refresh');
        }else{
            $cekk = $this->Model_profil->save_new_pass($content);
            if($cekk!=TRUE){
                redirect("Admin/Profile/Reset_pass?status=passchange_failed", 'refresh');
            } else {
                redirect("Admin/Profile/Reset_pass?status=passchange_success", 'refresh');
            }
        }
    }
}
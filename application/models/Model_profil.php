<?php
class Model_profil extends CI_Model
{

    public function data_profile($id)
    {
        return $this->db->select('u.f_kode as id, u.f_email as email, u.f_telepon as telepon, u.f_nama as nama, u.f_password as password')
                        ->where('u.f_kode', $id)
                        ->get('tb_user_data u');        
    }

    function data_user($id){
    	$this->db->select('u.id as id,
    	u.user_login as user,
    	u.user_email as email,
    	u.display_name as nama,
    	u.telepon as telepon,
    	u.jabatan as jabatan');
		$this->db->from('wpwj_users u');
		$this->db->where('u.parent_id', $id);
		$query = $this->db->get();
		return $query->result();
    }

    function pass_lama($id)
    {
        return $this->db->select('f_password')
                        ->where('f_kode', $id)
                        ->get('tb_user_data');
    }

    function save_new_pass($content){
        $pas = array(
			   'f_password' => $content["f_password_baru"]
		);
		
		$pass = $this->db->where("f_kode",$content["f_kode"])
						 ->update('tb_user_data', $pas);

		if ($pass==TRUE) {
			$cek = true;
			return $cek;
		}
    }
}

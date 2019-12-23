<?php

class Model_register extends CI_Model
{
	function save_mitra($content)
	{
		$data = array(
			'f_kode' => $content["f_kode"],
			'f_nama' => $content["f_nama"],
			'f_username' => $content["f_username"],
			'f_email' => $content["f_email"],
			'f_password' => $content["f_password"],
			'f_telepon' => $content["f_telepon"],
			'f_jabatan' => '1',
			'f_asal_hotel' => $content["f_asal_hotel"],
			'f_status' => '2',
			'f_level' => '2',
			'f_registered' => $content["f_registered"]
		);
		$cekx = $this->db->insert('tb_user_data', $data);
		if ($cekx==TRUE) {
			$cek = true;
			return $cek;
		}
	}

	function cek_email($email)
	{
		$email_valid = $this->db->select('f_email')
				 				->where('f_email', $email)
								->get('tb_user_data');

		if ($email_valid->num_rows() == 0) {
			$cek = true;
			return $cek;
		}
	}

	function save_profile($content){
		$pro = array(
			'f_nama' => $content["f_nama"],
			'f_email' => $content["f_email"],
			'f_telepon' => $content["f_telepon"]
		);
		
		$prof = $this->db->where("f_kode",$content["f_kode"])
						->update('tb_user_data', $pro);

		if ($prof==TRUE) {
			$cek = true;
			return $cek;
		}
	}

	// function save_new_email($id, $email)
	// {
	// 	$data = array(
	// 		'user_email' => $email
	// 	);
	// 	$this->db->where('ID', $id);
	// 	$this->db->update('wpwj_users', $data);
	// }

	function verifikasi()
	{
		return $this->db->select('tb_user_data.f_kode, tb_user_data.f_username, tb_user_data.f_email, tb_user_data.f_registered, tb_user_data.f_nama, tb_properti.f_nama_properti, tb_user_data.f_level, tb_user_data.f_status, tb_user_data.f_telepon')
						->join("tb_properti","tb_properti.f_author_properti=tb_user_data.f_kode","left")
						->where("tb_user_data.f_level","2")
						->where("tb_user_data.f_jabatan","1")
						->where('tb_user_data.f_status',"2")
						->get('tb_user_data');
	}
					
	function semua_verifikasi()
	{
		return $this->db->select('tb_user_data.f_kode, tb_user_data.f_username, tb_user_data.f_email, tb_user_data.f_registered, tb_user_data.f_nama, tb_properti.f_nama_properti, tb_user_data.f_level, tb_user_data.f_status, tb_user_data.f_telepon')
						->join("tb_properti","tb_properti.f_author_properti=tb_user_data.f_kode","left")
						->where("tb_user_data.f_level","2")
						->where("tb_user_data.f_jabatan","1")
						->where('tb_user_data.f_status',"1")
						->get('tb_user_data');
	}

// 	function semua_user()
// 	{
// 		$this->db->select('wpwj_users.ID, wpwj_users.user_login, wpwj_users.user_email, 
// 		wpwj_users.user_registered, wpwj_users.display_name, wpwj_users.name_hotel, 
// 		wpwj_users.jabatan, wpwj_users.status, wpwj_users.telepon');
// //		$this->db->where('mitra', 'Hotel');
// 		$this->db->where('status', 1);
// //		$this->db->set('price_per_room', 'price_normal' + ('price_per_room')*$d/100);
// 		$this->db->from('wpwj_users');
// 		return $this->db->get();

// 		$result = [];
// 		$data = $query->result_array();
// 		foreach ($data as $dt) {
// //            $host = gethostbyname(gethostname());
// //            $dt['Img'] = 'http://' . $host . '/tempat.in/' . $dt['Logo'];
// 			$result[] = $dt;
// 		}

// 		return $result;
// 	}

	public function get_verifikasi($id)
	{
		$data = array(
			'f_status' => '1'
		);
		$upd = $this->db->where('f_kode', $id)
						->update('tb_user_data', $data);
		if ($upd==TRUE) {
			$cek = true;
			return $cek;
		}
	}

// 	function confirm_verification($id)
// 	{
// 		$this->db->select('wpwj_users.ID, wpwj_users.user_login, wpwj_users.user_pass, wpwj_users.user_email, 
// 		wpwj_users.user_registered, wpwj_users.display_name, wpwj_users.name_hotel, 
// 		wpwj_users.jabatan, wpwj_users.status, wpwj_users.telepon');
// 		$this->db->where('ID', $id);
// 		return $this->db->get('wpwj_users')->result();
// 	}

// 	public function verification_cust($id)
// 	{
// 		$query = $this->db->query("select us.ID as id,
// 			us.user_email as email
// 			from wpwj_users us
// 			where us.ID = '$id'
// 			");
// 		foreach ($query->result() as $row) {
// 			$email = $row->email;
// 			return $email;
// 		}
// 	}
}

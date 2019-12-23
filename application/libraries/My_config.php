<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_config {
	protected $_ci;

	function __construct(){
		$this->_ci =& get_instance();
		$this->_ci->load->database();
	}
	
	function getLanguage(){
		$lang["ID"] = "Bahasa Indonesia";
		$lang["EN"] = "English";
		
		return $lang;
	}
	function checkmenu($uri){
		if($_SESSION['session_cpanel']["f_level"]!=1){
			$query_menu = $this->_ci->db->where("tb_menu_admin.f_status","1")
										->join("tb_level_menu_admin","tb_level_menu_admin.f_id_menu_admin=tb_menu_admin.f_id_menu_admin")
										->where("tb_level_menu_admin.f_id_user",$_SESSION["session_cpanel"]["f_id_user"])
										->where("tb_menu_admin.f_menu_admin_url",$uri)
										->get("tb_menu_admin")
										->num_rows();
			if($query_menu==NULL){
				redirect('cpanel/home');
			}
		}
        
	}
	function pagination(){
		$config['full_tag_open']	= "<ul class='pagination pagination-sm'>";
		$config['full_tag_close']	= "</ul>";
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a>';
		$config['cur_tag_close']	= '</a></li>';
		$config['prev_link'] 		= '<span class="glyphicon glyphicon-chevron-left"></span>';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['next_link'] 		= '<span class="glyphicon glyphicon-chevron-right"></span>';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['first_link'] 		= '<span class="glyphicon glyphicon-step-backward"></span> First';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last <span class="glyphicon glyphicon-step-forward"></span>';
		return $config;
	}
	
	//Time Zone
	function getTimeZone(){
		return ($this->_ci->fn->isOnline())?15:0;
	}
	
	function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
?>
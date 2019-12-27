<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_login extends CI_Model{
    function cek_login($user, $pass)
    {
        return $this->db->where('f_username', $user)
        				->where('f_password', $pass)
        				->or_where('f_email', $user)
        				->where('f_password', $pass)
         				->get('tb_user_data');
    }
}
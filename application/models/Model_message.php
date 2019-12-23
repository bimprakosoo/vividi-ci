<?php
class Model_message extends CI_Model
{
    function penggunaan()
    {
        return $this->db->select('f_post')
                        ->where('f_tipe_post', '1')
                        ->get('tb_post');
    }

    function syarat_ketentuan()
    {
        return $this->db->select('f_post')
                        ->where('f_tipe_post', '2')
                        ->get('tb_post');
    }

    function hubungi()
    {
        return $this->db->select('f_post')
                        ->where('f_tipe_post', '3')
                        ->get('tb_post');
    }

    function tentang(){
        return $this->db->select('f_post')
                        ->where('f_tipe_post', '4')
                        ->get('tb_post');
    }

    function save_penggunaan($text)
    {
        $data = array(
            'f_post' => $text
        );
        $peng = $this->db->where('f_tipe_post', '1')
                         ->update('tb_post', $data);
    }

    function save_syarat_ketentuan($text){
        $data = array(
            'f_post' => $text
        );
        $peng = $this->db->where('f_tipe_post', '2')
                         ->update('tb_post', $data);
    }

    function save_hubungi($text){
        $data = array(
            'f_post' => $text
        );
        $peng = $this->db->where('f_tipe_post', '3')
                         ->update('tb_post', $data);
    }

    function save_tentang($text){
        $data = array(
            'f_post' => $text
        );
        $peng = $this->db->where('f_tipe_post', '4')
                         ->update('tb_post', $data);
    }
}
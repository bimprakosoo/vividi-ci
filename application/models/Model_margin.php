<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_margin extends CI_Model
{
    function margin()
    {
        return $this->db->order_by("f_id_margin","desc")
                        ->get('tb_margin');
        
    }
    function save_margin($content)
    {
        $mar = array(
               'f_margin' => $content["margin"]
        );
        $marg = $this->db->insert('tb_margin', $mar);

        //update harga + margin
        $hrg = $this->db->select('f_id_harga,f_harga_awal')
                        ->get('tb_harga')->result_array();
        
        foreach ($hrg as $hrg) {
            $mar = array(
                   "f_id_harga" => $hrg['f_id_harga'],
                   'f_harga_akhir' =>  $hrg['f_harga_awal'] + ($hrg['f_harga_awal'] * $content['margin'] / 100)
            );
            $output[] = $mar;
        }
        $this->db->update_batch('tb_harga', $output, "f_id_harga");

        if ($marg==TRUE) {
        	$cek = true;
        	return $cek;
        }
    }
}
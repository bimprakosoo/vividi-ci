<?php
class Model_booking extends CI_Model{
    public function savebookingtmp($content){
        $data = array(
            'f_kode_booking'    => $content["f_kode_booking"],
			'f_kode_user'       => $content["f_kode_user"],
            'f_kode_kamar'      => $content["f_kode_kamar"],
            'f_tamu_bk'         => $content["f_tamu_bk"],
            'f_check_in_bk'     => $content["f_check_in_bk"],
			'f_check_out_bk'    => $content["f_check_out_bk"],
            'f_jumlah_kamar'    => $content["f_jumlah_kamar"],
            'f_guest_bk'        => $content["f_guest_bk"],
            'f_rek_pembayaran'  => $content["f_rek_pembayaran"],
            'f_total_harga'     => $content["f_total_harga"],
			'f_tgl_booking'     => $content["f_tgl_booking"],
			'f_status_booking'  => '2'
		);
		$cekx = $this->db->insert('tb_booking_tmp', $data);
		if ($cekx==TRUE) {
			$cek = true;
			return $cek;
		}
    }
}
?>
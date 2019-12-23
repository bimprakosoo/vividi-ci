<?php


class Model_pesan extends CI_Model
{

	// function data_pesan_mitra($id){
	// 	$query = $this->db->query("select ab.id as id,
	// 		 ab.booking_no as booking_no,
	// 		 ab.first_name as nama_awal,
	// 		 ab.last_name as nama_akhir,
	// 		 ab.date_from as check_in,
	// 		 ab.date_to as check_out,
	// 		 p_prop.post_title as properti,
	// 		 p_kamar.post_title as tipe_kamar,
	// 		 ab.rooms as jumlah,
	// 		 ab.room_price as harga,
	// 		 ab.created as pesan,
	// 		 CASE
	// 		 WHEN ab.status = 0 THEN 'Batal'
	// 		 WHEN ab.status = 1 THEN 'Menunggu'
	// 		 WHEN ab.status = 2 THEN 'Sukses'
	// 		 END as status
	// 		 from wpwj_trav_accommodation_bookings ab
	// 		 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
	// 		 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
	// 		 and p_prop.post_author = $id
	// 		 order by pesan desc");
	// 	return $query->result();
	// }

	// function data_pesan_batal_mitra($id){
	// 	$query = $this->db->query("select ab.id as id,
	// 		 ab.booking_no as booking_no,
	// 		 ab.first_name as nama_awal,
	// 		 ab.last_name as nama_akhir,
	// 		 ab.date_from as check_in,
	// 		 ab.date_to as check_out,
	// 		 p_prop.post_title as properti,
	// 		 p_kamar.post_title as tipe_kamar,
	// 		 ab.rooms as jumlah,
	// 		 ab.room_price as harga,
	// 		 ab.created as pesan,
	// 		 CASE
	// 		 WHEN ab.status = 0 THEN 'Batal'
	// 		 END as status
	// 		 from wpwj_trav_accommodation_bookings ab
	// 		 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
	// 		 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
	// 		 where ab.status = '0'
	// 		 and p_prop.post_author = $id
	// 		 order by pesan desc");
	// 	return $query->result();
	// }

	// function data_pesan_menunggu_mitra($id){
	// 	$query = $this->db->query("select ab.id as id,
	// 		 ab.booking_no as booking_no,
	// 		 ab.first_name as nama_awal,
	// 		 ab.last_name as nama_akhir,
	// 		 ab.date_from as check_in,
	// 		 ab.date_to as check_out,
	// 		 p_prop.post_title as properti,
	// 		 p_kamar.post_title as tipe_kamar,
	// 		 ab.rooms as jumlah,
	// 		 ab.room_price as harga,
	// 		 ab.created as pesan,
	// 		 CASE
	// 		 WHEN ab.status = 1 THEN 'Menunggu'
	// 		 END as status
	// 		 from wpwj_trav_accommodation_bookings ab
	// 		 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
	// 		 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
	// 		 where ab.status = '1'
	// 		 and p_prop.post_author = $id
	// 		 order by pesan desc");
	// 	return $query->result();
	// }

	// function data_pesan_sukses_mitra($id){
	// 	$query = $this->db->query("select ab.id as id,
	// 		 ab.booking_no as booking_no,
	// 		 ab.first_name as nama_awal,
	// 		 ab.last_name as nama_akhir,
	// 		 ab.date_from as check_in,
	// 		 ab.date_to as check_out,
	// 		 p_prop.post_title as properti,
	// 		 p_kamar.post_title as tipe_kamar,
	// 		 ab.rooms as jumlah,
	// 		 ab.room_price as harga,
	// 		 ab.created as pesan,
	// 		 CASE
	// 		 WHEN ab.status = 2 THEN 'Sukses'
	// 		 END as status
	// 		 from wpwj_trav_accommodation_bookings ab
	// 		 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
	// 		 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
	// 		 where ab.status = '2'
	// 		 and p_prop.post_author = $id
	// 		 order by pesan desc");
	// 	return $query->result();
	// }

	function data_pesan(){
		return $this->db->select("bo.f_id_booking as id, bo.f_kode_booking as booking_no, usr.f_nama as nama,bo.f_check_in_bk as check_in, bo.f_check_out_bk as check_out, prop.f_nama_properti as properti,prop.f_kode_properti as kode_properti, kamr.f_nama_kamar as tipe_kamar, bo.f_jumlah_kamar as jumlah,bo.f_total_harga as harga, bo.f_tgl_booking as pesan, prop.f_author_properti as owner_properti,bo.f_status_booking as status")
						->join("tb_user_data usr","usr.f_kode=bo.f_kode_user","left")
						->join("tb_kamar kamr","kamr.f_kode_kamar=bo.f_kode_kamar","left")
						->join("tb_properti prop","prop.f_kode_properti=kamr.f_kode_properti","left")
						->order_by("booking_no desc")
						->get("tb_booking bo");
	}

	function data_pesan_batal(){
		return $this->db->select("bo.f_id_booking as id, bo.f_kode_booking as booking_no,usr.f_nama as nama,bo.f_check_in_bk as check_in,bo.f_check_out_bk as check_out,prop.f_nama_properti as properti,prop.f_kode_properti as kode_properti,kamr.f_nama_kamar as tipe_kamar,bo.f_jumlah_kamar as jumlah,bo.f_total_harga as harga,bo.f_tgl_booking as pesan,prop.f_author_properti as owner_properti,bo.f_status_booking as status")
						->join("tb_user_data usr", "usr.f_kode=bo.f_kode_user", "left")
						->join("tb_kamar kamr", "kamr.f_kode_kamar=bo.f_kode_kamar", "left")
						->join("tb_properti prop", "prop.f_kode_properti=kamr.f_kode_properti", "left")
						->where("bo.f_status_booking", "0")
						->order_by("booking_no desc")
						->get("tb_booking bo");
	}

	function data_pesan_menunggu(){
		return $this->db->select("bo.f_id_booking as id, bo.f_kode_booking as booking_no,usr.f_nama as nama,bo.f_check_in_bk as check_in,bo.f_check_out_bk as check_out,prop.f_nama_properti as properti,prop.f_kode_properti as kode_properti,kamr.f_nama_kamar as tipe_kamar,bo.f_jumlah_kamar as jumlah,bo.f_total_harga as harga,bo.f_tgl_booking as pesan,prop.f_author_properti as owner_properti,bo.f_status_booking as status")
						->join("tb_user_data usr", "usr.f_kode=bo.f_kode_user", "left")
						->join("tb_kamar kamr", "kamr.f_kode_kamar=bo.f_kode_kamar", "left")
						->join("tb_properti prop", "prop.f_kode_properti=kamr.f_kode_properti", "left")
						->where("bo.f_status_booking", "2")
						->order_by("booking_no desc")
						->get("tb_booking bo");
	}

	function data_pesan_sukses(){
		return $this->db->select("bo.f_id_booking as id, bo.f_kode_booking as booking_no,usr.f_nama as nama,bo.f_check_in_bk as check_in,bo.f_check_out_bk as check_out,prop.f_nama_properti as properti,prop.f_kode_properti as kode_properti,kamr.f_nama_kamar as tipe_kamar,bo.f_jumlah_kamar as jumlah,bo.f_total_harga as harga,bo.f_tgl_booking as pesan,prop.f_author_properti as owner_properti,bo.f_status_booking as status")
						->join("tb_user_data usr", "usr.f_kode=bo.f_kode_user", "left")
						->join("tb_kamar kamr", "kamr.f_kode_kamar=bo.f_kode_kamar", "left")
						->join("tb_properti prop", "prop.f_kode_properti=kamr.f_kode_properti", "left")
						->where("bo.f_status_booking","1")
						->order_by("booking_no desc")
						->get("tb_booking bo");
	}

}

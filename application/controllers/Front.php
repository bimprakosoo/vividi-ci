<?php
class Front extends CI_Controller {
	function __construct() {
		parent::__construct();

	}
	public function index(){

//		$this->theme->front("front/v_index",$data);
		$this->theme->front("front/v_index");
	}
	public function search($page=0){
		if (isset($_GET["q"]) && isset($_GET["ci"]) && isset($_GET["co"]) && isset($_GET["g"]) && isset($_GET["cr"])){
	    	@$q 		= ($_GET["q"]=="")?"all":urlencode($_GET["q"]);
	    	@$checkin 	= ($_GET["ci"]=="")?"all":urlencode($_GET["ci"]);
	    	@$checkout 	= ($_GET["co"]=="")?"all":urlencode($_GET["co"]);
	    	@$tamu 		= ($_GET["g"]=="")?"all":urlencode($_GET["g"]);
	    	@$kamar 	= ($_GET["cr"]=="")?"all":urlencode($_GET["cr"]);
		}

		$data["cari"]   = array("q" => urldecode(@$q), "ci" => @$checkin, "co" => @$checkout, "g" => @$tamu, "cr" => @$kamar);

		$where = array();

		if ($data["cari"]["q"] != "") {
		    if ($data["cari"]["q"] == "all") $data["cari"]["q"] = "";
		    $where = "(
		                tb_properti.f_nama_properti like '%".$this->db->escape_like_str($data["cari"]["q"])."%' or
		                tb_kota.f_nama_kota like '%".$this->db->escape_like_str($data["cari"]["q"])."%' or
		                tb_provinsi.f_nama_provinsi like '%".$this->db->escape_like_str($data["cari"]["q"])."%' 
		              ) ";
		}	
	 	if ($data["cari"]["ci"] != "" and $data["cari"]["ci"] != "all") {
           $where .= " and ( tb_harga.f_tanggal_awal >= '".$data["cari"]["ci"]."' )";
		}
	 	if ($data["cari"]["co"] != "" and $data["cari"]["co"] != "all") {
           $where .= " and ( tb_harga.f_tanggal_akhir <= '".$data["cari"]["co"]."' )";
		}
	 	if ($data["cari"]["g"] != "" and $data["cari"]["g"] != "all") {
           $where .= " and ( tb_kamar.f_max_adult = '".$data["cari"]["g"]."' )";
		}
	 	if ($data["cari"]["cr"] != "" and $data["cari"]["cr"] != "all") {
           $where .= " and ( tb_harga.f_allotment != '0' and tb_harga.f_allotment >= '".$data["cari"]["cr"]."' )";
		}

		$search = @$q;
		$checkin = @$checkin;
		$checkout = @$checkout;
		$maxguest = @$tamu;
		$maxroom = @$kamar;
		$this->db->where($where);
		$this->load->library('pagination');
		$config = $this->my_config->pagination();
		$config['base_url']     = site_url("front/search/");
		$config['per_page']     = 10; 
		$config["uri_segment"]  = 3;
		$config["suffix"]       = "?q=$search&checkin=$checkin&checkout=$checkout&guest=$maxguest&maxroom=$maxroom;";
		$config['total_rows']   = $this->db->join("tb_properti","tb_properti.f_kode_properti=tb_parent.f_kode_parent")
										   ->join("tb_kota","tb_kota.f_id_kota=tb_properti.f_kota_properti")
										   ->join("tb_provinsi","tb_provinsi.f_id_provinsi=tb_properti.f_provinsi_properti")
										   ->join("tb_kamar","tb_kamar.f_kode_properti=tb_properti.f_kode_properti")
										   ->join("tb_harga","tb_harga.f_kode_kamar=tb_kamar.f_kode_kamar")
										   ->where("tb_properti.f_status_properti","1")
							      		   ->where("tb_kamar.f_status_kamar","1")
							      		   ->where("tb_harga.f_allotment !=","0")
							      		   ->group_by("f_nama_properti")
										   ->get('tb_parent')->num_rows();

		$config["num_links"]    = round($config["total_rows"] / $config["per_page"]);
		$this->pagination->initialize($config); 
		//--
		$this->db->where($where)->limit($config['per_page'], $page);
		
		$data["hotel"] = $this->db->join("tb_parent", "tb_parent.f_kode_parent=tb_properti.f_kode_properti")
							      ->join("tb_kota","tb_kota.f_id_kota=tb_properti.f_kota_properti")
							      ->join("tb_provinsi","tb_provinsi.f_id_provinsi=tb_properti.f_provinsi_properti")
							      ->join("tb_kamar","tb_kamar.f_kode_properti=tb_properti.f_kode_properti")
							      ->join("tb_harga","tb_harga.f_kode_kamar=tb_kamar.f_kode_kamar")
								  ->where("tb_harga.f_tanggal_awal <=", $_GET['ci'])
								  ->where("tb_harga.f_tanggal_akhir >=", $_GET['co'])
								  ->where("tb_kamar.f_max_adult", $_GET['g'])
								  ->where("tb_harga.f_allotment >=", $_GET['cr']) 
								  ->where("tb_properti.f_status_properti","1")
							      ->where("tb_kamar.f_status_kamar","1")
					      		  ->where("tb_harga.f_allotment !=","0")
					      		  ->group_by("f_nama_properti")
							      ->get('tb_properti')->result_array();

		$this->theme->search("front/v_search",$data);
	}
	public function detail($id){
		$data["hotel"] = $this->db->join("tb_kota","tb_kota.f_id_kota=tb_properti.f_kota_properti")
								  ->join("tb_provinsi","tb_provinsi.f_id_provinsi=tb_properti.f_provinsi_properti")
								  ->where("tb_properti.f_kode_properti",$id)
								  ->get("tb_properti")->row_array();

		$data["harga"] = $this->db->join("tb_properti", "tb_properti.f_kode_properti=tb_kamar.f_kode_properti")
								  ->join("tb_harga", "tb_harga.f_kode_kamar=tb_kamar.f_kode_kamar")
								  ->where("tb_properti.f_kode_properti",$id)
								  ->where("tb_harga.f_tanggal_awal <=",$_GET['ci'])
								  ->where("tb_harga.f_tanggal_akhir >=",$_GET['co'])
								  ->where("tb_kamar.f_max_adult",$_GET['g'])
								  ->where("tb_harga.f_allotment >=",$_GET['cr'])
								  ->order_by("tb_harga.f_harga_akhir", "ASC")
								  ->limit("1") 
								  ->get("tb_kamar")->row_array();

		$data["detailhotel"] = $this->db->join("tb_properti","tb_properti.f_kode_properti=tb_kamar.f_kode_properti")
									    ->join("tb_harga","tb_harga.f_kode_kamar=tb_kamar.f_kode_kamar")
									    ->join("tb_parent","tb_parent.f_kode_parent=tb_properti.f_kode_properti")
									    ->join("tb_kota","tb_kota.f_id_kota=tb_properti.f_kota_properti")
							      		->join("tb_provinsi","tb_provinsi.f_id_provinsi=tb_properti.f_provinsi_properti")
									    ->where("tb_properti.f_kode_properti",$id)
										->where("tb_harga.f_tanggal_awal <=", $_GET['ci'])
										->where("tb_harga.f_tanggal_akhir >=", $_GET['co'])
									    ->where("tb_kamar.f_max_adult",$_GET['g'])
										->where("tb_harga.f_allotment >=",$_GET['cr'])
										->order_by("tb_harga.f_harga_akhir", "ASC")
							      		->get("tb_kamar")->result_array();

		$this->theme->search("front/v_detail",$data);
	}

	public function json_search(){
		$keyword = $this->uri->segment(3);
		$select =$this->db->join('tb_kota','tb_kota.f_id_kota=tb_parent.f_kode_parent','left')
						  ->join('tb_provinsi','tb_provinsi.f_id_provinsi=tb_parent.f_kode_parent','left')
				   		  ->join('tb_properti','tb_properti.f_kode_properti=tb_parent.f_kode_parent','left')
						  ->like('f_nama_properti', $keyword)
						  ->or_like('f_nama_kota', $keyword)
						  ->or_like('f_nama_provinsi', $keyword)
						  ->get('tb_parent')->result_array();

		foreach($select as $row){
			$data['query'] = $keyword;
			if ($row["f_tipe_parent"]=="4") {
				$label = "<div style='color:#000; height:50px; padding:10px 0px;'>&nbsp;&nbsp;<span style='font-weight: 500; font-size: 18px;'>".strtoupper($row['f_nama_kota'])."</span></div>";
				$nama = $row['f_nama_kota'];
				$kode = $row['f_kode_parent'];
			}elseif($row["f_tipe_parent"]=="5"){
				$label = "<div style='color:#000; height:50px; padding:10px 0px;'>&nbsp;&nbsp;<span style='font-weight: 500; font-size: 18px;'>".strtoupper($row['f_nama_provinsi'])."</span></div>";
				$nama = $row['f_nama_provinsi'];
				$kode = $row['f_kode_parent'];
			}else{
				$label = "<div style='color:#000; height:50px; padding:10px 0px;'>&nbsp;&nbsp;<span style='font-weight: 500; font-size: 18px;'>".strtoupper($row['f_nama_properti'])."</span></div>";
				$nama = $row['f_nama_properti'];
				$kode = $row['f_kode_parent'];
			}

			$data['suggestions'][] = array(
				'label' =>$label,
				'kode' =>$kode,
				'nama' =>$nama
			);
		}
		echo json_encode($data);
	}
	public function confirpayment(){
		$this->theme->search("front/v_conf_payment");
	}
}
?>

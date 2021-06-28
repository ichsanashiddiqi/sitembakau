<?php 	
	class m_varietas extends CI_Model
	{

		public function selectVarietasById($idVarietas) {
			$query = $this->db->select('*');
			$query = $this->db->from("varietas v");
			$query = $this->db->join("deskripsi_varietas dsv", "v.id_varietas = dsv.id_varietas");
			$query = $this->db->where("v.id_varietas", $idVarietas);
			$query = $this->db->get();
   			return $query->result();
		}

		public function selectVarietasTerbaru() {
			$query = $this->db->select('*');
			$query = $this->db->from("varietas v");
			$query = $this->db->join("deskripsi_varietas dsv", "v.id_varietas = dsv.id_varietas");
			$query = $this->db->order_by("v.id_varietas", "desc");
			$query = $this->db->limit(7);
			$query = $this->db->get();
   			return $query->result();
		}

		public function selectVarietasPerPage($sampai, $dari)
		{
	        $query = $this->db->select("*");
	        $query = $this->db->from("varietas v");
			$query = $this->db->join("deskripsi_varietas dsv", "v.id_varietas = dsv.id_varietas", "left");
			$query = $this->db->order_by("v.id_varietas", "desc");
			$query = $this->db->limit($sampai, $dari);
	        $query = $this->db->get();
	        return $query->result();
		}

		public function getJumlahVarietas() {
	        $query = $this->db->get('varietas');
	        return $query->num_rows();
		}

		public function getJumlahVarietasBy($kategori) {
	        $query = $this->db->select("v.id_varietas, v.nama_varietas, det.detail_value");
	        $query = $this->db->from("varietas v");
			$query = $this->db->join("deskripsi_varietas dsv", "v.id_varietas = dsv.id_varietas", "left");
			$query = $this->db->join("detail_deskripsi det", "dsv.id_deskripsi_varietas = det.id_deskripsi_varietas", "left");
			$query = $this->db->join("atribut atr", "atr.id_atribut = det.id_atribut", "left");
			$query = $this->db->where("atr.nama_atribut", $kategori);
	        $query = $this->db->get();
	        return $query->num_rows();
		}

		public function selectVarietasByPagination($kategori, $sampai, $dari)
		{
	        $query = $this->db->select("v.id_varietas, v.nama_varietas, det.detail_value");
	        $query = $this->db->from("varietas v");
			$query = $this->db->join("deskripsi_varietas dsv", "v.id_varietas = dsv.id_varietas", "left");
			$query = $this->db->join("detail_deskripsi det", "dsv.id_deskripsi_varietas = det.id_deskripsi_varietas", "left");
			$query = $this->db->join("atribut atr", "atr.id_atribut = det.id_atribut", "left");
			$query = $this->db->where("atr.nama_atribut", $kategori);
			$query = $this->db->limit($sampai, $dari);
	        $query = $this->db->get();
	        return $query->result();
		}

		public function selectIdByNamaVarietas($namaVarietas) {
			$query = $this->db->select("id_varietas");
	        $query = $this->db->from("varietas");
	        $query = $this->db->where("nama_varietas", $namaVarietas);
	        $query = $this->db->get();
	        $hasil = $query->result();
	        return $hasil[0]->id_varietas;
		}

		public function selectDetailVarietas($idVarietas)
		{
	        $query = $this->db->select("");
	        $query = $this->db->from("varietas v");
			$query = $this->db->join("deskripsi_varietas dsv", "v.id_varietas = dsv.id_varietas");
			$query = $this->db->join("detail_deskripsi det", "det.id_deskripsi_varietas = dsv.id_deskripsi_varietas");
			$query = $this->db->join("atribut atr", "atr.id_atribut = det.id_atribut");
			$query = $this->db->where("v.id_varietas", $idVarietas);
	        $query = $this->db->get();
	        return $query->result();
		}

		public function selectWaktuTanam() {
			$query = $this->db->get('waktu_tanam');
   			return $query->result();
		}

		public function selectJenisTembakau() {
			$query = $this->db->get('jenis_tembakau');
   			return $query->result();
		}

		public function pencarianVarietas($cari){
			if ($cari == "#varietas") {
				$cari = "";
			}
			$query = $this->db->distinct();
			$query = $this->db->select("v.id_varietas, v.nama_varietas, des.id_deskripsi_varietas, des.narasi, atr.nama_atribut, 
									det.detail_value");
            $query = $this->db->from("detail_deskripsi det");
            $query = $this->db->join("atribut atr", "det.id_atribut = atr.id_atribut");
			$query = $this->db->join("deskripsi_varietas des", "det.id_deskripsi_varietas = des.id_deskripsi_varietas");
			$query = $this->db->join("varietas v", "des.id_varietas = v.id_varietas");
            $query = $this->db->group_start()
            					->where('v.nama_varietas like', "%$cari%")
            					->or_where('des.narasi like', "%$cari%")
            					->or_where('atr.nama_atribut like', "%$cari%")
            					->or_where('det.detail_value like', "%$cari%")
            					->group_end();
            $query = $this->db->get();
            return $query->result();
		}

		public function pencarianWaktuTanam($cari){
			$query = $this->db->select('*');
            $query = $this->db->from('waktu_tanam');
            $query = $this->db->where('nama_file like', "%$cari%")->or_where('deskripsi like', "%$cari%");
            $query = $this->db->get();
            return $query->result();
		}
	}
 ?>
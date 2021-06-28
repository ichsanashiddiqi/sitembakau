<?php 
	class m_agribisnis extends CI_Model
	{

		public function selectAgribisnis() {
			$query = $this->db->get('agribisnis');
	        return $query->result();
		}

		public function selectAgribisnisTop3() {
			$query = $this->db->select("*");
	        $query = $this->db->from("agribisnis");
			$query = $this->db->limit(3);
	        $query = $this->db->get();
	        return $query->result();
		}

		public function selectAgribisnisById($idAgribisnis) {
			$query = $this->db->select('*');
			$query = $this->db->from('agribisnis');
			$query = $this->db->where('id_agribisnis', $idAgribisnis);
			$query = $this->db->get();
			return $query->result();
		}

		public function selectIdAgribisnisByJenis($jenis) {
			$query = $this->db->select('id_agribisnis');
			$query = $this->db->from('agribisnis');
			$query = $this->db->where('jenis_agribisnis', $jenis);
			$query = $this->db->get();
			$hasil = $query->result();
			return $hasil[0]->id_agribisnis;
		}

		public function pencarianAgribisnis($cari){
			if ($cari == "#agribisnis") {
				$cari = "";
			}
			$query = $this->db->select('*');
            $query = $this->db->from('agribisnis');
            $query = $this->db->where('jenis_agribisnis like', "%$cari%")->or_where('deskripsi_agribisnis like', "%$cari%");
            $query = $this->db->get();
            return $query->result();
		}

	} 
?>
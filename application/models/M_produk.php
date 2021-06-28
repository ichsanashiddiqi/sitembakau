<?php 	
	class M_produk extends CI_Model
	{

		// public function selectBenihAll($sampai, $dari)
		// {
	 //        $query = $this->db->select("*");
	 //        $query = $this->db->from("benih b");
		// 	$query = $this->db->limit($sampai, $dari);
	 //        $query = $this->db->get();
	 //        return $query->result();
		// }

		public function getJumlahBenih() {
			$query = $this->db->get('benih');
	        return $query->num_rows();
		}

		public function getJumlahDistribusiBenih() {
			$query = $this->db->get('distribusi_benih');
	        return $query->num_rows();
		}

		public function selectDistribusiBenih() {
			$query = $this->db->select("db.id_distribusi, b.nama_benih, db.tanggal, db.tahun_panen, db.kelas_benih, db.jumlah_kg, db.keterangan");
	        $query = $this->db->from("benih b");
	        $query = $this->db->join("distribusi_benih db", "b.id_benih = db.id_benih");
			$query = $this->db->where("tanggal like","2009-01-_%_%");
	        $query = $this->db->order_by("db.id_distribusi", "asc");
			// $query = $this->db->limit($sampai, $dari);
	        $query = $this->db->get();
	        return $query->result();
		}

		public function selectDistribusiFiltered($tahun, $bulan) {
			$query = $this->db->select("db.id_distribusi, b.nama_benih, db.tanggal, db.tahun_panen, db.kelas_benih, db.jumlah_kg, db.keterangan");
	        $query = $this->db->from("benih b");
	        $query = $this->db->join("distribusi_benih db", "b.id_benih = db.id_benih");
			$query = $this->db->where("tanggal like",$tahun."-".$bulan."-_%_%");
			$query = $this->db->order_by("db.id_distribusi", "asc");
			// $query = $this->db->limit($sampai, $dari);
	        $query = $this->db->get();
	        return $query->result();
		}

		public function selectStokBenih()
		{
	        $query = $this->db->select("*");
	        $query = $this->db->from("benih b");
	        $query = $this->db->where("stok_sampai like","2018-06-_%_%");
	        $query = $this->db->order_by("id_benih", "asc");
	        $query = $this->db->get();
	        return $query->result();
		}

		public function selectStokBenihFiltered($tahun, $bulan) {
			$query = $this->db->select("*");
	        $query = $this->db->from("benih b");
	        $query = $this->db->where("stok_sampai like",$tahun."-".$bulan."-_%_%");
			$query = $this->db->order_by("id_benih", "asc");
	        $query = $this->db->get();
	        return $query->result();
		}

		public function pencarianBenih($cari){
			$query = $this->db->select('*');
            $query = $this->db->from('agribisnis');
            $query = $this->db->where('jenis_agribisnis like', "%$cari%")->or_where('deskripsi_agribisnis like', "%$cari%");
            $query = $this->db->get();
            return $query->result();
		}
	}
 ?>
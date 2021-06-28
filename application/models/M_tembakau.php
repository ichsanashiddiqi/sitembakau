<?php 
	class m_tembakau extends CI_Model{
// VARIETAS
		public function get_varietas(){			
			$sql = $this->db->query("SELECT *
								FROM varietas v
								JOIN deskripsi_varietas dsv ON v.id_varietas = dsv.id_varietas order by v.id_varietas desc");
			return $sql->result();
		}		
		public function get_all_detail_varietas(){			
			$sql = $this->db->query("SELECT v.id_varietas,v.nama_varietas,a.id_atribut, dd.id_deskripsi_varietas, a.nama_atribut,dd.detail_value
								 FROM varietas v JOIN deskripsi_varietas dsv 
									 ON v.id_varietas = dsv.id_varietas JOIN detail_deskripsi dd
									 ON dsv.id_deskripsi_varietas = dd.id_deskripsi_varietas JOIN atribut a 
									 ON dd.id_atribut = a.id_atribut");
			return $sql->result();	
		}
		public function get_imgsk_varietas_byId($id){
			$sql = $this->db->query("SELECT file_SK, file_gambar FROM varietas WHERE id_varietas = \"$id\"");
			return $sql->result();
		}
		public function getAtribut() {			
			$sql = $this->db->query("SELECT nama_atribut FROM atribut order by id_atribut asc");
			return $sql->result();
		}
		public function getIdAtribut($namaAtribut) {			
			$sql = $this->db->query("SELECT id_atribut FROM atribut WHERE nama_atribut = \"$namaAtribut\"");
			$hasil = $sql->result();
			return $hasil[0]->id_atribut;
		}
		public function addAtribut($namaAtribut) {			
			$this->db->query("INSERT INTO atribut (id_atribut, nama_atribut) VALUES (\"\",\"$namaAtribut\")");
		}
		public function add_varietas($namaVarietas,$tglPelepasan, $tglUpload, $wktUpload, $sk,$gmbr){			
			$this->db->query("INSERT INTO varietas (id_varietas, nama_varietas, tanggal_pelepasan, tanggal_upload, waktu_upload, file_SK, file_gambar) VALUES (\"\",\"$namaVarietas\",\"$tglPelepasan\",\"$tglUpload\",\"$wktUpload\",\"$sk\",\"$gmbr\")");
		}
		public function add_deskripsi_varietas($des){			
			$this->db->query("INSERT INTO deskripsi_varietas(id_varietas, id_deskripsi_varietas, narasi) VALUES ((SELECT id_varietas FROM varietas ORDER BY id_varietas DESC LIMIT 1),\"\",\"$des\")");
		}
		public function add_detail_deskripsi($atribut,$value){					
			$this->db->query("INSERT INTO `detail_deskripsi`(`id_deskripsi_varietas`, `id_atribut`, `detail_value`) VALUES ((SELECT id_deskripsi_varietas FROM deskripsi_varietas ORDER BY id_deskripsi_varietas DESC LIMIT 1),\"$atribut\",\"$value\")");		
		}
		public function delete_varietas($id){			
			$sql = $this->db->query("DELETE FROM varietas WHERE id_varietas = "."'".$id."'");
		}

		public function updateVarietas($id,$namaVar,$tgl,$sk,$gmbr){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\",`file_SK`=\"$sk\",`file_gambar`= \"$gmbr\" WHERE `id_varietas` = \"$id\"");
		}

		// alternatif
		public function updateVarietasKecGmbr($id,$namaVar,$tgl,$sk){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\",`file_SK`=\"$sk\" WHERE `id_varietas` = \"$id\"");
		}
		public function updateVarietasKecSK($id,$namaVar,$tgl,$gmbr){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\",`file_gambar`= \"$gmbr\" WHERE `id_varietas` = \"$id\"");
		}
		public function updateVarietasTanpaFile($id,$namaVar,$tgl){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\" WHERE `id_varietas` = \"$id\"");
		}
		//
		public function updateDesVarietas($id,$des){			
			$this->db->query("UPDATE `deskripsi_varietas` SET `narasi`= \"$des\" WHERE `id_varietas` = \"$id\"");
		}
		public function updateDetailDeskripsi($idDes, $idAtr, $value) {			
			$this->db->query("UPDATE `detail_deskripsi` SET `detail_value`= \"$value\" WHERE `id_deskripsi_varietas` = \"$idDes\" AND `id_atribut` = \"$idAtr\"");
		}


// LEAFLET
		public function get_leaflet(){					
			$sql = $this->db->query("SELECT * FROM leaflet order by id_leaflet desc");
			return $sql->result();
		}
		public function get_leaflet_img(){				
			$sql = $this->db->query("SELECT * FROM gambar_leaflet order by id_gambar desc");
			return $sql->result();
		}
		public function get_leaflet_img_byId($id){			
			$sql = $this->db->query("SELECT * FROM gambar_leaflet WHERE id_gambar = \"$id\"");
			return $sql->result();
		}
		public function get_leaflet_byId($id){				
			$sql = $this->db->query("SELECT * FROM gambar_leaflet WHERE id_leaflet = \"$id\"");
			return $sql->result();
		}
		public function add_leaflet_name($nama){					
			$sql = $this->db->query("INSERT INTO leaflet (id_leaflet,nama_leaflet) VALUES (\"\",\"$nama\")");			
		}
		public function add_leaflet_img($img){			
			$this->db->query("INSERT INTO gambar_leaflet(id_leaflet, id_gambar, file) VALUES ((SELECT id_leaflet FROM leaflet ORDER BY id_leaflet DESC LIMIT 1),\"\",\"$img\")");
		}
		public function updateLeafletName($id,$nama){			
			$this->db->query("UPDATE `leaflet` SET `nama_leaflet`= \"$nama\" WHERE `id_leaflet` = \"$id\"");
		}
		public function updateLeafletImg($id,$img){			
			$this->db->query("UPDATE `gambar_leaflet` SET `file`= \"$img\" WHERE `id_gambar` = \"$id\"");
		}
		public function delete_leaflet($id){			
			$sql = $this->db->query("DELETE FROM leaflet WHERE id_leaflet = \"$id\" ");
		}

// TEKNOLOGI BUDIDAYA
		public function get_tekbud(){					

			$sql = $this->db->query("SELECT t.id_teknologi_budidaya,t.jenis_teknologi_budidaya,f.id_file,f.nama_file,f.deskripsi_file,f.file FROM file_teknologi f join teknologi_budidaya t on f.id_teknologi_budidaya = t.id_teknologi_budidaya order by t.id_teknologi_budidaya desc");
			return $sql->result();
		}
		public function get_tekbud_byId($id){						
			$sql = $this->db->query("SELECT * FROM file_teknologi WHERE id_file = \"$id\"");
			return $sql->result();
		}
		public function add_teknologi($id,$nama,$des,$file){						
			$sql = $this->db->query("INSERT INTO file_teknologi (id_teknologi_budidaya,id_file,nama_file,deskripsi_file,file) VALUES (\"$id\",\"\",\"$nama\",\"$des\",\"$file\")");			
		}		
		public function update_tekbud($id,$nama,$des,$file){					
			$sql = $this->db->query("UPDATE file_teknologi SET `nama_file`= \"$nama\",`deskripsi_file`= \"$des\",`file`= \"$file\" WHERE `id_file` = \"$id\"");		
		}	
		public function update_tekbud_nofile($id,$nama,$des){					
			$sql = $this->db->query("UPDATE file_teknologi SET `nama_file`= \"$nama\",`deskripsi_file`= \"$des\" WHERE `id_file` = \"$id\"");		
		}	
		public function delete_tekbud($id){			
			$sql = $this->db->query("DELETE FROM file_teknologi WHERE id_file = \"$id\" ");
		}		
		
// AGRIBISNIS
		public function get_agri(){						
			$sql = $this->db->query("SELECT * FROM agribisnis order by id_agribisnis desc");
			return $sql->result();
		}
		public function get_agri_byId($id){						
			$sql = $this->db->query("SELECT * FROM agribisnis WHERE id_agribisnis = \"$id\"");
			return $sql->result();
		}
		public function add_agribisnis($jenis,$des,$pdf,$gambar){						
			$sql = $this->db->query("INSERT INTO agribisnis (id_agribisnis,jenis_agribisnis,deskripsi_agribisnis,file,gambar_agribisnis) VALUES (\"\",\"$jenis\",\"$des\",\"$pdf\",\"$gambar\")");			
		}
		public function update_agribisnis($id,$jenis,$deskripsi,$pdf,$gambar){						
			$sql = $this->db->query("UPDATE `agribisnis` SET `jenis_agribisnis`= \"$jenis\",`deskripsi_agribisnis`= \"$deskripsi\",`file`= \"$pdf\",`gambar_agribisnis`= \"$gambar\" WHERE `id_agribisnis` = \"$id\"");		
		}
		public function update_agribisnis_noimg($id,$jenis,$deskripsi,$pdf){						
			$sql = $this->db->query("UPDATE `agribisnis` SET `jenis_agribisnis`= \"$jenis\",`deskripsi_agribisnis`= \"$deskripsi\",`file`= \"$pdf\" WHERE `id_agribisnis` = \"$id\"");		
		}
		public function update_agribisnis_nofile($id,$jenis,$deskripsi,$gambar){						
			$sql = $this->db->query("UPDATE `agribisnis` SET `jenis_agribisnis`= \"$jenis\",`deskripsi_agribisnis`= \"$deskripsi\",`gambar_agribisnis`= \"$gambar\" WHERE `id_agribisnis` = \"$id\"");		
		}
		public function update_agribisnis_noimgpdf($id,$jenis,$deskripsi){						
			$sql = $this->db->query("UPDATE `agribisnis` SET `jenis_agribisnis`= \"$jenis\",`deskripsi_agribisnis`= \"$deskripsi\" WHERE `id_agribisnis` = \"$id\"");		
		}	
		public function delete_agribisnis($id){			
			$sql = $this->db->query("DELETE FROM agribisnis WHERE id_agribisnis = \"$id\" ");
		}	

// PRODUK BENIH
		public function get_benih(){						
			$sql = $this->db->query("SELECT * FROM benih order by id_benih desc");
			return $sql->result();
		}
		public function add_benih($nama,$stoksampai,$jumstok){			
			$sql = $this->db->query("INSERT INTO benih (id_benih,nama_benih,stok_sampai,jumlah_stok) VALUES (\"\",\"$nama\",\"$stoksampai\",\"$jumstok\")");			
		}
		public function update_benih($id,$namabenih,$stoksampai,$jumlahstok){						
			$sql = $this->db->query("UPDATE `benih` SET `nama_benih`= \"$namabenih\",`stok_sampai`= \"$stoksampai\",`jumlah_stok`= \"$jumlahstok\" WHERE `id_benih` = \"$id\"");		
		}
		public function delete_benih($id){			
			$sql = $this->db->query("DELETE FROM benih WHERE id_benih = \"$id\" ");
		}

		// DISTRIBUSI BENIH
		public function get_distribusi_benih(){				
			$sql = $this->db->query("SELECT db.id_distribusi,db.id_benih,b.nama_benih,db.tanggal,db.tahun_panen,db.kelas_benih,db.jumlah_kg,db.keterangan FROM benih b JOIN distribusi_benih db on b.id_benih = db.id_benih ORDER BY db.id_distribusi desc");
			return $sql->result();
		}
		public function get_nama_benih() {			
			$sql = $this->db->query("SELECT nama_benih FROM benih ORDER BY id_benih ASC");
			return $sql->result();
		}
		public function get_id_nama_benih($nama) {			
			$sql = $this->db->query("SELECT id_benih FROM benih WHERE nama_benih = \"$nama\"");
			$hasil = $sql->result();
			return $hasil[0]->id_benih;
		}
		public function add_distribusi_benih($idbenih,$tgl,$thnpanen,$kelas,$jumlah,$ket){					
			$sql = $this->db->query("INSERT INTO distribusi_benih (id_distribusi,id_benih,tanggal,tahun_panen,kelas_benih,jumlah_kg,keterangan) VALUES (\"\",\"$idbenih\",\"$tgl\",\"$thnpanen\",\"$kelas\",\"$jumlah\",\"$ket\")");			
		}
		public function update_distribusi_benih($iddistribusi,$tgl,$thn,$kls,$jum,$ket){						
			$sql = $this->db->query("UPDATE `distribusi_benih` SET `tanggal`= \"$tgl\",`tahun_panen`= \"$thn\",`kelas_benih`= \"$kls\",`jumlah_kg`= \"$jum\",`keterangan`= \"$ket\" WHERE `id_distribusi` = \"$iddistribusi\"");		
		}
		public function delete_distribusi_benih($id){			
			$sql = $this->db->query("DELETE FROM distribusi_benih WHERE id_distribusi = \"$id\" ");
		}
// PENGUNJUNG
		public function getTotalVisitor(){
			$sql = $this->db->query("SELECT SUM(hits) as total FROM statistik_pengunjung");
			return $sql->result();
		}
		public function getTotalToday($tanggal){
			$sql = $this->db->query("SELECT SUM(hits) as totalHariIni FROM statistik_pengunjung WHERE tanggal = \"$tanggal\"");
			return $sql->result();		
		}
		public function getTotalByMonth($tanggal){
			$sql = $this->db->query("SELECT SUM(hits) as totalBulanIni FROM statistik_pengunjung WHERE month(tanggal) = \"$tanggal\"");
			return $sql->result();		
		}
		public function addUser($ip,$tanggal,$online){
			$sql = $this->db->query("INSERT INTO statistik_pengunjung (id_pengunjung, tanggal, hits, online) VALUES(\"$ip\",\"$tanggal\",'1',\"$online\")");			
		}		
	}
 ?>